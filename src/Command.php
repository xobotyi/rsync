<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;


/**
 * Class Command
 *
 * @package xobotyi\rsync
 */
abstract class Command
{
    /**
     * @var array
     */
    protected $OPTIONS_LIST = [];
    /**
     * @var int|null
     */
    private $code;
    /**
     * @var string
     */
    private $executable;
    /**
     * @var string
     */
    private $optionValueAssigner = ' ';
    /**
     * @var array
     */
    private $options = [];
    /**
     * @var array
     */
    private $output;
    /**
     * @var array
     */
    private $parameters = [];
    /**
     * @var bool
     */
    private $rawOutput;

    /**
     * Command constructor.
     *
     * @param string $executable
     * @param bool   $rawOutput
     * @param string $optionValueAssigner
     *
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function __construct(string $executable, bool $rawOutput = false, string $optionValueAssigner = ' ') {
        $this->setExecutable($executable)
             ->setRawOutput($rawOutput)
             ->setOptionValueAssigner($optionValueAssigner);
    }

    /**
     * @return string
     */
    public function __toString() :string {
        $options = $this->getOptionsString();

        return $this->executable . ($options ?: '');
    }

    /**
     * @param $parameter
     *
     * @return $this
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function addParameter($parameter) {
        if (!self::isStringable($parameter)) {
            throw new Exception\Command("Got non-stringable parameter");
        }
        $this->parameters[] = $parameter;

        return $this;
    }

    /**
     * @return \xobotyi\rsync\Command
     */
    public function clearParameters() :self {
        $this->parameters = [];

        return $this;
    }

    /**
     * @param bool $rawOutput
     *
     * @return \xobotyi\rsync\Command
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function execute(bool $rawOutput = false) :self {
        if (!$rawOutput) {
            exec($this, $this->output, $this->code);

            return $this;
        }

        $this->output = '';

        if (!($handle = popen($this, "r"))) {
            throw new Exception\Command("Unable to execute command '{$this}'");
        }

        while (!feof($handle)) {
            $this->output .= fread($handle, 1024);
        }

        fclose($handle);

        $this->output = explode("\n", $this->output);

        return $this;
    }

    /**
     * @return null|string
     */
    public function getCode() :?string {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getExecutable() :string {
        return $this->executable;
    }

    /**
     * @param string $executable
     *
     * @return $this
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function setExecutable(string $executable) {
        if (!($executable = \trim($executable))) {
            throw new Exception\Command("Executable path must be a valuable string");
        }

        if (!self::isExecutable($executable)) {
            throw new Exception\Command("{$executable} is not executable");
        }

        $this->executable = $executable;

        return $this;
    }

    /**
     * @return string
     */
    public function getOptionValueAssigner() :string {
        return $this->optionValueAssigner;
    }

    /**
     * @param string $optionValueAssigner
     *
     * @return \xobotyi\rsync\Command
     */
    public function setOptionValueAssigner(string $optionValueAssigner) :self {
        $this->optionValueAssigner = $optionValueAssigner;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions() :array {
        return $this->options;
    }

    /**
     * @param array $options
     *
     * @return $this
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function setOptions(array $options) {
        foreach ($options as $option => $value) {
            $this->setOption($option, $value);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getOptionsString() :string {
        $res = '';

        if (!$this->options) {
            return $res;
        }

        $shortOptions        = '';
        $longOptions         = '';
        $parametrizedOptions = '';

        foreach ($this->options as $opt => $value) {
            $option = $this->OPTIONS_LIST[$opt]['option'];
            if (!($this->OPTIONS_LIST[$opt]['argument'] ?? false)) {
                strlen($option) > 1
                    ? $longOptions .= ' --' . $option
                    : $shortOptions .= $option;

                continue;
            }

            if ($this->OPTIONS_LIST[$opt]['repeatable'] ?? false) {
                foreach ($value as $val) {
                    $parametrizedOptions .= (strlen($option) > 1 ? ' --' : ' -') . $option . $this->optionValueAssigner . escapeshellarg($val);
                }

                continue;
            }

            $parametrizedOptions .= (strlen($option) > 1 ? ' --' : ' -') . $option . $this->optionValueAssigner . escapeshellarg($value);
        }

        $shortOptions        = rtrim($shortOptions);
        $longOptions         = rtrim($longOptions);
        $parametrizedOptions = rtrim($parametrizedOptions);

        $res .= ($shortOptions ? ' -' . $shortOptions : '');
        $res .= $longOptions ?: '';
        $res .= $parametrizedOptions ?: '';

        return $res;
    }

    /**
     * @return array
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function getOutput() :array {
        if (!$this->code) {
            $this->execute();
        }

        return $this->output;
    }

    /**
     * @return array
     */
    public function getParameters() :array {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     *
     * @return $this
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function setParameters(array $parameters) {
        $params = [];
        foreach ($parameters as &$value) {
            if (!self::isStringable($value)) {
                throw new Exception\Command("Got non-stringable parameter");
            }

            $params[] = (string)$value;
        }

        $this->parameters = $params;

        return $this;
    }

    /**
     * @param string $exec
     *
     * @return bool
     */
    public static function isExecutable(string $exec) :bool {
        return (bool)shell_exec((substr(strtolower(PHP_OS), 0, 3) == 'win' ? 'where' : 'which') . ' ' . $exec);
    }

    /**
     * @return bool
     */
    public function isRawOutput() :bool {
        return $this->rawOutput;
    }

    /**
     * @param bool $rawOutput
     *
     * @return \xobotyi\rsync\Command
     */
    public function setRawOutput(bool $rawOutput) :self {
        $this->rawOutput = $rawOutput;

        return $this;
    }

    /**
     * @param $var
     *
     * @return bool
     */
    private static function isStringable(&$var) :bool {
        return (\is_string($var) || \is_numeric($var) || (\is_object($var) && \method_exists($var, '__toString')));
    }

    /**
     * @param string $optName
     * @param bool   $val
     *
     * @return $this
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function setOption(string $optName, $val = true) {
        if (!($this->OPTIONS_LIST[$optName] ?? false)) {
            throw new Exception\Command("Option {$optName} is not supported");
        }

        if (is_bool($val)) {
            $this->options[$optName] = $val;

            return $this;
        }

        if (!($this->OPTIONS_LIST[$optName]['argument'] ?? false)) {
            throw new Exception\Command("Option {$optName} can not have any argument");
        }

        if (is_array($val)) {
            if (!($this->OPTIONS_LIST[$optName]['repeatable'] ?? false)) {
                throw new Exception\Command("Option {$optName} is not repeatable (its value cant be an array)");
            }

            $this->options[$optName] = [];

            foreach ($val as &$value) {
                if (!self::isStringable($value)) {
                    throw new Exception\Command("Option {$optName} got non-stringable value");
                }

                $this->options[$optName][] = (string)$value;
            }

            return $this;
        }

        if (!self::isStringable($val)) {
            throw new Exception\Command("Option {$optName} got non-stringable value");
        }

        $this->options[$optName] = (string)$val;

        return $this;
    }
}
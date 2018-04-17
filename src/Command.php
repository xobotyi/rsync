<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;


abstract class Command
{
    /**
     * @var string
     */
    private $executable;
    /**
     * @var bool
     */
    private $rawOutput;
    /**
     * @var string
     */
    private $optionValueAssigner = ' ';

    /**
     * @var array
     */
    private $output;
    /**
     * @var int|null
     */
    private $code;

    private $options    = [];
    private $parameters = [];

    protected $OPTIONS_LIST = [];

    public function __construct(string $executable, bool $rawOutput = false, string $optionValueAssigner = ' ') {
        $this->setExecutable($executable)
             ->setRawOutput($rawOutput)
             ->setOptionValueAssigner($optionValueAssigner);
    }

    public function setExecutable(string $executable) {
        if (!($executable = \trim($executable))) {
            throw new Exception\Command("Executable path must be a valuable string");
        }

        if (!\is_executable($executable)) {
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

    public function __toString() :string {
        $options = $this->getOptionsString();

        return $this->executable . ($options ?: '');
    }

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

        $shortOptions        = trim($shortOptions);
        $longOptions         = rtrim($longOptions);
        $parametrizedOptions = rtrim($parametrizedOptions);

        $res .= ($shortOptions ? '-' . $shortOptions : '');
        $res .= $longOptions ?: '';
        $res .= $parametrizedOptions ?: '';

        return $res;
    }

    private static function isStringable(&$var) :bool {
        return (\is_string($var) || (\is_object($var) && \method_exists($var, '__toString')));
    }

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

        $this->options[$optName] = (string)$val;

        return $this;
    }

    public function setOptions(array $options) {
        foreach ($options as $option => $value) {
            self::setOption($option, $value);
        }

        return $this;
    }

    public function getOptions() :array {
        return $this->options;
    }

    public function addParameter($parameter) {
        if (!self::isStringable($parameter)) {
            throw new Exception\Command("Got non-stringable parameter");
        }
        $this->parameters[] = $parameter;

        return $this;
    }

    public function setParameters(array $parameters) {
        $params = [];
        foreach ($parameters as &$value) {
            if (!self::isStringable($value)) {
                throw new Exception\Command("Got non-stringable parameter");
            }

            $param[] = (string)$value;
        }

        $this->parameters = $params;

        return $this;
    }

    public function getParameters() :array {
        return $this->parameters;
    }

    public function clearParameters() :self {
        $this->parameters = [];

        return $this;
    }

    public function getExecutable() :string {
        return $this->executable;
    }

    public function isRawOutput() :bool {
        return $this->rawOutput;
    }

    public function setRawOutput(bool $rawOutput) :self {
        $this->rawOutput = $rawOutput;

        return $this;
    }

    public function getCode() :?string {
        return $this->code;
    }

    public function getOutput() :array {
        if (!$this->code) {
            $this->execute();
        }

        return $this->output;
    }

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
}
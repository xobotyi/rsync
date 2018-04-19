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
     * @var string
     */
    private $executable;
    /**
     * @var string
     */
    private $cwd = './';
    /**
     * @var string
     */
    private $optionValueAssigner = ' ';
    /**
     * @var array
     */
    private $options = [];
    /**
     * @var int|null
     */
    private $exitCode;
    /**
     * @var string
     */
    private $stdout;
    /**
     * @var string
     */
    private $stderr;
    /**
     * @var array
     */
    private $parameters = [];

    /**
     * Command constructor.
     *
     * @param string $executable
     * @param string $cwd
     * @param string $optionValueAssigner
     *
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function __construct(string $executable, string $cwd = './', string $optionValueAssigner = ' ') {
        $this->setExecutable($executable)
             ->setCWD($cwd)
             ->setOptionValueAssigner($optionValueAssigner);
    }

    /**
     * @return string
     */
    public function __toString() :string {
        $options    = $this->getOptionsString();
        $parameters = $this->getParametersString();

        return $this->executable . ($options ?: '') . ($parameters ?: '');
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
     * @return \xobotyi\rsync\Command
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function execute() :self {
        $this->exitCode = 1;    // exit 0 on ok
        $this->stdout   = '';   // output of the command
        $this->stderr   = '';   // errors during execution

        $descriptor = [
            0 => ["pipe", "r"],    // stdin is a pipe that the child will read from
            1 => ["pipe", "w"],    // stdout is a pipe that the child will write to
            2 => ["pipe", "w"]     // stderr is a pipe
        ];

        $proc = proc_open((string)$this, $descriptor, $pipes, $this->cwd);

        if ($proc === false) {
            throw new Exception\Command("Unable to execute command '{$this}'");
        }

        $this->stdout = trim(stream_get_contents($pipes[1]));
        $this->stderr = trim(stream_get_contents($pipes[2]));

        fclose($pipes[0]);
        fclose($pipes[1]);
        fclose($pipes[2]);

        $this->exitCode = proc_close($proc);

        return $this;
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
        if (!$this->options) {
            return '';
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

        return ($shortOptions ? ' -' . $shortOptions : '') . ($longOptions ?: '') . ($parametrizedOptions ?: '');
    }

    /**
     * @return string
     */
    public function getParametersString() :string {
        if (!$this->parameters) {
            return '';
        }

        $parametersStr = '';

        foreach ($this->parameters as $value) {
            $parametersStr .= ' ' . $value;
        }

        return $parametersStr;
    }

    /**
     * @return string|null
     */
    public function getExitCode() :?string {
        return $this->exitCode;
    }

    /**
     * @return string|null
     */
    public function getStdout() :?string {
        return $this->stdout;
    }

    /**
     * @return string|null
     */
    public function getStderr() :?string {

        return $this->stderr;
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
        if (substr(strtolower(php_uname('s')), 0, 3) === 'win') {
            if (strpos($exec, '/') !== false || strpos($exec, '\\') !== false) {
                $exec = dirname($exec);
                $exec = ($exec ? $exec . ':' : '') . basename($exec);
            }

            exec('where' . ' /Q ' . escapeshellcmd($exec), $output, $code);

            return $code === 0;
        }

        return (bool)shell_exec('which' . ' ' . escapeshellcmd($exec));
    }

    /**
     * @param string $cwd
     *
     * @return \xobotyi\rsync\Command
     */
    public function setCWD(string $cwd) :self {
        $this->cwd = $cwd;

        return $this;
    }

    /**
     * @return string
     */
    public function getCWD() :string {
        return $this->cwd;
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
            if ($val) {
                $this->options[$optName] = $val;
            }
            else {
                unset($this->options[$optName]);
            }

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
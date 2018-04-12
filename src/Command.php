<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;


class Command
{
    /**
     * @var string
     */
    private $exec;
    /**
     * @var bool
     */
    private $rawOutput;

    /**
     * @var array
     */
    private $output;
    /**
     * @var string
     */
    private $status;

    public function __construct(string $exec, bool $rawOutput = false) {
        $this->setExec($exec)
             ->setRawOutput($rawOutput);
    }

    public function setExec(string $exec) {
        if (!($exec = trim($exec))) {
            throw new \InvalidArgumentException("Executable path must be a valuable string");
        }

        if (!self::isExecubaleExists($exec)) {
            throw new Exception\Command("Executable '{$exec}' not exists");
        }

        $this->exec = $exec;

        return $this;
    }

    public function getExec() :string {
        return $this->exec;
    }

    public function isRawOutput() :bool {
        return $this->rawOutput;
    }

    public function setRawOutput(bool $rawOutput) :self {
        $this->rawOutput = $rawOutput;

        return $this;
    }

    public function getStatus() :?string {
        return $this->status;
    }

    public function getOutput() :array {
        if (!$this->status) {
            $this->execute();
        }

        return $this->output;
    }

    public function __toString() :string {
        return $this->exec;
    }

    public function execute(bool $rawOutput = false) :self {
        if (!$rawOutput) {
            exec($this, $this->output, $this->status);

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

    public static function isExecubaleExists(string $exec) :bool {
        return (bool)shell_exec((substr(strtolower(PHP_OS), 0, 3) == 'win' ? 'where' : 'which') . ' ' . $exec);
    }
}
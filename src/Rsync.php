<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;


class Rsync
{
    public const OPTION_EXECUTABLE = 'executable';
    public const OPTION_RAW_OUTPUT = 'rawOutput';
    /**
     * @var \xobotyi\rsync\Command;
     */
    private $command;
    private $config = [
        self::OPTION_EXECUTABLE => 'rsync',
        self::OPTION_RAW_OUTPUT => false,
    ];
    private $options = [];
    private $ssh    = null;

    public function __construct(?array $options = null, ?array $sshConfig = null, ?array $config = null) {
        $this->setConfig($config)
             ->setSSHConfig($sshConfig);
    }

    public function getSSH() :?SSH {
        return $this->ssh;
    }

    public function setConfig(?array $config = null) :self {
        $config = array_merge($this->config, $config ?: []);

        //        $this->command
        //            ? $this->command->setExecutable($config[self::OPTION_EXECUTABLE])->setRawOutput($config[self::OPTION_RAW_OUTPUT])
        //            : $this->command = new Command($config[self::OPTION_EXECUTABLE], $config[self::OPTION_RAW_OUTPUT]);

        $this->config = $config;

        return $this;
    }

    public function setOptions(?array $options = null) :self {
        return $this;
    }

    public function setSSHConfig(?array $sshConfig = null) :self {
        if ($sshConfig === null) {
            $this->ssh = null;

            return $this;
        }

        $this->ssh = new SSH($sshConfig);

        return $this;
    }
}
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

    private $config  = [];
    private $options = [];
    private $ssh     = [];

    /**
     * @var \xobotyi\rsync\Command;
     */
    private $command;

    public function __construct(?array $options = null, ?array $ssh = null, ?array $config = null) {
        $this->setConfig($config);
    }

    public function setOptions(?array $options = null) {

    }

    public function setSsh(?array $ssh = null) {

    }

    public function setConfig(?array $config = null) {
        $config = array_merge([
                                  self::OPTION_EXECUTABLE => 'rsync0',
                                  self::OPTION_RAW_OUTPUT => false,
                              ], $config ?: []);

        $this->command
            ? $this->command->setExec($config[self::OPTION_EXECUTABLE])->setRawOutput($config[self::OPTION_RAW_OUTPUT])
            : $this->command = new Command($config[self::OPTION_EXECUTABLE], $config[self::OPTION_RAW_OUTPUT]);

        $this->config = $config;

        return $this;
    }
}
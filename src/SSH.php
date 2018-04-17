<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;


class SSH extends Command
{
    public const CONF_EXECUTABLE = 'executable';
    public const CONF_OPTIONS    = 'options';

    private $config = [
        self::CONF_EXECUTABLE => 'ssh',
        self::CONF_OPTIONS    => [],
    ];

    public const OPT_PROTOCOL_V1         = 'protocol_v1';
    public const OPT_PROTOCOL_V2         = 'protocol_v2';
    public const OPT_IPV4                = 'ipv4';
    public const OPT_IPV6                = 'ipv6';
    public const OPT_DISABLE_AUTH        = 'disable_auth';
    public const OPT_CIPHER              = 'cipher';
    public const OPT_COMPRESSION         = 'compression';
    public const OPT_DEBUG_LEVEL         = 'debug_level';
    public const OPT_ESCAPE_CHARACTER    = 'escape_character';
    public const OPT_CONFIG_FILE         = 'config_file';
    public const OPT_IDENTIFICATION_FILE = 'identification_file';
    public const OPT_USERNAME            = 'username';
    public const OPT_MAC_ALGORITHM       = 'mac_algorithm';
    public const OPT_OPTION              = 'option';
    public const OPT_PORT                = 'port';
    public const OPT_SUBSYSTEM           = 'subsystem';
    public const OPT_NO_SESSION          = 'no_session';
    public const OPT_FORCE_TTY           = 'force_tty';
    public const OPT_PASSWORD_FILE       = 'password_file';

    protected $OPTIONS_LIST = [
        self::OPT_PROTOCOL_V1         => ['option' => '1'],
        self::OPT_PROTOCOL_V2         => ['option' => '2'],
        self::OPT_IPV4                => ['option' => '4'],
        self::OPT_IPV6                => ['option' => '6'],
        self::OPT_DISABLE_AUTH        => ['option' => 'a'],
        self::OPT_CIPHER              => ['option' => 'c', 'argument' => true],
        self::OPT_COMPRESSION         => ['option' => 'C'],
        self::OPT_DEBUG_LEVEL         => ['option' => 'd', 'argument' => true],
        self::OPT_ESCAPE_CHARACTER    => ['option' => 'e', 'argument' => true],
        self::OPT_CONFIG_FILE         => ['option' => 'F', 'argument' => true],
        self::OPT_IDENTIFICATION_FILE => ['option' => 'i', 'argument' => true],
        self::OPT_USERNAME            => ['option' => 'l', 'argument' => true],
        self::OPT_MAC_ALGORITHM       => ['option' => 'm', 'argument' => true],
        self::OPT_OPTION              => ['option' => 'o', 'argument' => true, 'repeatable' => true],
        self::OPT_PORT                => ['option' => 'p', 'argument' => true],
        self::OPT_SUBSYSTEM           => ['option' => 's', 'argument' => true],
        self::OPT_NO_SESSION          => ['option' => 'S', 'argument' => true],
        self::OPT_FORCE_TTY           => ['option' => 't', 'argument' => true],
        self::OPT_PASSWORD_FILE       => ['option' => 'W', 'argument' => true],
    ];

    public function __construct(?array $config = null) {
        $this->config = array_merge($this->config, $config ?: []);

        if ($this->config[self::CONF_OPTIONS]) {
            $this->setOptions($this->config[self::CONF_OPTIONS]);
        }

        parent::__construct($this->config[self::CONF_EXECUTABLE], false);
    }

    public function setOption(string $optName, $val = true) :self {
        parent::setOption($optName, $val);

        return $this;
    }

    public function setOptions(array $options) :self {
        foreach ($options as $option => $value) {
            self::setOption($option, $value);
        }

        return $this;
    }
}
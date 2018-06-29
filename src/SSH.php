<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;


/**
 * Class SSH
 *
 * @package xobotyi\rsync
 */
class SSH extends Command
{
    /**
     * Path to ssh executable
     */
    public const CONF_EXECUTABLE = 'executable';
    /**
     * Array of options that has to be set
     */
    public const CONF_OPTIONS = 'options';
    /**
     * Specifies one or more (comma-separated) encryption algorithms supported by the client.
     *
     * The cipher used for a given session is the cipher highest in the client's order of preference that is also
     * supported by the server. Allowed values are 'aes128-ctr', 'aes128-cbc', 'aes192-ctr', 'aes192-cbc',
     * 'aes256-ctr', 'aes256-cbc',
     * 'blowfish-cbc', 'arcfour', 'arcfour128', 'arcfour256', 'cast128-cbc', and '3des-cbc'.
     *
     * You can also set this value to 'none'. When 'none' is the agreed on cipher, data is not encrypted. Note that
     * this method provides no confidentiality protection, and is not recommended.
     *
     * The following values are provided for convenience: 'aes' (all supported aes ciphers), 'blowfish' (equivalent to
     * 'blowfish-cbc'), 'cast' (equivalent to 'cast128-cbc'), '3des' (equivalent to '3des-cbc'), 'Any' or 'AnyStd' (all
     * available ciphers plus 'none'), and 'AnyCipher' or 'AnyStdCipher' (all available ciphers).
     */
    public const OPT_CIPHER = 'cipher';
    /**
     * Disables compression. Compression is desirable on modem lines and other slow connections, but will slow down
     * response rates on fast networks. Compression also adds extra randomness to the packet, making it harder for a
     * malicious person to decrypt the packet. Compression can be enabled using the Compression keyword in the
     * configuration file. Using -C overrides the configuration file setting.
     */
    public const OPT_COMPRESSION = 'compression';
    /**
     * Specifies an additional configuration file. Settings are read from this file in addition to the default
     * user-specific file (~/.ssh2/ssh2_config and/or the system-wide file (/etc/ssh2/ssh2_config).Settings in this
     * file override settings in both the user-specific file and the system-wide file.
     */
    public const OPT_CONFIG_FILE = 'config_file';
    /**
     * Sets the debug level. Increasing the value increases the amount of information displayed. Use 1, 2, 3, or 99.
     * (Values 4-98 are accepted, but are equivalent to 3.)
     *
     * Note: Setting logging to 99 can increase your security risk. At this level, information leakage is a concern, as
     * unencrypted protocol information may be written out. Also, the volume of information written may fill up disk
     * space rapidly, potentially causing the host or Reflection for Secure IT to stop responding.
     */
    public const OPT_DEBUG_LEVEL = 'debug_level';
    /**
     * Disables authentication agent forwarding. Authentication agent forwarding is enabled using the ForwardAgent
     * keyword, which is set to 'yes' by default.
     */
    public const OPT_DISABLE_AUTH = 'disable_auth';
    /**
     * Sets the escape character for the terminal session. The default character is a tilde (~). Setting the escape
     * character to 'none' means that no escape character is available and the tilde acts like any other character.
     */
    public const OPT_ESCAPE_CHARACTER = 'escape_character';
    /**
     * Forces a tty allocation even if a command is specified.
     */
    public const OPT_FORCE_TTY = 'force_tty';
    /**
     * Specifies an alternate identification file to use for public key authentication. The file location is assumed to
     * be in the current working directory unless you specify a fully-qualified or relative path. The default identity
     * file is ~/.ssh2/identification.
     */
    public const OPT_IDENTIFICATION_FILE = 'identification_file';
    /**
     * Forces connections using IPv4 addresses only.
     */
    public const OPT_IPV4 = 'ipv4';
    /**
     * Forces connections using IPv6 addresses only.
     */
    public const OPT_IPV6 = 'ipv6';
    /**
     * Specifies, in order of preference, which MACs (message authentication codes) are supported by the client.
     * Allowed values are 'hmac-sha256', 'hmac-sha1', 'hmac-sha1-96', 'hmac-md5', 'hmac-md5-96', 'hmac-sha512', and
     * 'hmac-ripemd160'. Use 'AnyMac' to support all of these. Use 'AnyStdMac' to specify 'hmac-sha256,
     * hmac-sha1,hmac-sha1-96,hmac-md5,hmac-md5-96, hmac-sha512'. Specifying hmac-sha256 also enables hmac-sha2-256.
     * Specifying hmac-sha512 also enables hmac-sha2-512. Multiple MACs can also be specified as a comma-separated
     * list. Additional options are 'none', 'any' (equivalent to AnyMac plus 'none'), and 'AnyStd' (equivalent to
     * 'AnyStdMac' plus 'none'). When 'none' is the agreed on MAC, no message authentication code is used. Because this
     * provides no data integrity protection, options that include 'none' are not recommended.
     */
    public const OPT_MAC_ALGORITHM = 'mac_algorithm';
    /**
     * Connects without requesting a session channel on the server. This can be used with port-forwarding requests if a
     * session channel (and tty) is not needed, or the server does not give one
     */
    public const OPT_NO_SESSION = 'no_session';
    /**
     * Sets any option that can be configured using a configuration file keyword. For a list of keywords and their
     * meanings, see ssh2_config(5). Syntax alternatives are shown below. Use quotation marks to contain expressions
     * that include spaces.
     */
    public const OPT_OPTION = 'option';
    /**
     * Specifies a file containing the password to use for the connection. Set permissions on the password file to 600;
     * the file is not accepted if it has read or write permissions for group or other. Also, for a non-root user, the
     * file is not accepted if there has been a change in identity (userid). This option applies only to password
     * authentication. If AllowedAuthentications is configured to attempt keyboard-interactive before password
     * authentication (the default), users will receive a password prompt even if a valid password file is present. To
     * prevent this, modify the allowed authentications list to support only password authentication or to attempt
     * password authentication before keyboard-interactive.
     *
     * Note: Passphraseless public keys provide a more secure way to configure authentication without requiring user
     * interaction, because private keys are not transmitted over the encrypted connection like passwords are.
     */
    public const OPT_PASSWORD_FILE = 'password_file';
    /**
     * Specifies the port to connect to on the server. The default is 22, which is the standard port for Secure Shell
     * connections.
     */
    public const OPT_PORT = 'port';
    /**
     * Use protocol version 1 only.
     */
    public const OPT_PROTOCOL_V1 = 'protocol_v1';
    /**
     * Use protocol version 2 only.
     */
    public const OPT_PROTOCOL_V2 = 'protocol_v2';
    /**
     * Invokes the specified subsystem on the remote system. Subsystems are a feature of the Secure Shell protocol
     * which facilitates the use of Secure Shell as a secure transport for other applications (such as sftp).
     * Subsystems must be defined by the Secure Shell server.
     */
    public const OPT_SUBSYSTEM = 'subsystem';
    /**
     * Specifies a name to use for login on the remote computer. (Note: If you include the optional [user@] as part of
     * your host specification, * -l overrides the specified user name.)
     */
    public const OPT_USERNAME = 'username';
    /**
     * @var array
     */
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
    /**
     * @var array
     */
    private $config = [
        self::CONF_EXECUTABLE => 'ssh',
        self::CONF_OPTIONS    => [],
    ];

    /**
     * SSH constructor.
     *
     * @param array|null $config
     *
     * @throws Exception\Command
     */
    public function __construct(?array $config = null) {
        $this->config = array_merge($this->config, $config ?: []);

        if ($this->config[self::CONF_OPTIONS]) {
            $this->setOptions($this->config[self::CONF_OPTIONS]);
        }

        parent::__construct($this->config[self::CONF_EXECUTABLE]);
    }

    /**
     * Set the command's option.
     *
     * @param string $optName option name (see the constants list for options names and its descriptions)
     * @param mixed  $val     option value, by default is true, if has false value - option wil be removed from result
     *                        command.
     *
     * @return \xobotyi\rsync\SSH
     * @throws Exception\Command
     */
    public function setOption(string $optName, $val = true) :self {
        switch ($optName) {
            case self::OPT_CONFIG_FILE:
            case self::OPT_PASSWORD_FILE:
            case self::OPT_IDENTIFICATION_FILE:
                if (!is_string($val) || !is_readable($val)) {
                    throw new Exception\Command("File {$val} for option {$optName} is not readable");
                }
                $val = realpath($val);
                break;
        }

        parent::setOption($optName, $val);

        return $this;
    }
}
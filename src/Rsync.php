<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;


class Rsync extends Command
{

    /**
     * preserve ACLs (implies --perms)
     */
    public const OPT_ACLS = 'acls';
    /**
     * bind address for outgoing socket to daemon
     */
    public const OPT_ADDRESS = 'address';
    /**
     * append data onto shorter files
     */
    public const OPT_APPEND = 'append';
    /**
     * like --append, but with old data in file checksum
     */
    public const OPT_APPEND_VERIFY = 'append-verify';
    /**
     * archive mode; equals -rlptgoD (no -H,-A,-X)
     */
    public const OPT_ARCHIVE = 'archive';
    /**
     * make backups (see --suffix & --backup-dir)
     */
    public const OPT_BACKUP = 'backup';
    /**
     * make backups into hierarchy based in DIR
     */
    public const OPT_BACKUP_DIR = 'backup-dir';
    /**
     * use blocking I/O for the remote shell
     */
    public const OPT_BLOCKING_IO = 'blocking-io';
    /**
     * force a fixed checksum block-size
     */
    public const OPT_BLOCK_SIZE = 'block-size';
    /**
     * limit I/O bandwidth; KBytes per second
     */
    public const OPT_BWLIMIT = 'bwlimit';
    /**
     * skip based on checksum, not mod-time & size
     */
    public const OPT_CHECKSUM = 'checksum';
    /**
     * affect file and/or directory permissions
     */
    public const OPT_CHMOD = 'chmod';
    /**
     * compare destination files relative to DIR
     */
    public const OPT_COMPARE_DEST = 'compare-dest';
    /**
     * compress file data during the transfer
     */
    public const OPT_COMPRESS = 'compress';
    /**
     * explicitly set compression level
     */
    public const OPT_COMPRESS_LEVEL = 'compress-level';
    /**
     * set daemon connection timeout in seconds
     */
    public const OPT_CONTIMEOUT = 'contimeout';
    /**
     * include copies of unchanged files
     */
    public const OPT_COPY_DEST = 'copy-dest';
    /**
     * copy device contents as regular file
     */
    public const OPT_COPY_DEVICES = 'copy-devices';
    /**
     * transform symlink to a dir into referent dir
     */
    public const OPT_COPY_DIRLINKS = 'copy-dirlinks';
    /**
     * transform symlink into referent file/dir
     */
    public const OPT_COPY_LINKS = 'copy-links';
    /**
     * only "unsafe" symlinks are transformed
     */
    public const OPT_COPY_UNSAFE_LINKS = 'copy-unsafe-links';
    /**
     * auto-ignore files the same way CVS does
     */
    public const OPT_CVS_EXCLUDE = 'cvs-exclude';
    /**
     * an alias for --delete-during
     */
    public const OPT_DEL = 'del';
    /**
     * put all updated files into place at transfer's end
     */
    public const OPT_DELAY_UPDATES = 'delay-updates';
    /**
     * delete extraneous files from destination dirs
     */
    public const OPT_DELETE = 'delete';
    /**
     * receiver deletes after transfer, not during
     */
    public const OPT_DELETE_AFTER = 'delete-after';
    /**
     * receiver deletes before transfer, not during
     */
    public const OPT_DELETE_BEFORE = 'delete-before';
    /**
     * find deletions during, delete after
     */
    public const OPT_DELETE_DELAY = 'delete-delay';
    /**
     * receiver deletes during transfer (default)
     */
    public const OPT_DELETE_DURING = 'delete-during';
    /**
     * delete excluded files from destination dirs
     */
    public const OPT_DELETE_EXCLUDED = 'delete-excluded';
    /**
     * preserve device files (super-user only)
     */
    public const OPT_DEVICES = 'devices';
    /**
     * transfer directories without recursing
     */
    public const OPT_DIRS = 'dirs';
    /**
     * perform a trial run with no changes made
     */
    public const OPT_DRY_RUN = 'dry-run';
    /**
     * exclude files matching PATTERN
     */
    public const OPT_EXCLUDE = 'exclude';
    /**
     * read exclude patterns from FILE
     */
    public const OPT_EXCLUDE_FROM = 'exclude-from';
    /**
     * preserve the file's executability
     */
    public const OPT_EXECUTABILITY = 'executability';
    /**
     * skip creating new files on receiver
     */
    public const OPT_EXISTING = 'existing';
    /**
     * store/recover privileged attrs using xattrs
     */
    public const OPT_FAKE_SUPER = 'fake-super';
    /**
     * read list of source-file names from FILE
     */
    public const OPT_FILES_FROM = 'files-from';
    /**
     * add a file-filtering RULE
     */
    public const OPT_FILTER = 'filter';
    /**
     * force deletion of directories even if not empty
     */
    public const OPT_FORCE = 'force';
    /**
     * all *-from/filter files are delimited by 0s
     */
    public const OPT_FROM0 = 'from0';
    /**
     * find similar file for basis if no dest file
     */
    public const OPT_FUZZY = 'fuzzy';
    /**
     * preserve group
     */
    public const OPT_GROUP = 'group';
    /**
     * preserve hard links
     */
    public const OPT_HARD_LINKS = 'hard-links';
    /**
     * show help
     */
    public const OPT_HELP = 'help';
    /**
     * output numbers in a human-readable format
     */
    public const OPT_HUMAN_READABLE = 'human-readable';
    /**
     * request charset conversion of filenames
     */
    public const OPT_ICONV = 'iconv';
    /**
     * delete even if there are I/O errors
     */
    public const OPT_IGNORE_ERRORS = 'ignore-errors';
    /**
     * skip updating files that already exist on receiver
     */
    public const OPT_IGNORE_EXISTING = 'ignore-existing';
    /**
     * don't skip files that match in size and mod-time
     */
    public const OPT_IGNORE_TIMES = 'ignore-times';
    /**
     * don't exclude files matching PATTERN
     */
    public const OPT_INCLUDE = 'include';
    /**
     * read include patterns from FILE
     */
    public const OPT_INCLUDE_FROM = 'include-from';
    /**
     * update destination files in-place
     */
    public const OPT_INPLACE = 'inplace';
    /**
     * prefer IPv4
     */
    public const OPT_IPV4 = 'ipv4';
    /**
     * prefer IPv6
     */
    public const OPT_IPV6 = 'ipv6';
    /**
     * output a change-summary for all updates
     */
    public const OPT_ITEMIZE_CHANGES = 'itemize-changes';
    /**
     * treat symlinked dir on receiver as dir
     */
    public const OPT_KEEP_DIRLINKS = 'keep-dirlinks';
    /**
     * copy symlinks as symlinks
     */
    public const OPT_LINKS = 'links';
    /**
     * hardlink to files in DIR when unchanged
     */
    public const OPT_LINK_DEST = 'link-dest';
    /**
     * list the files instead of copying them
     */
    public const OPT_LIST_ONLY = 'list-only';
    /**
     * log what we're doing to the specified FILE
     */
    public const OPT_LOG_FILE = 'log-file';
    /**
     * log updates using the specified FMT
     */
    public const OPT_LOG_FILE_FORMAT = 'log-file-format';
    /**
     * don't delete more than NUM files
     */
    public const OPT_MAX_DELETE = 'max-delete';
    /**
     * don't transfer any file larger than SIZE
     */
    public const OPT_MAX_SIZE = 'max-size';
    /**
     * don't transfer any file smaller than SIZE
     */
    public const OPT_MIN_SIZE = 'min-size';
    /**
     * compare mod-times with reduced accuracy
     */
    public const OPT_MODIFY_WINDOW = 'modify-window';
    /**
     * don't send implied dirs with --relative
     */
    public const OPT_NO_IMPLIED_DIRS = 'no-implied-dirs';
    /**
     * suppress daemon-mode MOTD
     */
    public const OPT_NO_MOTD = 'no-motd';
    /**
     * turn off an implied OPTION (e.g. --no-D)
     */
    public const OPT_NO_OPTION = 'no-OPTION';
    /**
     * don't map uid/gid values by user/group name
     */
    public const OPT_NUMERIC_IDS = 'numeric-ids';
    /**
     * omit directories from --times
     */
    public const OPT_OMIT_DIR_TIMES = 'omit-dir-times';
    /**
     * omit symlinks from --times
     */
    public const OPT_OMIT_LINK_TIMES = 'omit-link-times';
    /**
     * don't cross filesystem boundaries
     */
    public const OPT_ONE_FILE_SYSTEM = 'one-file-system';
    /**
     * like --write-batch but w/o updating destination
     */
    public const OPT_ONLY_WRITE_BATCH = 'only-write-batch';
    /**
     * leave high-bit chars unescaped in output
     */
    public const OPT_OUTPUT_8_BIT = '8-bit-output';
    /**
     * output updates using the specified FORMAT
     */
    public const OPT_OUT_FORMAT = 'out-format';
    /**
     * preserve owner (super-user only)
     */
    public const OPT_OWNER = 'owner';
    /**
     * keep partially transferred files
     */
    public const OPT_PARTIAL = 'partial';
    /**
     * put a partially transferred file into DIR
     */
    public const OPT_PARTIAL_DIR = 'partial-dir';
    /**
     * read daemon-access password from FILE
     */
    public const OPT_PASSWORD_FILE = 'password-file';
    /**
     * preserve permissions
     */
    public const OPT_PERMS = 'perms';
    /**
     * specify double-colon alternate port number
     */
    public const OPT_PORT = 'port';
    /**
     * show progress during transfer
     */
    public const OPT_PROGRESS = 'progress';
    /**
     * no space-splitting; only wildcard special-chars
     */
    public const OPT_PROTECT_ARGS = 'protect-args';
    /**
     * force an older protocol version to be used
     */
    public const OPT_PROTOCOL = 'protocol';
    /**
     * prune empty directory chains from the file-list
     */
    public const OPT_PRUNE_EMPTY_DIRS = 'prune-empty-dirs';
    /**
     * suppress non-error messages
     */
    public const OPT_QUIET = 'quiet';
    /**
     * read a batched update from FILE
     */
    public const OPT_READ_BATCH = 'read-batch';
    /**
     * send OPTION to the remote side only
     */
    public const OPT_REMOTE_OPTION = 'remote-option';
    /**
     * recurse into directories
     */
    public const OPT_RECURSIVE = 'recursive';
    /**
     * use relative path names
     */
    public const OPT_RELATIVE = 'relative';
    /**
     * sender removes synchronized files (non-dirs)
     */
    public const OPT_REMOVE_SOURCE_FILES = 'remove-source-files';
    /**
     * specify the remote shell to use
     */
    public const OPT_RSH = 'rsh';
    /**
     * specify the rsync to run on the remote machine
     */
    public const OPT_RSYNC_PATH = 'rsync-path';
    /**
     * ignore symlinks that point outside the source tree
     */
    public const OPT_SAFE_LINKS = 'safe-links';
    /**
     * skip files that match in size
     */
    public const OPT_SIZE_ONLY = 'size-only';
    /**
     * skip compressing files with a suffix in LIST
     */
    public const OPT_SKIP_COMPRESS = 'skip-compress';
    /**
     * specify custom TCP options
     */
    public const OPT_SOCKOPTS = 'sockopts';
    /**
     * handle sparse files efficiently
     */
    public const OPT_SPARSE = 'sparse';
    /**
     * preserve special files
     */
    public const OPT_SPECIALS = 'specials';
    /**
     * give some file-transfer stats
     */
    public const OPT_STATS = 'stats';
    /**
     * set backup suffix (default ~ w/o --backup-dir)
     */
    public const OPT_SUFFIX = 'suffix';
    /**
     * receiver attempts super-user activities
     */
    public const OPT_SUPER = 'super';
    /**
     * create temporary files in directory DIR
     */
    public const OPT_TEMP_DIR = 'temp-dir';
    /**
     * set I/O timeout in seconds
     */
    public const OPT_TIMEOUT = 'timeout';
    /**
     * preserve modification times
     */
    public const OPT_TIMES = 'times';
    /**
     * skip files that are newer on the receiver
     */
    public const OPT_UPDATE = 'update';
    /**
     * increase verbosity
     */
    public const OPT_VERBOSE = 'verbose';
    /**
     * print version number
     */
    public const OPT_VERSION = 'version';
    /**
     * copy files whole (without delta-xfer algorithm)
     */
    public const OPT_WHOLE_FILE = 'whole-file';
    /**
     * write a batched update to FILE
     */
    public const OPT_WRITE_BATCH = 'write-batch';
    /**
     * preserve extended attributes
     */
    public const OPT_XATTRS = 'xattrs';

    /**
     * Path to rsync executable
     */
    public const CONF_EXECUTABLE = 'executable';
    /**
     * Path to CWD of rsync execution
     */
    public const CONF_CWD = 'cwd';
    /**
     * Array of configs for SSH instance or SSH instance itself
     */
    public const CONF_SSH = 'ssh';
    /**
     * Array of options for rsync
     */
    public const CONF_OPTIONS = 'options';

    /**
     * @var array
     */
    protected $OPTIONS_LIST = [
        self::OPT_ACLS                => ['option' => 'A'],
        self::OPT_ADDRESS             => ['option' => 'address', 'argument' => true],
        self::OPT_APPEND              => ['option' => 'append'],
        self::OPT_APPEND_VERIFY       => ['option' => 'append-verify'],
        self::OPT_ARCHIVE             => ['option' => 'a'],
        self::OPT_BACKUP              => ['option' => 'b'],
        self::OPT_BACKUP_DIR          => ['option' => 'backup-dir', 'argument' => true],
        self::OPT_BLOCKING_IO         => ['option' => 'blocking-io'],
        self::OPT_BLOCK_SIZE          => ['option' => 'B', 'argument' => true],
        self::OPT_BWLIMIT             => ['option' => 'bwlimit', 'argument' => true],
        self::OPT_CHECKSUM            => ['option' => 'c'],
        self::OPT_CHMOD               => ['option' => 'chmod', 'argument' => true],
        self::OPT_COMPARE_DEST        => ['option' => 'compare-dest', 'argument' => true],
        self::OPT_COMPRESS            => ['option' => 'z'],
        self::OPT_COMPRESS_LEVEL      => ['option' => 'compress-level', 'argument' => true],
        self::OPT_CONTIMEOUT          => ['option' => 'contimeout', 'argument' => true],
        self::OPT_COPY_DEST           => ['option' => 'copy-dest', 'argument' => true],
        self::OPT_COPY_DEVICES        => ['option' => 'copy-devices'],
        self::OPT_COPY_DIRLINKS       => ['option' => 'k'],
        self::OPT_COPY_LINKS          => ['option' => 'L'],
        self::OPT_COPY_UNSAFE_LINKS   => ['option' => 'copy-unsafe-links'],
        self::OPT_CVS_EXCLUDE         => ['option' => 'C'],
        self::OPT_DEL                 => ['option' => 'del'],
        self::OPT_DELAY_UPDATES       => ['option' => 'delay-updates'],
        self::OPT_DELETE              => ['option' => 'delete'],
        self::OPT_DELETE_AFTER        => ['option' => 'delete-after'],
        self::OPT_DELETE_BEFORE       => ['option' => 'delete-before'],
        self::OPT_DELETE_DELAY        => ['option' => 'delete-delay'],
        self::OPT_DELETE_DURING       => ['option' => 'delete-during'],
        self::OPT_DELETE_EXCLUDED     => ['option' => 'delete-excluded'],
        self::OPT_DEVICES             => ['option' => 'devices'],
        self::OPT_DIRS                => ['option' => 'd'],
        self::OPT_DRY_RUN             => ['option' => 'n'],
        self::OPT_EXCLUDE             => ['option' => 'exclude', 'argument' => true, 'repeatable' => true],
        self::OPT_EXCLUDE_FROM        => ['option' => 'exclude-from', 'argument' => true],
        self::OPT_EXECUTABILITY       => ['option' => 'E'],
        self::OPT_EXISTING            => ['option' => 'existing'],
        self::OPT_FAKE_SUPER          => ['option' => 'fake-super'],
        self::OPT_FILES_FROM          => ['option' => 'files-from', 'argument' => true],
        self::OPT_FILTER              => ['option' => 'f', 'argument' => true],
        self::OPT_FORCE               => ['option' => 'force'],
        self::OPT_FROM0               => ['option' => '0'],
        self::OPT_FUZZY               => ['option' => 'y'],
        self::OPT_GROUP               => ['option' => 'g'],
        self::OPT_HARD_LINKS          => ['option' => 'H'],
        self::OPT_HELP                => ['option' => 'help'],
        self::OPT_HUMAN_READABLE      => ['option' => 'h'],
        self::OPT_ICONV               => ['option' => 'iconv', 'argument' => true],
        self::OPT_IGNORE_ERRORS       => ['option' => 'ignore-errors'],
        self::OPT_IGNORE_EXISTING     => ['option' => 'ignore-existing'],
        self::OPT_IGNORE_TIMES        => ['option' => 'I'],
        self::OPT_INCLUDE             => ['option' => 'include', 'argument' => true, 'repeatable' => true],
        self::OPT_INCLUDE_FROM        => ['option' => 'include-from', 'argument' => true],
        self::OPT_INPLACE             => ['option' => 'inplace'],
        self::OPT_IPV4                => ['option' => '4'],
        self::OPT_IPV6                => ['option' => '6'],
        self::OPT_ITEMIZE_CHANGES     => ['option' => 'i'],
        self::OPT_KEEP_DIRLINKS       => ['option' => 'K'],
        self::OPT_LINKS               => ['option' => 'l'],
        self::OPT_LINK_DEST           => ['option' => 'link-dest', 'argument' => true],
        self::OPT_LIST_ONLY           => ['option' => 'list-only'],
        self::OPT_LOG_FILE            => ['option' => 'log-file', 'argument' => true],
        self::OPT_LOG_FILE_FORMAT     => ['option' => 'log-file-format', 'argument' => true],
        self::OPT_MAX_DELETE          => ['option' => 'max-delete', 'argument' => true],
        self::OPT_MAX_SIZE            => ['option' => 'max-size', 'argument' => true],
        self::OPT_MIN_SIZE            => ['option' => 'min-size', 'argument' => true],
        self::OPT_MODIFY_WINDOW       => ['option' => 'modify-window', 'argument' => true],
        self::OPT_NO_IMPLIED_DIRS     => ['option' => 'no-implied-dirs'],
        self::OPT_NO_MOTD             => ['option' => 'no-motd'],
        self::OPT_NO_OPTION           => ['option' => 'no-OPTION'],
        self::OPT_NUMERIC_IDS         => ['option' => 'numeric-ids'],
        self::OPT_OMIT_DIR_TIMES      => ['option' => 'O'],
        self::OPT_OMIT_LINK_TIMES     => ['option' => 'J'],
        self::OPT_ONE_FILE_SYSTEM     => ['option' => 'x'],
        self::OPT_ONLY_WRITE_BATCH    => ['option' => 'only-write-batch', 'argument' => true],
        self::OPT_OUTPUT_8_BIT        => ['option' => '8'],
        self::OPT_OUT_FORMAT          => ['option' => 'out-format', 'argument' => true],
        self::OPT_OWNER               => ['option' => 'o'],
        self::OPT_PARTIAL             => ['option' => 'partial'],
        self::OPT_PARTIAL_DIR         => ['option' => 'partial-dir', 'argument' => true],
        self::OPT_PASSWORD_FILE       => ['option' => 'password-file', 'argument' => true],
        self::OPT_PERMS               => ['option' => 'p'],
        self::OPT_PORT                => ['option' => 'port', 'argument' => true],
        self::OPT_PROGRESS            => ['option' => 'progress'],
        self::OPT_PROTECT_ARGS        => ['option' => 's'],
        self::OPT_PROTOCOL            => ['option' => 'protocol', 'argument' => true],
        self::OPT_PRUNE_EMPTY_DIRS    => ['option' => 'm'],
        self::OPT_QUIET               => ['option' => 'q'],
        self::OPT_READ_BATCH          => ['option' => 'read-batch', 'argument' => true],
        self::OPT_RECURSIVE           => ['option' => 'r'],
        self::OPT_RELATIVE            => ['option' => 'R'],
        self::OPT_REMOVE_SOURCE_FILES => ['option' => 'remove-source-files'],
        self::OPT_REMOTE_OPTION       => ['option' => 'M', 'argument' => true],
        self::OPT_RSH                 => ['option' => 'e', 'argument' => true],
        self::OPT_RSYNC_PATH          => ['option' => 'rsync-path', 'argument' => true],
        self::OPT_SAFE_LINKS          => ['option' => 'safe-links'],
        self::OPT_SIZE_ONLY           => ['option' => 'size-only'],
        self::OPT_SKIP_COMPRESS       => ['option' => 'skip-compress', 'argument' => true],
        self::OPT_SOCKOPTS            => ['option' => 'sockopts', 'argument' => true],
        self::OPT_SPARSE              => ['option' => 'S'],
        self::OPT_SPECIALS            => ['option' => 'specials'],
        self::OPT_STATS               => ['option' => 'stats'],
        self::OPT_SUFFIX              => ['option' => 'suffix', 'argument' => true],
        self::OPT_SUPER               => ['option' => 'super'],
        self::OPT_TEMP_DIR            => ['option' => 'T', 'argument' => true],
        self::OPT_TIMEOUT             => ['option' => 'timeout', 'argument' => true],
        self::OPT_TIMES               => ['option' => 't'],
        self::OPT_UPDATE              => ['option' => 'u'],
        self::OPT_VERBOSE             => ['option' => 'v'],
        self::OPT_VERSION             => ['option' => 'version'],
        self::OPT_WHOLE_FILE          => ['option' => 'W'],
        self::OPT_WRITE_BATCH         => ['option' => 'write-batch', 'argument' => true],
        self::OPT_XATTRS              => ['option' => 'xattrs'],
    ];

    /**
     * @var array
     */
    private $config = [
        self::CONF_EXECUTABLE => 'rsync',
        self::CONF_CWD        => './',
        self::CONF_SSH        => null,
        self::CONF_OPTIONS    => [],
    ];

    /**
     * Rsync constructor.
     *
     * @param array|null $config
     *
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function __construct(?array $config = null) {
        $this->config = array_merge($this->config, $config ?: []);

        $this->setOptions($this->config[self::CONF_OPTIONS])
             ->setSSH($this->config[self::CONF_SSH]);

        parent::__construct($this->config[self::CONF_EXECUTABLE], $this->config[self::CONF_CWD]);
    }

    /**
     * @return string
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function __toString() :string {
        if (isset($this->config[self::CONF_SSH])) {
            $this->setOption(self::OPT_RSH, (string)$this->config[self::CONF_SSH]);
        }

        return parent::__toString();
    }

    /**
     * @return null|\xobotyi\rsync\SSH
     */
    public function getSSH() :?SSH {
        return $this->config[self::CONF_SSH];
    }

    /**
     * @param string $optName
     * @param mixed  $val
     *
     * @return \xobotyi\rsync\Rsync
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function setOption(string $optName, $val = true) :self {
        switch ($optName) {
            case self::OPT_READ_BATCH:
            case self::OPT_PASSWORD_FILE:
            case self::OPT_EXCLUDE_FROM:
            case self::OPT_INCLUDE_FROM:
            case self::OPT_FILES_FROM:
                if (!is_string($val) || !is_readable($val)) {
                    throw new Exception\Command("File {$val} for option {$optName} is not readable");
                }

                $val = realpath($val);
                break;
        }

        parent::setOption($optName, $val);

        return $this;
    }

    /**
     * @param $ssh
     *
     * @return \xobotyi\rsync\Rsync
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function setSSH($ssh) :self {
        if ($ssh instanceof SSH) {
            $this->config[self::CONF_SSH] = $ssh;
        }
        else if (is_array($ssh)) {
            $this->config[self::CONF_SSH] = new SSH($ssh);
        }
        else if ($ssh === null) {
            $this->config[self::CONF_SSH] = null;
        }
        else {
            throw new Exception\Command('ssh config has to be an instance of \xobotyi\rsync\SSH, array or null, got ' . gettype($ssh));
        }

        return $this;
    }

    /**
     * @param string $from
     * @param string $to
     *
     * @return \xobotyi\rsync\Rsync
     * @throws \xobotyi\rsync\Exception\Command
     */
    public function sync(string $from, string $to) :self {

        $this->setParameters([$from, $to]);
        $this->execute()
             ->clearParameters();

        return $this;
    }
}
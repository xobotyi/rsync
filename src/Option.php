<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;


class Option
{
    /**
     * preserve ACLs (implies --perms)
     */
    public const ACLS = 'acls';
    /**
     * bind address for outgoing socket to daemon
     */
    public const ADDRESS = 'address';
    /**
     * append data onto shorter files
     */
    public const APPEND = 'append';
    /**
     * like --append, but with old data in file checksum
     */
    public const APPEND_VERIFY = 'append-verify';
    /**
     * archive mode; equals -rlptgoD (no -H,-A,-X)
     */
    public const ARCHIVE = 'archive';
    /**
     * make backups (see --suffix & --backup-dir)
     */
    public const BACKUP = 'backup';
    /**
     * make backups into hierarchy based in DIR
     */
    public const BACKUP_DIR = 'backup-dir';
    /**
     * use blocking I/O for the remote shell
     */
    public const BLOCKING_IO = 'blocking-io';
    /**
     * force a fixed checksum block-size
     */
    public const BLOCK_SIZE = 'block-size';
    /**
     * limit I/O bandwidth; KBytes per second
     */
    public const BWLIMIT = 'bwlimit';
    /**
     * skip based on checksum, not mod-time & size
     */
    public const CHECKSUM = 'checksum';
    /**
     * affect file and/or directory permissions
     */
    public const CHMOD = 'chmod';
    /**
     * compare destination files relative to DIR
     */
    public const COMPARE_DEST = 'compare-dest';
    /**
     * compress file data during the transfer
     */
    public const COMPRESS = 'compress';
    /**
     * explicitly set compression level
     */
    public const COMPRESS_LEVEL = 'compress-level';
    /**
     * set daemon connection timeout in seconds
     */
    public const CONTIMEOUT = 'contimeout';
    /**
     * include copies of unchanged files
     */
    public const COPY_DEST = 'copy-dest';
    /**
     * copy device contents as regular file
     */
    public const COPY_DEVICES = 'copy-devices';
    /**
     * transform symlink to a dir into referent dir
     */
    public const COPY_DIRLINKS = 'copy-dirlinks';
    /**
     * transform symlink into referent file/dir
     */
    public const COPY_LINKS = 'copy-links';
    /**
     * only "unsafe" symlinks are transformed
     */
    public const COPY_UNSAFE_LINKS = 'copy-unsafe-links';
    /**
     * auto-ignore files the same way CVS does
     */
    public const CVS_EXCLUDE = 'cvs-exclude';
    /**
     * an alias for --delete-during
     */
    public const DEL = 'del';
    /**
     * put all updated files into place at transfer's end
     */
    public const DELAY_UPDATES = 'delay-updates';
    /**
     * delete extraneous files from destination dirs
     */
    public const DELETE = 'delete';
    /**
     * receiver deletes after transfer, not during
     */
    public const DELETE_AFTER = 'delete-after';
    /**
     * receiver deletes before transfer, not during
     */
    public const DELETE_BEFORE = 'delete-before';
    /**
     * find deletions during, delete after
     */
    public const DELETE_DELAY = 'delete-delay';
    /**
     * receiver deletes during transfer (default)
     */
    public const DELETE_DURING = 'delete-during';
    /**
     * delete excluded files from destination dirs
     */
    public const DELETE_EXCLUDED = 'delete-excluded';
    /**
     * preserve device files (super-user only)
     */
    public const DEVICES = 'devices';
    /**
     * transfer directories without recursing
     */
    public const DIRS = 'dirs';
    /**
     * perform a trial run with no changes made
     */
    public const DRY_RUN = 'dry-run';
    /**
     * exclude files matching PATTERN
     */
    public const EXCLUDE = 'exclude';
    /**
     * read exclude patterns from FILE
     */
    public const EXCLUDE_FROM = 'exclude-from';
    /**
     * preserve the file's executability
     */
    public const EXECUTABILITY = 'executability';
    /**
     * skip creating new files on receiver
     */
    public const EXISTING = 'existing';
    /**
     * store/recover privileged attrs using xattrs
     */
    public const FAKE_SUPER = 'fake-super';
    /**
     * read list of source-file names from FILE
     */
    public const FILES_FROM = 'files-from';
    /**
     * add a file-filtering RULE
     */
    public const FILTER = 'filter';
    /**
     * force deletion of directories even if not empty
     */
    public const FORCE = 'force';
    /**
     * all *-from/filter files are delimited by 0s
     */
    public const FROM0 = 'from0';
    /**
     * find similar file for basis if no dest file
     */
    public const FUZZY = 'fuzzy';
    /**
     * preserve group
     */
    public const GROUP = 'group';
    /**
     * preserve hard links
     */
    public const HARD_LINKS = 'hard-links';
    /**
     * show help
     */
    public const HELP = 'help';
    /**
     * output numbers in a human-readable format
     */
    public const HUMAN_READABLE = 'human-readable';
    /**
     * request charset conversion of filenames
     */
    public const ICONV = 'iconv';
    /**
     * delete even if there are I/O errors
     */
    public const IGNORE_ERRORS = 'ignore-errors';
    /**
     * skip updating files that already exist on receiver
     */
    public const IGNORE_EXISTING = 'ignore-existing';
    /**
     * don't skip files that match in size and mod-time
     */
    public const IGNORE_TIMES = 'ignore-times';
    /**
     * don't exclude files matching PATTERN
     */
    public const INCLUDE      = 'include';
    /**
     * read include patterns from FILE
     */
    public const INCLUDE_FROM = 'include-from';
    /**
     * update destination files in-place
     */
    public const INPLACE = 'inplace';
    /**
     * prefer IPv4
     */
    public const IPV4 = 'ipv4';
    /**
     * prefer IPv6
     */
    public const IPV6 = 'ipv6';
    /**
     * output a change-summary for all updates
     */
    public const ITEMIZE_CHANGES = 'itemize-changes';
    /**
     * treat symlinked dir on receiver as dir
     */
    public const KEEP_DIRLINKS = 'keep-dirlinks';
    /**
     * copy symlinks as symlinks
     */
    public const LINKS = 'links';
    /**
     * hardlink to files in DIR when unchanged
     */
    public const LINK_DEST = 'link-dest';
    /**
     * list the files instead of copying them
     */
    public const LIST_ONLY = 'list-only';
    /**
     * log what we're doing to the specified FILE
     */
    public const LOG_FILE = 'log-file';
    /**
     * log updates using the specified FMT
     */
    public const LOG_FILE_FORMAT = 'log-file-format';
    /**
     * don't delete more than NUM files
     */
    public const MAX_DELETE = 'max-delete';
    /**
     * don't transfer any file larger than SIZE
     */
    public const MAX_SIZE = 'max-size';
    /**
     * don't transfer any file smaller than SIZE
     */
    public const MIN_SIZE = 'min-size';
    /**
     * compare mod-times with reduced accuracy
     */
    public const MODIFY_WINDOW = 'modify-window';
    /**
     * don't send implied dirs with --relative
     */
    public const NO_IMPLIED_DIRS = 'no-implied-dirs';
    /**
     * suppress daemon-mode MOTD
     */
    public const NO_MOTD = 'no-motd';
    /**
     * turn off an implied OPTION (e.g. --no-D)
     */
    public const NO_OPTION = 'no-OPTION';
    /**
     * don't map uid/gid values by user/group name
     */
    public const NUMERIC_IDS = 'numeric-ids';
    /**
     * omit directories from --times
     */
    public const OMIT_DIR_TIMES = 'omit-dir-times';
    /**
     * don't cross filesystem boundaries
     */
    public const ONE_FILE_SYSTEM = 'one-file-system';
    /**
     * like --write-batch but w/o updating destination
     */
    public const ONLY_WRITE_BATCH = 'only-write-batch';
    /**
     * leave high-bit chars unescaped in output
     */
    public const OUTPUT_8_BIT = '8-bit-output';
    /**
     * output updates using the specified FORMAT
     */
    public const OUT_FORMAT = 'out-format';
    /**
     * preserve owner (super-user only)
     */
    public const OWNER = 'owner';
    /**
     * keep partially transferred files
     */
    public const PARTIAL = 'partial';
    /**
     * put a partially transferred file into DIR
     */
    public const PARTIAL_DIR = 'partial-dir';
    /**
     * read daemon-access password from FILE
     */
    public const PASSWORD_FILE = 'password-file';
    /**
     * preserve permissions
     */
    public const PERMS = 'perms';
    /**
     * specify double-colon alternate port number
     */
    public const PORT = 'port';
    /**
     * show progress during transfer
     */
    public const PROGRESS = 'progress';
    /**
     * no space-splitting; only wildcard special-chars
     */
    public const PROTECT_ARGS = 'protect-args';
    /**
     * force an older protocol version to be used
     */
    public const PROTOCOL = 'protocol';
    /**
     * prune empty directory chains from the file-list
     */
    public const PRUNE_EMPTY_DIRS = 'prune-empty-dirs';
    /**
     * suppress non-error messages
     */
    public const QUIET = 'quiet';
    /**
     * read a batched update from FILE
     */
    public const READ_BATCH = 'read-batch';
    /**
     * recurse into directories
     */
    public const RECURSIVE = 'recursive';
    /**
     * use relative path names
     */
    public const RELATIVE = 'relative';
    /**
     * sender removes synchronized files (non-dirs)
     */
    public const REMOVE_SOURCE_FILES = 'remove-source-files';
    /**
     * specify the remote shell to use
     */
    public const RSH = 'rsh';
    /**
     * specify the rsync to run on the remote machine
     */
    public const RSYNC_PATH = 'rsync-path';
    /**
     * ignore symlinks that point outside the source tree
     */
    public const SAFE_LINKS = 'safe-links';
    /**
     * skip files that match in size
     */
    public const SIZE_ONLY = 'size-only';
    /**
     * skip compressing files with a suffix in LIST
     */
    public const SKIP_COMPRESS = 'skip-compress';
    /**
     * specify custom TCP options
     */
    public const SOCKOPTS = 'sockopts';
    /**
     * handle sparse files efficiently
     */
    public const SPARSE = 'sparse';
    /**
     * preserve special files
     */
    public const SPECIALS = 'specials';
    /**
     * give some file-transfer stats
     */
    public const STATS = 'stats';
    /**
     * set backup suffix (default ~ w/o --backup-dir)
     */
    public const SUFFIX = 'suffix';
    /**
     * receiver attempts super-user activities
     */
    public const SUPER = 'super';
    /**
     * create temporary files in directory DIR
     */
    public const TEMP_DIR = 'temp-dir';
    /**
     * set I/O timeout in seconds
     */
    public const TIMEOUT = 'timeout';
    /**
     * preserve modification times
     */
    public const TIMES = 'times';
    /**
     * skip files that are newer on the receiver
     */
    public const UPDATE = 'update';
    /**
     * increase verbosity
     */
    public const VERBOSE = 'verbose';
    /**
     * print version number
     */
    public const VERSION = 'version';
    /**
     * copy files whole (without delta-xfer algorithm)
     */
    public const WHOLE_FILE = 'whole-file';
    /**
     * write a batched update to FILE
     */
    public const WRITE_BATCH = 'write-batch';
    /**
     * preserve extended attributes
     */
    public const XATTRS = 'xattrs';

    private const OPTIONS_LIST = [
        self::ACLS                => ['option' => 'acls', 'hasArgument' => false],
        self::ADDRESS             => ['option' => 'address', 'hasArgument' => true],
        self::APPEND              => ['option' => 'append', 'hasArgument' => false],
        self::APPEND_VERIFY       => ['option' => 'append-verify', 'hasArgument' => false],
        self::ARCHIVE             => ['option' => 'archive', 'hasArgument' => false],
        self::BACKUP              => ['option' => 'backup', 'hasArgument' => false],
        self::BACKUP_DIR          => ['option' => 'backup-dir', 'hasArgument' => true],
        self::BLOCKING_IO         => ['option' => 'blocking-io', 'hasArgument' => false],
        self::BLOCK_SIZE          => ['option' => 'block-size', 'hasArgument' => true],
        self::BWLIMIT             => ['option' => 'bwlimit', 'hasArgument' => true],
        self::CHECKSUM            => ['option' => 'checksum', 'hasArgument' => false],
        self::CHMOD               => ['option' => 'chmod', 'hasArgument' => true],
        self::COMPARE_DEST        => ['option' => 'compare-dest', 'hasArgument' => true],
        self::COMPRESS            => ['option' => 'compress', 'hasArgument' => false],
        self::COMPRESS_LEVEL      => ['option' => 'compress-level', 'hasArgument' => true],
        self::CONTIMEOUT          => ['option' => 'contimeout', 'hasArgument' => true],
        self::COPY_DEST           => ['option' => 'copy-dest', 'hasArgument' => true],
        self::COPY_DEVICES        => ['option' => 'copy-devices', 'hasArgument' => false],
        self::COPY_DIRLINKS       => ['option' => 'copy-dirlinks', 'hasArgument' => false],
        self::COPY_LINKS          => ['option' => 'copy-links', 'hasArgument' => false],
        self::COPY_UNSAFE_LINKS   => ['option' => 'copy-unsafe-links', 'hasArgument' => false],
        self::CVS_EXCLUDE         => ['option' => 'cvs-exclude', 'hasArgument' => false],
        self::DEL                 => ['option' => 'del', 'hasArgument' => false],
        self::DELAY_UPDATES       => ['option' => 'delay-updates', 'hasArgument' => false],
        self::DELETE              => ['option' => 'delete', 'hasArgument' => false],
        self::DELETE_AFTER        => ['option' => 'delete-after', 'hasArgument' => false],
        self::DELETE_BEFORE       => ['option' => 'delete-before', 'hasArgument' => false],
        self::DELETE_DELAY        => ['option' => 'delete-delay', 'hasArgument' => false],
        self::DELETE_DURING       => ['option' => 'delete-during', 'hasArgument' => false],
        self::DELETE_EXCLUDED     => ['option' => 'delete-excluded', 'hasArgument' => false],
        self::DEVICES             => ['option' => 'devices', 'hasArgument' => false],
        self::DIRS                => ['option' => 'dirs', 'hasArgument' => false],
        self::DRY_RUN             => ['option' => 'dry-run', 'hasArgument' => false],
        self::EXCLUDE             => ['option' => 'exclude', 'hasArgument' => true],
        self::EXCLUDE_FROM        => ['option' => 'exclude-from', 'hasArgument' => true],
        self::EXECUTABILITY       => ['option' => 'executability', 'hasArgument' => false],
        self::EXISTING            => ['option' => 'existing', 'hasArgument' => false],
        self::FAKE_SUPER          => ['option' => 'fake-super', 'hasArgument' => false],
        self::FILES_FROM          => ['option' => 'files-from', 'hasArgument' => true],
        self::FILTER              => ['option' => 'filter', 'hasArgument' => true],
        self::FORCE               => ['option' => 'force', 'hasArgument' => false],
        self::FROM0               => ['option' => 'from0', 'hasArgument' => false],
        self::FUZZY               => ['option' => 'fuzzy', 'hasArgument' => false],
        self::GROUP               => ['option' => 'group', 'hasArgument' => false],
        self::HARD_LINKS          => ['option' => 'hard-links', 'hasArgument' => false],
        self::HELP                => ['option' => 'help', 'hasArgument' => false],
        self::HUMAN_READABLE      => ['option' => 'human-readable', 'hasArgument' => false],
        self::ICONV               => ['option' => 'iconv', 'hasArgument' => true],
        self::IGNORE_ERRORS       => ['option' => 'ignore-errors', 'hasArgument' => false],
        self::IGNORE_EXISTING     => ['option' => 'ignore-existing', 'hasArgument' => false],
        self::IGNORE_TIMES        => ['option' => 'ignore-times', 'hasArgument' => false],
        self::INCLUDE             => ['option' => 'include', 'hasArgument' => true],
        self::INCLUDE_FROM        => ['option' => 'include-from', 'hasArgument' => true],
        self::INPLACE             => ['option' => 'inplace', 'hasArgument' => false],
        self::IPV4                => ['option' => 'ipv4', 'hasArgument' => false],
        self::IPV6                => ['option' => 'ipv6', 'hasArgument' => false],
        self::ITEMIZE_CHANGES     => ['option' => 'itemize-changes', 'hasArgument' => false],
        self::KEEP_DIRLINKS       => ['option' => 'keep-dirlinks', 'hasArgument' => false],
        self::LINKS               => ['option' => 'links', 'hasArgument' => false],
        self::LINK_DEST           => ['option' => 'link-dest', 'hasArgument' => true],
        self::LIST_ONLY           => ['option' => 'list-only', 'hasArgument' => false],
        self::LOG_FILE            => ['option' => 'log-file', 'hasArgument' => true],
        self::LOG_FILE_FORMAT     => ['option' => 'log-file-format', 'hasArgument' => true],
        self::MAX_DELETE          => ['option' => 'max-delete', 'hasArgument' => true],
        self::MAX_SIZE            => ['option' => 'max-size', 'hasArgument' => true],
        self::MIN_SIZE            => ['option' => 'min-size', 'hasArgument' => true],
        self::MODIFY_WINDOW       => ['option' => 'modify-window', 'hasArgument' => true],
        self::NO_IMPLIED_DIRS     => ['option' => 'no-implied-dirs', 'hasArgument' => false],
        self::NO_MOTD             => ['option' => 'no-motd', 'hasArgument' => false],
        self::NO_OPTION           => ['option' => 'no-OPTION', 'hasArgument' => false],
        self::NUMERIC_IDS         => ['option' => 'numeric-ids', 'hasArgument' => false],
        self::OMIT_DIR_TIMES      => ['option' => 'omit-dir-times', 'hasArgument' => false],
        self::ONE_FILE_SYSTEM     => ['option' => 'one-file-system', 'hasArgument' => false],
        self::ONLY_WRITE_BATCH    => ['option' => 'only-write-batch', 'hasArgument' => true],
        self::OUTPUT_8_BIT        => ['option' => '8-bit-output', 'hasArgument' => false],
        self::OUT_FORMAT          => ['option' => 'out-format', 'hasArgument' => true],
        self::OWNER               => ['option' => 'owner', 'hasArgument' => false],
        self::PARTIAL             => ['option' => 'partial', 'hasArgument' => false],
        self::PARTIAL_DIR         => ['option' => 'partial-dir', 'hasArgument' => true],
        self::PASSWORD_FILE       => ['option' => 'password-file', 'hasArgument' => true],
        self::PERMS               => ['option' => 'perms', 'hasArgument' => false],
        self::PORT                => ['option' => 'port', 'hasArgument' => true],
        self::PROGRESS            => ['option' => 'progress', 'hasArgument' => false],
        self::PROTECT_ARGS        => ['option' => 'protect-args', 'hasArgument' => false],
        self::PROTOCOL            => ['option' => 'protocol', 'hasArgument' => true],
        self::PRUNE_EMPTY_DIRS    => ['option' => 'prune-empty-dirs', 'hasArgument' => false],
        self::QUIET               => ['option' => 'quiet', 'hasArgument' => false],
        self::READ_BATCH          => ['option' => 'read-batch', 'hasArgument' => true],
        self::RECURSIVE           => ['option' => 'recursive', 'hasArgument' => false],
        self::RELATIVE            => ['option' => 'relative', 'hasArgument' => false],
        self::REMOVE_SOURCE_FILES => ['option' => 'remove-source-files', 'hasArgument' => false],
        self::RSH                 => ['option' => 'rsh', 'hasArgument' => true],
        self::RSYNC_PATH          => ['option' => 'rsync-path', 'hasArgument' => true],
        self::SAFE_LINKS          => ['option' => 'safe-links', 'hasArgument' => false],
        self::SIZE_ONLY           => ['option' => 'size-only', 'hasArgument' => false],
        self::SKIP_COMPRESS       => ['option' => 'skip-compress', 'hasArgument' => true],
        self::SOCKOPTS            => ['option' => 'sockopts', 'hasArgument' => true],
        self::SPARSE              => ['option' => 'sparse', 'hasArgument' => false],
        self::SPECIALS            => ['option' => 'specials', 'hasArgument' => false],
        self::STATS               => ['option' => 'stats', 'hasArgument' => false],
        self::SUFFIX              => ['option' => 'suffix', 'hasArgument' => true],
        self::SUPER               => ['option' => 'super', 'hasArgument' => false],
        self::TEMP_DIR            => ['option' => 'temp-dir', 'hasArgument' => true],
        self::TIMEOUT             => ['option' => 'timeout', 'hasArgument' => true],
        self::TIMES               => ['option' => 'times', 'hasArgument' => false],
        self::UPDATE              => ['option' => 'update', 'hasArgument' => false],
        self::VERBOSE             => ['option' => 'verbose', 'hasArgument' => false],
        self::VERSION             => ['option' => 'version', 'hasArgument' => false],
        self::WHOLE_FILE          => ['option' => 'whole-file', 'hasArgument' => false],
        self::WRITE_BATCH         => ['option' => 'write-batch', 'hasArgument' => true],
        self::XATTRS              => ['option' => 'xattrs', 'hasArgument' => false],
    ];

    public static function GetList() :array {
        return self::OPTIONS_LIST;
    }

    public static function IsSupported(string $option) :bool {
        return (bool)(self::OPTIONS_LIST[$option] ?? false);
    }

    public static function HasArgument(string $option) :bool {
        return (bool)(self::OPTIONS_LIST[$option]['hasArgument'] ?? false);
    }
}
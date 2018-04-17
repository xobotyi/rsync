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
     * omit symlinks from --times
     */
    public const OMIT_LINK_TIMES = 'omit-link-times';
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
     * send OPTION to the remote side only
     */
    public const REMOTE_OPTION = 'remote-option';
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
        self::ACLS                => ['option' => 'A'],
        self::ADDRESS             => ['option' => 'address', 'argument' => true],
        self::APPEND              => ['option' => 'append'],
        self::APPEND_VERIFY       => ['option' => 'append-verify'],
        self::ARCHIVE             => ['option' => 'a'],
        self::BACKUP              => ['option' => 'b'],
        self::BACKUP_DIR          => ['option' => 'backup-dir', 'argument' => true],
        self::BLOCKING_IO         => ['option' => 'blocking-io'],
        self::BLOCK_SIZE          => ['option' => 'B', 'argument' => true],
        self::BWLIMIT             => ['option' => 'bwlimit', 'argument' => true],
        self::CHECKSUM            => ['option' => 'c'],
        self::CHMOD               => ['option' => 'chmod', 'argument' => true],
        self::COMPARE_DEST        => ['option' => 'compare-dest', 'argument' => true],
        self::COMPRESS            => ['option' => 'z'],
        self::COMPRESS_LEVEL      => ['option' => 'compress-level', 'argument' => true],
        self::CONTIMEOUT          => ['option' => 'contimeout', 'argument' => true],
        self::COPY_DEST           => ['option' => 'copy-dest', 'argument' => true],
        self::COPY_DEVICES        => ['option' => 'copy-devices'],
        self::COPY_DIRLINKS       => ['option' => 'k'],
        self::COPY_LINKS          => ['option' => 'L'],
        self::COPY_UNSAFE_LINKS   => ['option' => 'copy-unsafe-links'],
        self::CVS_EXCLUDE         => ['option' => 'C'],
        self::DEL                 => ['option' => 'del'],
        self::DELAY_UPDATES       => ['option' => 'delay-updates'],
        self::DELETE              => ['option' => 'delete'],
        self::DELETE_AFTER        => ['option' => 'delete-after'],
        self::DELETE_BEFORE       => ['option' => 'delete-before'],
        self::DELETE_DELAY        => ['option' => 'delete-delay'],
        self::DELETE_DURING       => ['option' => 'delete-during'],
        self::DELETE_EXCLUDED     => ['option' => 'delete-excluded'],
        self::DEVICES             => ['option' => 'devices'],
        self::DIRS                => ['option' => 'd'],
        self::DRY_RUN             => ['option' => 'n'],
        self::EXCLUDE             => ['option' => 'exclude', 'argument' => true],
        self::EXCLUDE_FROM        => ['option' => 'exclude-from', 'argument' => true],
        self::EXECUTABILITY       => ['option' => 'E'],
        self::EXISTING            => ['option' => 'existing'],
        self::FAKE_SUPER          => ['option' => 'fake-super'],
        self::FILES_FROM          => ['option' => 'files-from', 'argument' => true],
        self::FILTER              => ['option' => 'f', 'argument' => true],
        self::FORCE               => ['option' => 'force'],
        self::FROM0               => ['option' => '0'],
        self::FUZZY               => ['option' => 'y'],
        self::GROUP               => ['option' => 'g'],
        self::HARD_LINKS          => ['option' => 'H'],
        self::HELP                => ['option' => 'help'],
        self::HUMAN_READABLE      => ['option' => 'h'],
        self::ICONV               => ['option' => 'iconv', 'argument' => true],
        self::IGNORE_ERRORS       => ['option' => 'ignore-errors'],
        self::IGNORE_EXISTING     => ['option' => 'ignore-existing'],
        self::IGNORE_TIMES        => ['option' => 'I'],
        self::INCLUDE             => ['option' => 'include', 'argument' => true],
        self::INCLUDE_FROM        => ['option' => 'include-from', 'argument' => true],
        self::INPLACE             => ['option' => 'inplace'],
        self::IPV4                => ['option' => '4'],
        self::IPV6                => ['option' => '6'],
        self::ITEMIZE_CHANGES     => ['option' => 'i'],
        self::KEEP_DIRLINKS       => ['option' => 'K'],
        self::LINKS               => ['option' => 'l'],
        self::LINK_DEST           => ['option' => 'link-dest', 'argument' => true],
        self::LIST_ONLY           => ['option' => 'list-only'],
        self::LOG_FILE            => ['option' => 'log-file', 'argument' => true],
        self::LOG_FILE_FORMAT     => ['option' => 'log-file-format', 'argument' => true],
        self::MAX_DELETE          => ['option' => 'max-delete', 'argument' => true],
        self::MAX_SIZE            => ['option' => 'max-size', 'argument' => true],
        self::MIN_SIZE            => ['option' => 'min-size', 'argument' => true],
        self::MODIFY_WINDOW       => ['option' => 'modify-window', 'argument' => true],
        self::NO_IMPLIED_DIRS     => ['option' => 'no-implied-dirs'],
        self::NO_MOTD             => ['option' => 'no-motd'],
        self::NO_OPTION           => ['option' => 'no-OPTION'],
        self::NUMERIC_IDS         => ['option' => 'numeric-ids'],
        self::OMIT_DIR_TIMES      => ['option' => 'O'],
        self::OMIT_LINK_TIMES     => ['option' => 'J'],
        self::ONE_FILE_SYSTEM     => ['option' => 'x'],
        self::ONLY_WRITE_BATCH    => ['option' => 'only-write-batch', 'argument' => true],
        self::OUTPUT_8_BIT        => ['option' => '8'],
        self::OUT_FORMAT          => ['option' => 'out-format', 'argument' => true],
        self::OWNER               => ['option' => 'o'],
        self::PARTIAL             => ['option' => 'partial'],
        self::PARTIAL_DIR         => ['option' => 'partial-dir', 'argument' => true],
        self::PASSWORD_FILE       => ['option' => 'password-file', 'argument' => true],
        self::PERMS               => ['option' => 'p'],
        self::PORT                => ['option' => 'port', 'argument' => true],
        self::PROGRESS            => ['option' => 'progress'],
        self::PROTECT_ARGS        => ['option' => 's'],
        self::PROTOCOL            => ['option' => 'protocol', 'argument' => true],
        self::PRUNE_EMPTY_DIRS    => ['option' => 'm'],
        self::QUIET               => ['option' => 'q'],
        self::READ_BATCH          => ['option' => 'read-batch', 'argument' => true],
        self::RECURSIVE           => ['option' => 'r'],
        self::RELATIVE            => ['option' => 'R'],
        self::REMOVE_SOURCE_FILES => ['option' => 'remove-source-files'],
        self::REMOTE_OPTION       => ['option' => 'M', 'argument' => true],
        self::RSH                 => ['option' => 'e', 'argument' => true],
        self::RSYNC_PATH          => ['option' => 'rsync-path', 'argument' => true],
        self::SAFE_LINKS          => ['option' => 'safe-links'],
        self::SIZE_ONLY           => ['option' => 'size-only'],
        self::SKIP_COMPRESS       => ['option' => 'skip-compress', 'argument' => true],
        self::SOCKOPTS            => ['option' => 'sockopts', 'argument' => true],
        self::SPARSE              => ['option' => 'S'],
        self::SPECIALS            => ['option' => 'specials'],
        self::STATS               => ['option' => 'stats'],
        self::SUFFIX              => ['option' => 'suffix', 'argument' => true],
        self::SUPER               => ['option' => 'super'],
        self::TEMP_DIR            => ['option' => 'T', 'argument' => true],
        self::TIMEOUT             => ['option' => 'timeout', 'argument' => true],
        self::TIMES               => ['option' => 't'],
        self::UPDATE              => ['option' => 'u'],
        self::VERBOSE             => ['option' => 'v'],
        self::VERSION             => ['option' => 'version'],
        self::WHOLE_FILE          => ['option' => 'W'],
        self::WRITE_BATCH         => ['option' => 'write-batch', 'argument' => true],
        self::XATTRS              => ['option' => 'xattrs'],
    ];

    public static function GetList() :array {
        return self::OPTIONS_LIST;
    }

    public static function IsSupported(string $option) :bool {
        return (bool)(self::OPTIONS_LIST[$option] ?? false);
    }

    public static function argument(string $option) :bool {
        return (bool)(self::OPTIONS_LIST[$option]['argument'] ?? false);
    }
}
<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;


class Option
{
    public const ACLS                = 'acls';
    public const ADDRESS             = 'address';
    public const APPEND              = 'append';
    public const APPEND_VERIFY       = 'append-verify';
    public const ARCHIVE             = 'archive';
    public const BACKUP              = 'backup';
    public const BACKUP_DIR          = 'backup-dir';
    public const BLOCKING_IO         = 'blocking-io';
    public const BLOCK_SIZE          = 'block-size';
    public const BWLIMIT             = 'bwlimit';
    public const CHECKSUM            = 'checksum';
    public const CHMOD               = 'chmod';
    public const COMPARE_DEST        = 'compare-dest';
    public const COMPRESS            = 'compress';
    public const COMPRESS_LEVEL      = 'compress-level';
    public const CONTIMEOUT          = 'contimeout';
    public const COPY_DEST           = 'copy-dest';
    public const COPY_DEVICES        = 'copy-devices';
    public const COPY_DIRLINKS       = 'copy-dirlinks';
    public const COPY_LINKS          = 'copy-links';
    public const COPY_UNSAFE_LINKS   = 'copy-unsafe-links';
    public const CVS_EXCLUDE         = 'cvs-exclude';
    public const DEL                 = 'del';
    public const DELAY_UPDATES       = 'delay-updates';
    public const DELETE              = 'delete';
    public const DELETE_AFTER        = 'delete-after';
    public const DELETE_BEFORE       = 'delete-before';
    public const DELETE_DELAY        = 'delete-delay';
    public const DELETE_DURING       = 'delete-during';
    public const DELETE_EXCLUDED     = 'delete-excluded';
    public const DEVICES             = 'devices';
    public const DIRS                = 'dirs';
    public const DRY_RUN             = 'dry-run';
    public const EXCLUDE             = 'exclude';
    public const EXCLUDE_FROM        = 'exclude-from';
    public const EXECUTABILITY       = 'executability';
    public const EXISTING            = 'existing';
    public const FAKE_SUPER          = 'fake-super';
    public const FILES_FROM          = 'files-from';
    public const FILTER              = 'filter';
    public const FORCE               = 'force';
    public const FROM0               = 'from0';
    public const FUZZY               = 'fuzzy';
    public const GROUP               = 'group';
    public const HARD_LINKS          = 'hard-links';
    public const HELP                = 'help';
    public const HUMAN_READABLE      = 'human-readable';
    public const ICONV               = 'iconv';
    public const IGNORE_ERRORS       = 'ignore-errors';
    public const IGNORE_EXISTING     = 'ignore-existing';
    public const IGNORE_TIMES        = 'ignore-times';
    public const INCLUDE             = 'include';
    public const INCLUDE_FROM        = 'include-from';
    public const INPLACE             = 'inplace';
    public const IPV4                = 'ipv4';
    public const IPV6                = 'ipv6';
    public const ITEMIZE_CHANGES     = 'itemize-changes';
    public const KEEP_DIRLINKS       = 'keep-dirlinks';
    public const LINKS               = 'links';
    public const LINK_DEST           = 'link-dest';
    public const LIST_ONLY           = 'list-only';
    public const LOG_FILE            = 'log-file';
    public const LOG_FILE_FORMAT     = 'log-file-format';
    public const MAX_DELETE          = 'max-delete';
    public const MAX_SIZE            = 'max-size';
    public const MIN_SIZE            = 'min-size';
    public const MODIFY_WINDOW       = 'modify-window';
    public const NO_IMPLIED_DIRS     = 'no-implied-dirs';
    public const NO_MOTD             = 'no-motd';
    public const NO_OPTION           = 'no-OPTION';
    public const NUMERIC_IDS         = 'numeric-ids';
    public const OMIT_DIR_TIMES      = 'omit-dir-times';
    public const ONE_FILE_SYSTEM     = 'one-file-system';
    public const ONLY_WRITE_BATCH    = 'only-write-batch';
    public const OUTPUT_8_BIT        = '8-bit-output';
    public const OUT_FORMAT          = 'out-format';
    public const OWNER               = 'owner';
    public const PARTIAL             = 'partial';
    public const PARTIAL_DIR         = 'partial-dir';
    public const PASSWORD_FILE       = 'password-file';
    public const PERMS               = 'perms';
    public const PORT                = 'port';
    public const PROGRESS            = 'progress';
    public const PROTECT_ARGS        = 'protect-args';
    public const PROTOCOL            = 'protocol';
    public const PRUNE_EMPTY_DIRS    = 'prune-empty-dirs';
    public const QUIET               = 'quiet';
    public const READ_BATCH          = 'read-batch';
    public const RECURSIVE           = 'recursive';
    public const RELATIVE            = 'relative';
    public const REMOVE_SOURCE_FILES = 'remove-source-files';
    public const RSH                 = 'rsh';
    public const RSYNC_PATH          = 'rsync-path';
    public const SAFE_LINKS          = 'safe-links';
    public const SIZE_ONLY           = 'size-only';
    public const SKIP_COMPRESS       = 'skip-compress';
    public const SOCKOPTS            = 'sockopts';
    public const SPARSE              = 'sparse';
    public const SPECIALS            = 'specials';
    public const STATS               = 'stats';
    public const SUFFIX              = 'suffix';
    public const SUPER               = 'super';
    public const TEMP_DIR            = 'temp-dir';
    public const TIMEOUT             = 'timeout';
    public const TIMES               = 'times';
    public const UPDATE              = 'update';
    public const VERBOSE             = 'verbose';
    public const VERSION             = 'version';
    public const WHOLE_FILE          = 'whole-file';
    public const WRITE_BATCH         = 'write-batch';
    public const XATTRS              = 'xattrs';

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
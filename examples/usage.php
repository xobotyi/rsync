<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

include_once __DIR__ . '/../vendor/autoload.php';

use xobotyi\rsync\Rsync;
use xobotyi\rsync\SSH;

$rsync = new Rsync([
                       Rsync::CONF_CWD        => __DIR__,
                       Rsync::CONF_EXECUTABLE => '/even/alternative/executable/rsync.exe',
                       Rsync::CONF_SSH        => [
                           SSH::CONF_EXECUTABLE => '/even/alternative/executable/ssh.exe',
                           SSH::CONF_OPTIONS    => [
                               SSH::OPT_OPTION              => ['BatchMode=yes', 'StrictHostKeyChecking=no'],
                               SSH::OPT_IDENTIFICATION_FILE => './path/to/ident',
                               SSH::OPT_PORT                => 2222,
                           ],
                       ],
                   ]);
$rsync->sync('./relative/path/to/source', 'user@some.remote.lan:/abs/path/to/destination');
echo './relative/path/to/source ' . ($rsync->getExitCode() === 0 ? 'successfully synchronized with remote.' : 'not synchronised due to errors.') . "\n";

$rsync->setExecutable('ssh')
      ->setOption(SSH::OPT_OPTION, false)// 'false' value turns off the options
      ->setOptions([
                       SSH::OPT_IDENTIFICATION_FILE => './new/path/to/ident',
                       SSH::OPT_PORT                => 22,
                   ]);
$rsync->sync('/new/path/to/source', 'user@some.remote.lan:/abs/path/to/destination');
echo '/new/path/to/source ' . ($rsync->getExitCode() === 0 ? 'successfully synchronized with remote.' : 'not synchronised due to errors.') . "\n";
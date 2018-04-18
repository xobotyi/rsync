<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

include_once __DIR__ . '/../vendor/autoload.php';

use xobotyi\rsync;

$ssh = new rsync\SSH([
                         rsync\SSH::CONF_EXECUTABLE => 'C:\rsync\ssh.exe',
                         rsync\SSH::CONF_OPTIONS    => [
                             rsync\SSH::OPT_IDENTIFICATION_FILE => __DIR__ . '/../tests/ident.txt',
                             rsync\SSH::OPT_OPTION              => ['BatchMode=yes', 'StrictHostKeyChecking=no'],
                         ],
                     ]);
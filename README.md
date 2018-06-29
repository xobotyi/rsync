<h1 align="center">Rsync</h1>
<p align="center">
    <a href="https://packagist.org/packages/xobotyi/rsync">
        <img alt="License" src="https://poser.pugx.org/xobotyi/rsync/license" />
    </a>
    <a href="https://packagist.org/packages/xobotyi/rsync">
        <img alt="PHP 7 ready" src="http://php7ready.timesplinter.ch/xobotyi/rsync/badge.svg" />
    </a>
    <a href="https://travis-ci.org/xobotyi/rsync">
        <img alt="Build Status" src="https://travis-ci.org/xobotyi/rsync.svg?branch=master" />
    </a>
    <a href="https://www.codacy.com/app/xobotyi/rsync">
        <img alt="Codacy Grade" src="https://api.codacy.com/project/badge/Grade/ba7d63cf54844f5480d6b3a58c1534a7" />
    </a>
    <a href="https://scrutinizer-ci.com/g/xobotyi/rsync/">
        <img alt="Scrutinizer Code Quality" src="https://scrutinizer-ci.com/g/xobotyi/rsync/badges/quality-score.png?b=master" />
    </a>
    <a href="https://www.codacy.com/app/xobotyi/rsync">
        <img alt="Codacy Coverage" src="https://api.codacy.com/project/badge/Coverage/ba7d63cf54844f5480d6b3a58c1534a7" />
    </a>
    <a href="https://packagist.org/packages/xobotyi/rsync">
        <img alt="Latest Stable Version" src="https://poser.pugx.org/xobotyi/rsync/v/stable" />
    </a>
    <a href="https://packagist.org/packages/xobotyi/rsync">
        <img alt="Total Downloads" src="https://poser.pugx.org/xobotyi/rsync/downloads" />
    </a>
</p>

## About  
Rsync is a pure PHP 7.1+ dependency-free wrapper for rsync client. It provides you a simple way to abstract from command line control rsync right from php. Library uses PSR-4 autoloader standard and always has 100% tests coverage.  
There is no need to tell about rsync, except the fact that php doesn't has any faster or equal built-in way to upload files to remote server.

Library supports whole bunch of options and parameters implemented in rsync client version 3.1.2 

## Why Rsync?
1) It is small and fully covered with tests
2) It is well documented
3) I'm eating my own sweet pie=)
4) Supports whole bunch of parameters and options of rsync and ssh
5) Easy to use
6) Works on Windows (ofcourse id you installed ssh and rsync clients for Windows)


## Requirements
- [PHP](//php.net/) 7.1+
- PHP config `variables_order` must contain `E`, 4ex: `variables_order=EGPCS`.  
Otherwise you will have to manually specify absolute path to rsync and ssh binaries (at least on Windows)
- rsync client 3.1.2 +

## Installation
Install with composer
```bash
composer require xobotyi/rsync
```

## Docs
The code is well documented, for methods and parameters descriptions see the sources.

## Usage
_Simplest:_
```php
use xobotyi\rsync\Rsync;

$rsync = new Rsync();
$rsync->sync('/path/to/source', '/path/to/destination');
```
_If you need SSH:_
```php
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
```


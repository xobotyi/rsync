<?php

use xobotyi\rsync\SSH;

/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */
class SSHTest extends \PHPUnit\Framework\TestCase
{
    public function testSSH() {
        $ssh = new SSH();

        $this->assertFalse($ssh->isRawOutput());
        $this->assertEquals(' ', $ssh->getOptionValueAssigner());

        $ssh->setParameters(['123', '321']);
        $this->assertEquals(['123', '321'], $ssh->getParameters());
        $ssh->clearParameters();
        $this->assertEquals([], $ssh->getParameters());

        $this->assertEquals([], $ssh->getOptions());
        $this->assertEquals('ssh', (string)$ssh);

        $ssh->setOptions([
                             SSH::OPT_IDENTIFICATION_FILE => __DIR__ . '\..\tests\ident.txt',
                             SSH::OPT_OPTION              => ['BatchMode=yes', 'StrictHostKeyChecking=no'],
                             SSH::OPT_IPV4                => true,
                         ]);
        $this->assertEquals('ssh -4 -i "E:\github.com\rsync\tests\ident.txt" -o "BatchMode=yes" -o "StrictHostKeyChecking=no"', (string)$ssh);
    }

    public function testSSHException_noArgumentAllowed() {
        $this->expectException(\xobotyi\rsync\Exception\Command::class);
        $ssh = new SSH([
                           SSH::CONF_EXECUTABLE => 'C:\rsync\ssh.exe',
                           SSH::CONF_OPTIONS    => [
                               SSH::OPT_IPV4 => ['BatchMode=yes', 'StrictHostKeyChecking=no'],
                           ],
                       ]);
    }

    public function testSSHException_notReadable() {
        $this->expectException(\xobotyi\rsync\Exception\Command::class);
        $ssh = new SSH([
                           SSH::CONF_EXECUTABLE => 'C:\rsync\ssh.exe',
                           SSH::CONF_OPTIONS    => [
                               SSH::OPT_IDENTIFICATION_FILE => __DIR__ . '\..\tests\ident1.txt',
                           ],
                       ]);
    }

    public function testSSHException_notRepeatable() {
        $this->expectException(\xobotyi\rsync\Exception\Command::class);
        $ssh = new SSH([
                           SSH::CONF_EXECUTABLE => 'C:\rsync\ssh.exe',
                           SSH::CONF_OPTIONS    => [
                               SSH::OPT_CIPHER => ['BatchMode=yes', 'StrictHostKeyChecking=no'],
                           ],
                       ]);
    }

    public function testSSHException_notStringable1() {
        $this->expectException(\xobotyi\rsync\Exception\Command::class);
        $ssh = new SSH([
                           SSH::CONF_EXECUTABLE => 'C:\rsync\ssh.exe',
                           SSH::CONF_OPTIONS    => [
                               SSH::OPT_CIPHER => null,
                           ],
                       ]);
    }

    public function testSSHException_notStringable2() {
        $this->expectException(\xobotyi\rsync\Exception\Command::class);
        $ssh = new SSH([
                           SSH::CONF_EXECUTABLE => 'C:\rsync\ssh.exe',
                           SSH::CONF_OPTIONS    => [
                               SSH::OPT_OPTION => ['BatchMode=yes', 'StrictHostKeyChecking=no', null],
                           ],
                       ]);
    }

    public function testSSHException_optionNotSupported() {
        $this->expectException(\xobotyi\rsync\Exception\Command::class);
        $ssh = new SSH([
                           SSH::CONF_EXECUTABLE => 'C:\rsync\ssh.exe',
                           SSH::CONF_OPTIONS    => [
                               'sdfjhgsdjfhgsdf' => ['BatchMode=yes', 'StrictHostKeyChecking=no'],
                           ],
                       ]);
    }
}
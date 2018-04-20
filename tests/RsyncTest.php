<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;

use PHPUnit\Framework\TestCase;


function proc_open($cmd, ?array $descriptorspec, ?array &$pipes, $cwd = null, ?array $env = null, ?array $other_options = null, $return = null) {
    static $v;

    $v = $return === null ? $v : ($return !== 0 ? $return : null);

    if ($return === 0) {
        return null;
    }

    return $v === null ? \proc_open($cmd, $descriptorspec, $pipes, $cwd, $env, $other_options) : $v;
}

class RsyncTest extends TestCase
{
    private $destDir   = __DIR__ . '/dest';
    private $sourceDir = __DIR__ . '/src';

    public function __destruct() {
        $this->clearDirectories();
    }

    private function clearDirectories() {
        $this->rmdirr($this->sourceDir);
        $this->rmdirr($this->destDir);
    }

    private function rmdirr(string $dir) :void {
        if (!is_dir($dir)) {
            return;
        }

        foreach (glob($dir . '/*') as $path) {
            is_dir($path) ? $this->rmdirr($path) : unlink($path);
        }

        rmdir($dir);
    }

    public function testException_badSSH() {
        $this->expectException(Exception\Command::class);

        (new Rsync())->setSSH(false);
    }

    public function testException_fileNotReadable() {
        $this->expectException(Exception\Command::class);

        (new Rsync())->setOption(Rsync::OPT_INCLUDE_FROM, __DIR__ . '/some/fake/file');
    }

    public function testException_procOpenFailure() {
        $this->expectException(Exception\Command::class);
        proc_open(null, null, $null, null, null, null, false);

        (new Rsync())->sync('./src/*', './dest');
    }

    public function testException_unstringableParameter1() {
        $this->expectException(Exception\Command::class);

        (new Rsync())->addParameter(null);
    }

    public function testException_unstringableParameter2() {
        $this->expectException(Exception\Command::class);

        (new Rsync())->setParameters([null]);
    }

    public function testRsync() {
        proc_open(null, null, $null, null, null, null, 0);
        $rsync = new Rsync([
                               Rsync::CONF_CWD     => __DIR__,
                               Rsync::CONF_SSH     => [
                                   SSH::CONF_OPTIONS => [
                                       SSH::OPT_OPTION => ['BatchMode=yes', 'StrictHostKeyChecking=no'],
                                   ],
                               ],
                               Rsync::CONF_OPTIONS => [
                                   Rsync::OPT_XATTRS => true,
                               ],
                           ]);

        $this->assertEquals([SSH::OPT_OPTION => ['BatchMode=yes', 'StrictHostKeyChecking=no'],],
                            $rsync->getSSH()->getOptions());
        $this->assertEquals(__DIR__, $rsync->getCWD());

        $this->assertEquals(null, $rsync->setSSH(null)->getSSH());
        $this->assertEquals(' --xattrs', $rsync->getOptionsString());

        $ssh = new SSH([
                           SSH::CONF_OPTIONS => [
                               SSH::OPT_OPTION => ['BatchMode=yes', 'StrictHostKeyChecking=no'],
                           ],
                       ]);
        $this->assertEquals($ssh, $rsync->setSSH($ssh)->getSSH());

        $incForm = __DIR__ . '\..\tests\include_from';
        touch($incForm);
        $rsync->setOption(Rsync::OPT_INCLUDE_FROM, $incForm)->setOption(Rsync::OPT_XATTRS, false);
        $this->assertEquals([Rsync::OPT_INCLUDE_FROM => realpath($incForm)], $rsync->getOptions());
        unlink($incForm);
    }

    public function testRsyncSync() {
        $this->prepareDirectories();

        $rsync = new Rsync([Rsync::CONF_CWD => __DIR__]);

        $rsync->sync('./src/*', './dest');
        self::assertEquals(0, $rsync->getExitCode());
        self::assertEquals('', $rsync->getStderr());
        self::assertEquals('', $rsync->getStdout());
        self::assertTrue($this->compareDirectories($this->sourceDir, $this->destDir));

        $this->clearDirectories();
    }

    private function prepareDirectories() {
        $this->clearDirectories();

        mkdir($this->sourceDir);
        mkdir($this->destDir);

        touch($this->sourceDir . '/file1');
        touch($this->sourceDir . '/file2');

        if (!is_file($this->sourceDir . '/file1') || !is_file($this->sourceDir . '/file2')) {
            $this->clearDirectories();

            throw new \Exception('Failed to prepare test diretories and/or files');
        }
    }

    private function compareDirectories(string $dir1, string $dir2) :bool {
        if (substr(strtolower(php_uname('s')), 0, 3) === 'win') {
            shell_exec('dir ' . realpath($dir1) . ' /B > A.txt');
            shell_exec('dir ' . realpath($dir2) . ' /B > B.txt');
            shell_exec('fc A.txt B.txt > differences.txt');

            $res = @file('differences.txt')[1] === "FC: no differences encountered" . PHP_EOL;
            unlink('A.txt');
            unlink('B.txt');
            unlink('differences.txt');

            return $res;
        }

        return !shell_exec("diff --brief " . $dir1 . " " . $dir2 . " 2>&1");
    }

    public function testRsyncWithSSH() {

        $rsync = new Rsync([
                               Rsync::CONF_CWD => __DIR__,
                               Rsync::CONF_SSH => [
                                   SSH::CONF_OPTIONS => [
                                       SSH::OPT_OPTION => ['BatchMode=yes', 'StrictHostKeyChecking=no'],
                                   ],
                               ],
                           ]);

        $this->prepareDirectories();
        self::assertFalse($this->compareDirectories($this->sourceDir, $this->destDir));

        if (substr(strtolower(php_uname('s')), 0, 3) === 'win') {
            $this->assertEquals('rsync -e "ssh -o  BatchMode=yes  -o  StrictHostKeyChecking=no "', (string)$rsync);
        }
        else {
            $this->assertEquals("rsync -e 'ssh -o '\''BatchMode=yes'\'' -o '\''StrictHostKeyChecking=no'\'''", (string)$rsync);

            $user      = getenv('USER');
            $home      = getenv('HOME');
            $identFile = $home . '/.ssh/id_rsa_rsync_test';

            if (!is_file($identFile)) {
                $this->markTestIncomplete('Unable to perform real SSH rsync, private key is missing');
            }

            $rsync->getSSH()->setOptions([
                                             SSH::OPT_IDENTIFICATION_FILE => $identFile,
                                             SSH::OPT_PORT                => 2222,
                                         ]);

            $rsync->sync('./src/*', $user . '@localhost:' . $this->destDir);

            self::assertTrue($this->compareDirectories($this->sourceDir, $this->destDir));
        }
    }
}
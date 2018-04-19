<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

namespace xobotyi\rsync;


use PHPUnit\Framework\TestCase;

class RsyncTest extends TestCase
{
    private $sourceDir = __DIR__ . '/src';
    private $destDir   = __DIR__ . '/dest';

    public function testException_badSSH() {
        $this->expectException(Exception\Command::class);

        (new Rsync())->setSSH(false);
    }

    public function testException_fileNotReadable() {
        $this->expectException(Exception\Command::class);

        (new Rsync())->setOption(Rsync::OPT_INCLUDE_FROM, __DIR__ . '/some/fake/file');
    }

    public function testRsync() {
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

//    public function testRsyncSync() {
//        $this->prepareDirectories();
//
//        $rsync = new Rsync([Rsync::CONF_CWD => __DIR__]);
//
//        $sourceDir = './src';
//        $destDir   = './dest';
//
//        var_dump(is_dir($this->sourceDir));
//
//        $rsync->sync($sourceDir . '/*', $destDir);
//        self::assertTrue($this->compareDirectories($sourceDir, $destDir));
//
//        $this->clearDirectories();
//    }

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

    private function clearDirectories() {
        $this->rmdirr($this->sourceDir);
        $this->rmdirr($this->destDir);
    }

    private function compareDirectories(string $dir1, string $dir2) :bool {
        return !shell_exec("diff --brief " . escapeshellarg($dir1) . " " . escapeshellarg($dir2) . " 2>&1");
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

    public function __destruct() {
        $this->clearDirectories();
    }
}
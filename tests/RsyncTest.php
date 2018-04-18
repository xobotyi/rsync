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
    public function testException_badSSH() {
        $this->expectException(Exception\Command::class);

        (new Rsync())->setSSH(false);
    }

    public function testRsync() {
        $rsync = new Rsync([
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

        $this->assertEquals(null, $rsync->setSSH(null)->getSSH());

        $ssh = new SSH([
                           SSH::CONF_OPTIONS => [
                               SSH::OPT_OPTION => ['BatchMode=yes', 'StrictHostKeyChecking=no'],
                           ],
                       ]);
        $this->assertEquals($ssh, $rsync->setSSH($ssh)->getSSH());
    }
}
<?php
/**
 * @Author : a.zinovyev
 * @Package: rsync
 * @License: http://www.opensource.org/licenses/mit-license.php
 */

use xobotyi\rsync\Option;

class OptionTest extends \PHPUnit\Framework\TestCase
{
    public function testOption() {
        self::assertEquals(true, Option::IsSupported(Option::BLOCK_SIZE));
        self::assertEquals(true, Option::HasArgument(Option::BLOCK_SIZE));
        self::assertNotEmpty(Option::GetList());
    }
}
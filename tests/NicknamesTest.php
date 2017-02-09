<?php

use PHPUnit\Framework\TestCase;
use Yooper\Nicknames;

/**
 *
 * @author dcardin
 */
class NicknamesTest extends TestCase
{
    public function testNames()
    {
        $nicknames = new Nicknames();
        $r = $nicknames->query('joe');
        $this->assertCount(2, $r);
        $this->assertEquals(['joseph','joey'], $r);
    }
}

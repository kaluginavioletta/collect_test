<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase
{
    public function testCount()
    {
        $collect = new Collect\Collect([13,17]);
        $this->assertSame(2, $collect->count());
    }

    public function testKeys()
    {
        $collect = new \Collect\Collect(['a' => 13, 'b' => 17]);
        $this->assertSame(['a', 'b'], $collect->keys()->toArray());
    }

    public function testValues()
    {
        $collect = new \Collect\Collect(['a' => 13, 'b' => 17]);
        $this->assertSame([13, 17], $collect->values()->toArray());
    }

    public function testGet()
    {
        $collect = new \Collect\Collect(['a' => 13, 'b' => 17]);
        $this->assertSame(13, $collect->get('a'));
    }

    public function testExcept()
    {
        $collect = new \Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $this->assertSame(['a' => 13, 'c' => 20], $collect->except('b')->toArray());
    }

    public function testOnly()
    {
        $collect = new \Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $this->assertSame(['a' => 13, 'b' => 17], $collect->only('a', 'b')->toArray());
    }

    public function testFirst()
    {
        $collect = new \Collect\Collect(['a' => 13, 'b' => 17]);
        $this->assertSame(13, $collect->first());
    }

    public function testToArray()
    {
        $collect = new \Collect\Collect(['a' => 13, 'b' => 17]);
        $this->assertSame(['a' => 13, 'b' => 17], $collect->toArray());
    }

    public function testPush()
    {
        $collect = new \Collect\Collect(['a' => 13]);
        $collect->push(17, 'b');
        $this->assertSame(['a' => 13, 'b' => 17], $collect->toArray());
    }

    public function testUnshift()
    {
        $collect = new \Collect\Collect(['a' => 13]);
        $collect->unshift(10);
        $this->assertSame([0 => 10, 'a' => 13], $collect->toArray());
    }

    public function testShift()
    {
        $collect = new \Collect\Collect(['a' => 13, 'b' => 17]);
        $collect->shift();
        $this->assertSame(['b' => 17], $collect->toArray());
    }

    public function testPop()
    {
        $collect = new \Collect\Collect(['a' => 13, 'b' => 17]);
        $collect->pop();
        $this->assertSame(['a' => 13], $collect->toArray());
    }

    public function testSplice()
    {
        $collect = new \Collect\Collect(['a' => 13, 'b' => 17, 'c' => 20]);
        $collect = $collect->except('b');
        $this->assertSame(['a' => 13, 'c' => 20], $collect->toArray());
    }
}

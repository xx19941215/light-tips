<?php

namespace Test\DataStructure;

use DataStructure\Heap\MaxHeap;
use \PHPUnit\Framework\TestCase;

class MaxHeapTest extends TestCase
{
    public $maxHeap;

    public function setUp()
    {
        $this->maxHeap = new MaxHeap(9);
    }

    public function testCreate()
    {
        $data = [37, 44, 34, 65, 26, 86, 129, 83, 9];
        $this->maxHeap->create($data);

        $this->assertEquals("129 86 44 83 26 34 37 65 9", $this->maxHeap->display());
    }

    public function testExtractMax()
    {
        $data = [37, 44, 34, 65, 26, 86, 129, 83, 9];
        $this->maxHeap->create($data);

        $max = $this->maxHeap->extractMax();

        $this->assertEquals("86 83 44 65 26 34 37 9 0", $this->maxHeap->display());
        $this->assertEquals(129, $max);

    }
}

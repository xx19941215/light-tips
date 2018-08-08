<?php

namespace Test\DataStructure;

use DataStructure\Heap\MinHeap;
use \PHPUnit\Framework\TestCase;

class MinHeapTest extends TestCase
{
    public $minHeap;

    public function setUp()
    {
        $this->minHeap = new MinHeap(9);
    }

    public function testCreate()
    {
        $data = [37, 44, 34, 65, 26, 86, 129, 83, 9];
        $this->minHeap->create($data);

        $this->assertEquals("9 26 37 34 44 86 129 83 65", $this->minHeap->display());
    }

    public function testExtractMin()
    {
        $data = [37, 44, 34, 65, 26, 86, 129, 83, 9];
        $this->minHeap->create($data);

        $min = $this->minHeap->extractMin();

        $this->assertEquals("26 34 37 65 44 86 129 83 0", $this->minHeap->display());
        $this->assertEquals(9, $min);

    }
}

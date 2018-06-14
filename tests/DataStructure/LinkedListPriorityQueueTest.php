<?php
namespace Test\DataStructure;

use DataStructure\Queue\LinkedListPriorityQueue;
use PHPUnit\Framework\TestCase;

class LinkedListPriorityQueueTest extends TestCase
{
    private $queue;

    public function setUp()
    {
        $this->queue = new LinkedListPriorityQueue(10);
    }

    public function testInsert()
    {
        $this->queue->enqueue('foo', 10);
        $this->queue->enqueue('bar', 20);
        $this->queue->enqueue('hello', 9);
        $this->queue->enqueue('xiao', 8);

        $this->assertEquals('bar', $this->queue->dequeue());
    }
}
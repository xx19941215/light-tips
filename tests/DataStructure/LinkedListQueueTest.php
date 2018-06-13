<?php

namespace Test\DataStructure;

use DataStructure\Queue\LinkedListQueue;
use PHPUnit\Framework\TestCase;

class LinkedListQueueTest extends TestCase
{
    private $queue;

    public function setUp()
    {
        $this->queue = new LinkedListQueue(10);
    }

    public function testEnqueue()
    {
        $this->queue->enqueue('foo');
        $this->queue->enqueue('bar');


        $this->assertEquals('foo', $this->queue->peek());
    }

    public function testDequeue()
    {
        $this->queue->enqueue('foo');
        $this->queue->enqueue('bar');

        $this->assertEquals('foo', $this->queue->dequeue());
    }
}
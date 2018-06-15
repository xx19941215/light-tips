<?php
namespace Test\DataStructure;

use DataStructure\Queue\LinkedListDeQueue;
use PHPUnit\Framework\TestCase;

class LinkedListDeQueueTest extends TestCase
{
    private $queue;

    public function setUp()
    {
        $this->queue = new LinkedListDeQueue(10);
    }

    public function testEnqueueAtFront()
    {
        $this->queue->enqueueAtFront('foo');
        $this->queue->enqueueAtFront('bar');

        $this->assertEquals('bar', $this->queue->peekFront());
    }

    public function testEnqueueAtBack()
    {
        $this->queue->enqueueAtBack('foo');
        $this->queue->enqueueAtBack('bar');

        $this->assertEquals('bar', $this->queue->peekBack());
    }
}
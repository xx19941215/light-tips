<?php
namespace Test\DataStructure;

use DataStructure\Queue\CircularQueue;
use PHPUnit\Framework\TestCase;

class CircularQueueTest extends TestCase
{
    private $circularQueue;

    public function setUp()
    {
        $this->circularQueue = new CircularQueue(10);
    }

    public function testEnqueue()
    {
        $this->circularQueue->enqueue('foo');
        $this->circularQueue->enqueue('bar');

        $this->assertEquals('foo', $this->circularQueue->peek());
    }

    public function testDequeue()
    {
        $this->circularQueue->enqueue('foo');
        $this->circularQueue->enqueue('bar');

        $this->assertEquals('foo', $this->circularQueue->dequeue());
    }

}
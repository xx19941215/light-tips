<?php

namespace DataStructure\Queue;

class ArrQueue implements QueueInterface
{
    private $queue;
    private $limit;

    public function __construct(int $limit = 0)
    {
       $this->limit = $limit;
       $this->queue = [];
    }

    public function isEmpty()
    {
        return empty($this->queue);
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('queue is empty');
        } else {
            array_shift($this->queue);
        }
    }

    public function enqueue(string $item)
    {
        if (count($this->queue) >= $this->limit) {
            throw new \OverflowException('queue is full');
        } else {
            array_unshift($this->queue, $item);
        }
    }

    public function peek()
    {
        return current($this->queue);
    }
}
<?php

namespace DataStructure\Queue;

use DataStructure\LinkedList\LinkedList;

class LinkedListQueue implements QueueInterface
{
    private $limit;
    private $queue;

    public function __construct(int $limit = 0)
    {
        $this->limit = $limit;
        $this->queue = new LinkedList();
    }

    public function isEmpty()
    {
        return $this->queue->getSize() == 0;
    }

    public function peek()
    {
        return $this->queue->getNthNode(0)->data;
    }

    public function enqueue(string $item)
    {
        if ($this->queue->getSize() < $this->limit) {
            $this->queue->insert($item);
        } else {
            throw new \OverflowException('queue is full');
        }
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('queue is empty');
        } else {
            $lastItem = $this->peek();
            $this->queue->deleteFirst();

            return $lastItem;
        }
    }
}
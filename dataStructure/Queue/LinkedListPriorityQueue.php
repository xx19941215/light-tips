<?php
namespace DataStructure\Queue;

class LinkedListPriorityQueue
{
    private $limit;
    private $queue;


    public function __construct(int $limit = 0)
    {
        $this->limit = $limit;
        $this->queue = new LinkedList();
    }

    public function enqueue(string $data = null, int $priority)
    {
        if ($this->queue->getSize() > $this->limit) {
            throw new \OverflowException('Queue is full');
        } else {
            $this->queue->insert($data, $priority);
        }
    }

    public function dequeue(): string
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('Queue is empty');
        } else {
            $item = $this->peek();
            $this->queue->deleteFirst();

            return $item->data;
        }
    }

    public function peek()
    {
        return $this->queue->getNthNode(0);
    }

    public function isEmpty()
    {
        return $this->queue->getSize() === 0;
    }
}

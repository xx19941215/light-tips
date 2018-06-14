<?php
namespace DataStructure\Queue;

class CircularQueue implements QueueInterface
{
    private $queue;
    private $limit;
    private $front = 0;
    private $rear = 0;

    public function __construct(int $limit = 0)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    public function isEmpty()
    {
        return $this->front === $this->rear;
    }

    public function isFull()
    {
        $diff = $this->rear - $this->front;

        if ($diff == -1 || $diff == ($this->limit - 1)) {
            return true;
        }

        return false;
    }

    public function peek()
    {
        return $this->queue[$this->front];
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('Queue is empty');
        }

        $item = $this->queue[$this->front];
        $this->queue[$this->front] = null;
        $this->front = ($this->front + 1) % $this->limit;

        return $item;
    }

    public function enqueue(string $item)
    {
        if ($this->isFull()) {
            throw new \OverflowException('Queue is full');
        }

        $this->queue[$this->rear] = $item;
        $this->rear = ($this->rear + 1) % $this->limit;

    }
}
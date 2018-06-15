<?php
namespace DataStructure\Queue;

class LinkedListDeQueue
{
    private $limit = 0;
    private $queue;

    public function __construct(int $limit = 0)
    {
        $this->limit = $limit;
        $this->queue = new \DataStructure\LinkedList\LinkedList();
    }

    public function dequeueFromFront(): string 
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('Queue is empty');
        }

        $item = $this->queue->getNthNode(0);
        $this->queue->deleteFirst();

        return $item->data;
    }

    public function dequeueFromBack(): string 
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('Queue is empty');
        }

        $item = $this->queue->getNthNode($this->queue->getSize() - 1);
        $this->queue->deleteLast();

        return $item->data;
    }

    public function isFull()
    {
        return $this->queue->getSize() >= $this->limit;
    }

    public function enqueueAtBack(string $data = null)
    {
        if ($this->isFull()) {
            throw new \OverflowException('queue is full');
        }

        $this->queue->insert($data);
    }

    public function enqueueAtFront(string $data = null)
    {
        if ($this->isFull()) {
            throw new \OverflowException('queue is full');
        }

        $this->queue->insertAtFirst($data);
    }

    public function isEmpty()
    {
        return $this->queue->getSize() === 0;
    }

    public function peekFront()
    {
        return $this->queue->getNthNode(0)->data;
    }

    public function peekBack()
    {
        return $this->queue->getNthNode($this->queue->getSize() - 1)->data;
    }
}
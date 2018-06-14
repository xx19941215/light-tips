<?php
namespace DataStructure\Spl;

class SqlQueue
{
    private $splQueue;

    public function __construct()
    {
        $this->splQueue = new \SplQueue();
    }

    public function enqueue(string $data = null)
    {
        $this->splQueue->enqueue($data);
    }

    public function dequeue()
    {
        return $this->splQueue->dequeue();
    }
}
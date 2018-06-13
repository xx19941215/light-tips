<?php
namespace DataStructure\Queue;

interface QueueInterface
{
    public function enqueue(string $item);
    public function dequeue();
    public function isEmpty();
    public function peek();
}
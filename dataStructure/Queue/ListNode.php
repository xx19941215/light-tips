<?php
namespace DataStructure\Queue;

class ListNode
{
    public $data = null;
    public $next = null;
    public $priority = 0;

    public function __construct(string $data, int $priority)
    {
        $this->data = $data;
        $this->priority = $priority;
    }
}
<?php
namespace DataStructure\DoublyLinkedList;

class ListNode
{
    public $data = null;
    public $next = null;
    public $prev = null;

    public function __construct(string $data)
    {
        $this->data = $data;
    }
}
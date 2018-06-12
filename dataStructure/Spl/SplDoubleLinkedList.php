<?php
namespace DataStructure\Spl;

class SplDoubleLinkedList
{
    public $splDoublyLinkedList;

    public function __construct()
    {
        $this->splDoublyLinkedList = new \SplDoublyLinkedList();
    }

    public function push(string $data = null)
    {
        $this->splDoublyLinkedList->push($data);
    }

    public function add(int $index = 0, string $data = null)
    {
        $this->splDoublyLinkedList->add($index, $data);
    }

    public function getNthNode(int $n = 0)
    {
        return $this->splDoublyLinkedList->offsetGet($n);
    }

}
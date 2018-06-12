<?php
namespace DataStructure\Stack;

use DataStructure\LinkedList\LinkedList;

class LinkedListStack implements StackInterface
{
    private $stack;

    public function __construct()
    {
        $this->stack = new LinkedList();
    }

    public function top()
    {
        return $this->stack->getNthNode($this->stack->getSize())->data;
    }

    public function isEmpty()
    {
        return $this->stack->getSize() === 0;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('stack is empty');
        } else {
            $lastItem = $this->top();
            $this->stack->deleteLast();

            return $lastItem;
        }
    }

    public function push(string $item)
    {
        $this->stack->insert($item);
    }
}
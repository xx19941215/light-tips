<?php
namespace DataStructure\Stack;

use DataStructure\LinkedList\LinkedList;

class LinkedListStack implements StackInterface
{
    private $stack;
    private $limit;

    public function __construct(int $limit)
    {
        $this->limit = $limit;
        $this->stack = new LinkedList();
    }

    public function top()
    {
        return $this->stack->getNthNode($this->stack->getSize() - 1)->data;
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
        if ($this->stack->getSize() < $this->limit) {
            $this->stack->insert($item);
        } else {
            throw new \OverflowException('stack is overflow');
        }
    }
}
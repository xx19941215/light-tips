<?php
namespace DataStructure\LinkedList;

class ListNode
{
    private $data;
    private $next;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function __get($var)
    {
        return $this->$var;
    }

    public function __set($var, $val)
    {
        return $this->$var = $val;
    }
}

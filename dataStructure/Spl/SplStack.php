<?php
namespace DataStructure\Spl;

class SplStack
{
    private $splStack;

    public function __construct()
    {
        $this->splStack = new \SplStack();
    }

    public function push(string $data)
    {
        $this->splStack->push($data);
    }

    public function pop()
    {
        $this->splStack->pop();
    }
}
<?php

namespace Test\DataStructure;

use DataStructure\Stack\LinkedListStack;
use PHPUnit\Framework\TestCase;

class LinkedListStackTest extends TestCase
{
    private $stack;

    public function setUp()
    {
        $this->stack = new LinkedListStack(10);
    }

    public function testPush()
    {
        $this->stack->push('foo');
        $this->stack->push('bar');


        $this->assertEquals('bar', $this->stack->top());
    }

    public function testPop()
    {
        $this->stack->push('foo');
        $this->stack->push('bar');

        $this->assertEquals('bar', $this->stack->pop());
    }

    public function testTop()
    {
        $this->stack->push('foo');
        $this->stack->push('bar');

        $this->assertEquals('bar', $this->stack->top());
    }
}
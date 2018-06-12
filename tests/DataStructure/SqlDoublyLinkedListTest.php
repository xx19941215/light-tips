<?php
namespace Test\DataStructure;

use DataStructure\Spl\SplDoubleLinkedList;
use PHPUnit\Framework\TestCase;

class SqlDoublyLinkedListTest extends TestCase
{
    private $sqlDoublyLinkedList;

    public function setUp()
    {
        $this->sqlDoublyLinkedList = new SplDoubleLinkedList();
    }

    public function testPush()
    {
        $this->sqlDoublyLinkedList->push('foo');
        $this->sqlDoublyLinkedList->push('bar');

        $this->assertEquals('bar', $this->sqlDoublyLinkedList->getNthNode(1));
    }

    public function testAdd()
    {
        $this->sqlDoublyLinkedList->push('foo');
        $this->sqlDoublyLinkedList->add(0, 'bar');

        $this->assertEquals('foo', $this->sqlDoublyLinkedList->getNthNode(1));
    }
}
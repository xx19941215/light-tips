<?php
namespace Test\DataStructure;

use DataStructure\CircularLinkedList\CircularLinkedList;
use PHPUnit\Framework\TestCase;

class CircularLinkedListTest extends TestCase
{
    private $circularLinkedList;
    
    public function setUp()
    {
        $this->circularLinkedList = new CircularLinkedList();    
    }

    public function testInsertAtEnd()
    {
        $this->circularLinkedList->insertAtEnd('foo');
        $this->circularLinkedList->insertAtEnd('bar');
        $this->circularLinkedList->insertAtEnd('hello');
        $this->circularLinkedList->insertAtEnd('world');

        $this->assertEquals('world', $this->circularLinkedList->getNthNode(3)->data);
    }
}
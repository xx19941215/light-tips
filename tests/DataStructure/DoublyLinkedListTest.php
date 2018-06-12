<?php
namespace Test\DataStructure;

use DataStructure\DoublyLinkedList\DoublyLinkedList;
use PHPUnit\Framework\TestCase;

class DoublyLinkedListTest extends TestCase
{
    private $doubleLinkedList;

    public function setUp()
    {
        $this->doubleLinkedList = new DoublyLinkedList();
    }

    public function testInsertAtFirst()
    {
        $this->doubleLinkedList->insertAtFirst('foo');
        $this->assertEquals('foo', $this->doubleLinkedList->getNthNode(0)->data);
    }

    public function testInsertAtLast()
    {
        $this->doubleLinkedList->insertAtFirst('foo');
        $this->doubleLinkedList->insertAtLast('bar');
        $this->assertEquals('bar', $this->doubleLinkedList->getNthNode(1)->data);
    }

    public function testInsertBefore()
    {
        $this->doubleLinkedList->insertAtFirst('foo');
        $this->doubleLinkedList->insertBefore('bar', 'foo');


        $this->assertEquals('bar', $this->doubleLinkedList->getNthNode(0)->data);
    }

    public function testInsertAfter()
    {
        $this->doubleLinkedList->insertAtFirst('foo');
        $this->doubleLinkedList->insertAfter('bar', 'foo');


        $this->assertEquals('bar', $this->doubleLinkedList->getNthNode(1)->data);
    }

    public function testDeleteFirst()
    {
        $this->doubleLinkedList->insertAtFirst('foo');
        $this->doubleLinkedList->insertAfter('bar', 'foo');

        $this->doubleLinkedList->deleteFirst();

        $this->assertEquals('bar', $this->doubleLinkedList->getNthNode(0)->data);
    }

    public function testDeleteLast()
    {
        $this->doubleLinkedList->insertAtFirst('foo');
        $this->doubleLinkedList->insertAfter('bar', 'foo');

        $this->doubleLinkedList->deleteLast();

        $this->assertEquals('foo', $this->doubleLinkedList->getNthNode(0)->data);
    }

    public function testInsert()
    {
        $this->doubleLinkedList->insert('foo');
        $this->doubleLinkedList->insert('bar');
        $this->doubleLinkedList->insert('hello');


        $this->assertEquals('hello', $this->doubleLinkedList->getNthNode(2)->data);
    }

    public function testReverse()
    {
        $this->doubleLinkedList->insert('foo');
        $this->doubleLinkedList->insert('bar');
        $this->doubleLinkedList->insert('hello');

        $this->doubleLinkedList->reverse();

        $this->assertEquals('hello', $this->doubleLinkedList->getNthNode(0)->data);
    }
}
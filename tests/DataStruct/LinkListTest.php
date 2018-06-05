<?php
namespace Test\DataStruct;

use \PHPUnit\Framework\TestCase;
use DataStruct\LinkList;

class LinkListTest extends TestCase
{
    private $linkList;

    public function setUp()
    {
        $this->linkList = new LinkList();
        parent::setUp();
    }

    public function testInsert()
    {
        $this->linkList->insert('xiao');
        $this->assertEquals('xiao', $this->linkList->getNthNode(0)->data);
    }

    public function testInsertBefore()
    {
        $this->linkList->insert('xiao');
        $this->linkList->insertBefore('work', 'xiao');
        $this->assertEquals('work', $this->linkList->getNthNode(0)->data);
    }

    public function testInsertAfter()
    {
        $this->linkList->insert('xiao');
        $this->linkList->insert('hello');
        $this->linkList->insertAfter('work', 'hello');
        $this->assertEquals('xiao', $this->linkList->getNthNode(0)->data);
    }

    public function testInsertAtFirst()
    {
        $this->linkList->insertAtFirst('xiao');
        $this->assertEquals('xiao', $this->linkList->getNthNode(0)->data);
    }

    public function testSearch()
    {
        $this->linkList->insert('xiao');
        $nodeList = $this->linkList->search('xiao');

        $this->assertEquals('xiao', $nodeList->data);
    }


    public function testDeleteFirst()
    {
        $this->linkList->insert('xiao');
        $this->linkList->insert('work');

        $this->linkList->deleteFirst();
        $this->assertEquals('work', $this->linkList->getNthNode(0)->data);
    }

    public function testDeleteLast() 
    {
        $this->linkList->insert('foo');
        $this->linkList->insert('bar');

        $this->linkList->deleteLast();
        $this->assertEquals('foo', $this->linkList->getNthNode(0)->data);
    }

    public function testDelete() 
    {
        $this->linkList->insert('foo');
        $this->linkList->insert('bar');

        $this->linkList->delete('bar');
        $this->assertEquals('foo', $this->linkList->getNthNode(0)->data);
    }

    public function testReverse() 
    {
        $this->linkList->insert('foo');
        $this->linkList->insert('bar');
        $this->linkList->insert('xiao');

        $this->linkList->reverse();

        $this->assertEquals('xiao', $this->linkList->getNthNode(0)->data);
    }
}

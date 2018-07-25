<?php
namespace Test\DataStructure;

use DataStructure\Tree\BST;
use DataStructure\Tree\BSTNode;
use PHPUnit\Framework\TestCase;

class BSTTest extends TestCase
{
    private $bst = null;

    public function setUp()
    {
        $this->bst = new BST(20);
    }

    public function testInsert()
    {
        $this->bst->insert(2);
        $this->bst->insert(3);
        $this->bst->insert(4);
        $this->bst->insert(5);

        $this->assertInstanceOf(BSTNode::class, $this->bst->search(20));
    }

    public function testInOrder()
    {
        $this->bst->insert(23);
        $this->bst->insert(15);
        $this->bst->insert(10);
        $this->bst->insert(16);
        $this->bst->insert(21);
        $this->bst->insert(25);

        $this->assertEquals([10,15,16,20,21,23,25], $this->bst->root->traverseInOrder());
    }
}
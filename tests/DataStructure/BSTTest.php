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
        $this->bst = new BST(1);
    }

    public function testInsert()
    {
        $this->bst->insert(2);
        $this->bst->insert(3);
        $this->bst->insert(4);
        $this->bst->insert(5);

        $this->assertInstanceOf(BSTNode::class, $this->bst->search(1));
    }
}
<?php
namespace DataStructure\Tree;

class BinaryNode
{
    public $data;
    public $left;
    public $right;


    public function __construct(string $data = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }

    public function addChildren(BinaryNode $left, BinaryNode $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}
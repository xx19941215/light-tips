<?php
namespace DataStructure\Tree;

class TreeNode
{
    public $data = null;

    public $children = [];

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }

    public function addChildren(TreeNode $treeNode)
    {
        $this->children[] = $treeNode;
    }
}
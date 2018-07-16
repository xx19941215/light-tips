<?php
namespace DataStructure\Tree;

class BSTNode
{
    public $data;
    public $left;
    public $right;

    public function __construct(int $data = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }

    public function min()
    {
        $node = $this;

        while ($node->left) {
            $node = $node->left;
        }

        return $node;
    }

    public function max()
    {
        $node = $this;

        while ($node->right) {
            $node = $node->right;
        }

        return $node;
    }

    public function successor()
    {
        $node = $this;

        if ($node->right) {
            return $node->right->min();
        }

        return null;

    }
}
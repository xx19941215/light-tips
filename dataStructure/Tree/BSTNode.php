<?php
namespace DataStructure\Tree;

class BSTNode
{
    public $data;
    public $left;
    public $right;
    public $parent;

    public function __construct(int $data = null, BSTNode $node = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
        $this->parent = $node;
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

    public function predecessor()
    {
        $node = $this;

        if ($node->left) {
            return $node->left->max();
        }

        return null;
    }

    public function delete()
    {
        $node = $this;

        if (!$node->left && !$node->right) {
            if ($node->parent->left === $node) {
                $node->parent->left = null;
            } else {
                $node->parent->right = null;
            }
        } elseif ($node->left && $node->right) {
            $successor = $node->successor();
            $node->data = $successor->data;
            $successor->delete();
        } elseif ($node->left) {
            if ($node->parent->left === $node) {
                $node->parent->left = $node->left;
                $node->left->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->left;
                $node->left->parent = $node->parent->right;
            }

            $node->left = null;
        } elseif ($node->right) {
            if ($node->parent->left === $node) {
                $node->parent->left = $node->right;
                $node->right->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->right;
                $node->right->parent = $node->parent->right;
            }

            $node->right = null;
        }
    }

    public function traversePreOrder()
    {
        $traverse = [];
        array_push($traverse, $this->data);

        if ($node = $this->left) {
            $traverse = array_merge($traverse, $node->traversePreOrder());
        }

        if ($node = $this->right) {
            $traverse = array_merge($traverse, $node->traversePreOrder());
        }

        return $traverse;
    }

    public function traversePostOrder()
    {
        $traverse = [];
        if ($node = $this->left) {
            $traverse = array_merge($traverse, $node->traverseInOrder());
        }

        
        if ($node = $this->right) {
            $traverse = array_merge($traverse, $node->traverseInOrder());
        }

        array_push($traverse, $this->data);

        return $traverse;
    }


    public function traverseInOrder()
    {
        $traverse = [];

        if ($node = $this->left) {
            $traverse = array_merge($traverse, $node->traverseInOrder());
        }

        array_push($traverse, $this->data);

        if ($node = $this->right) {
            $traverse = array_merge($traverse, $node->traverseInOrder());
        }

        return $traverse;
    }
}
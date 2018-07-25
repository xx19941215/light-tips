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

    public function traverse(BSTNode $node, string $type = 'in-order')
    {
        switch($type) {
            case "in-order":
            $this->inOrder($node);        
            break;

            case "pre-order":
            $this->preOrder($node);
            break;

            case "post-order":
            $this->postOrder($node);
            break;
        }
    }

    public function preOrder(BSTNode $node)
    {
        if ($node) {
            echo $node->data . PHP_EOL;
            if ($node->left) $this->traverse($node->left, 'pre-order');
            if ($node->right) $this->traverse($node->right, 'pre-order');
        }
    }

    public function inOrder(BSTNode $node)
    {
        if ($node) {
            if ($node->left) $this->traverse($node->left, 'in-order');
            echo $node->data . PHP_EOL;
            if ($node->right) $this->traverse($node->right, 'in-order');
        }
    }

    public function postOrder(BSTNode $node)
    {
        if ($node) {
            if ($node->left) $this->traverse($node->left, 'post-order');
            if ($node->right) $this->traverse($node->right, 'post-order');
            echo $node->data . PHP_EOL;
        }
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
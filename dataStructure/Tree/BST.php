<?php
namespace DataStructure\Tree;

class BST
{
    public $root;

    public function __construct(int $data)
    {
        $this->root = new BSTNode($data);
    }

    public function isEmpty(): bool
    {
        return $this->root === null;
    }

    public function search(int $data)
    {
        $node = $this->root;


        if ($this->isEmpty()) return false;

        while ($node) {
            if ($node->data < $data) {
                $node = $node->right;
            } elseif ($node->data > $data) {
                $node = $node->left;
            } else {
                break;
            }
        }

        return $node;
    }

    public function insert(int $data)
    {
        if ($this->isEmpty()) {
            $this->root = new BSTNode($data);

            return $this->root;
        }

        $node = $this->root;

        while ($node) {
            if ($node->data > $data) {
                if ($node->left) {
                    $node = $node->left;
                } else {
                    $node->left = new BSTNode($data);
                    $node = $node->left;
                    break;
                }

            } elseif ($node->data < $data) {
                if ($node->right) {
                    $node = $node->right;
                } else {
                    $node->right = new BSTNode($data);
                    $node = $node->right;
                    break;
                }
            } else {
                break;
            }
        }

        return $node;
    }
    
    public function traverse(BSTNode $node)
    {
        if ($node) {
            if ($node->left) $this->traverse($node->left);

            echo $node->data . PHP_EOL;

            if ($node->right) $this->traverse($node->right);
        }
    }
}

<?php
namespace DataStructure\Tree;

class BinaryTree
{
    public $root = null;

    public function __construct(BinaryNode $node)
    {
        $this->root = $node;
    }

    public function isEmpty()
    {
        return $this->root === null;
    }

    public function traverse(BinaryNode $node, int $level = 0)
    {
        if ($node) {
            echo str_repeat('-', $level) . $node->data . PHP_EOL;

            if ($node->left) {
                $this->traverse($node->left, $level + 1);
            }

            if ($node->right) {
                $this->traverse($node->right, $level + 1);
            }
        }
    }
}

require './BinaryNode.php';

$root = new BinaryNode('root');
$tree = new BinaryTree($root);

$semiFinal1 = new BinaryNode("Semi Final 1");
$semiFinal2 = new BinaryNode("Semi Final 2");
$quarterFinal1 = new BinaryNode("Quarter Final 1");
$quarterFinal2 = new BinaryNode("Quarter Final 2");
$quarterFinal3 = new BinaryNode("Quarter Final 3");
$quarterFinal4 = new BinaryNode("Quarter Final 4");
$semiFinal1->addChildren($quarterFinal1, $quarterFinal2);
$semiFinal2->addChildren($quarterFinal3, $quarterFinal4);
$root->addChildren($semiFinal1, $semiFinal2);
$tree->traverse($tree->root);


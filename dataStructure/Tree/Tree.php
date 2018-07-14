<?php

namespace DataStructure\Tree;

class Tree
{
    public $root = null;

    public function __construct(TreeNode $treeNode)
    {
        $this->root = $treeNode;
    }

    public function traverse(TreeNode $treeNode, int $level = 0)
    {
        if ($treeNode) {
            echo str_repeat('-', $level) . $treeNode->data . PHP_EOL;

            foreach ($treeNode->children as $child) {
                $this->traverse($child, $level + 1);
            }
        }
    }
}

require './TreeNode.php';

$ceo = new TreeNode('ceo');

$tree = new Tree($ceo);

$cfo = new TreeNode('cfo');
$cto = new TreeNode('cto');
$cmo = new TreeNode('cmo');
$coo = new TreeNode('coo');

$ceo->addChildren($cfo);
$ceo->addChildren($cto);
$ceo->addChildren($cmo);
$ceo->addChildren($coo);

$seniorArchitect = new TreeNode("Senior Architect");
$softwareEngineer = new TreeNode("SoftwareEngineer");

$userInterfaceDesigner = new TreeNode("userInterface Designer");
$qualityAssuranceEngineer = new TreeNode("qualityAssurance Engineer");


$cto->addChildren($seniorArchitect);
$seniorArchitect->addChildren($softwareEngineer);

$cto->addChildren($userInterfaceDesigner);
$cto->addChildren($qualityAssuranceEngineer);

$tree->traverse($tree->root);

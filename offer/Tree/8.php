<?php
//输入一棵二叉树，求该树的深度。
//从根结点到叶结点依次经过的结点（含根、叶结点）形成树的一条路径，最长路径的长度为树的深度。


/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function TreeDepth($pRoot)
{
    $currentNode = $pRoot;

    $q = $a = [];

    buildPath($pRoot, $q, $a);

    $depth = 0;

    array_map(function(array $path) use (&$depth) {
        if (count($path) > $depth) {
            $depth = count($path);
        }
    }, $a);

    return $depth;

}

function buildPath($node, $q, &$a)
{
    if ($node) {
        $q[] = $node->val;
        
        $node->left && buildPath($node->left, $q, $a);
        $node->right && buildPath($node->right, $q, $a);

        if (empty($node->left) && empty($node->right)) {
            $a[] = $q;
        }
    }

    return;
}
<?php

/**
 * 输入一颗二叉树的跟节点和一个整数，打印出二叉树中结点值的和为输入整数的所有路径。
 * 路径定义为从树的根结点开始往下一直到叶结点所经过的结点形成一条路径。
 * (注意: 在返回值的list中，数组长度大的数组靠前)
 */

 /*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function FindPath($root, $expectNumber)
{
    if (empty($root)) return [];

    $a = $q = [];

    buildPath($root, $expectNumber, $q, $a);

    return $a;
}

function buildPath($node, $sum, $q, &$a)
{
    if ($node) {
        $q[] = $node->val;
        $sum -= $node->val;

        if ($sum > 0) {
            buildPath($node->left, $sum, $q, $a);
            buildPath($node->right, $sum, $q, $a);
        } elseif (empty($node->left) && empty($node->right) && $sum == 0) {
            $a[] = $q;
        }
    }

}
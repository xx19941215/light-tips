<?php
/**
 * 给定一棵二叉搜索树，请找出其中的第k小的结点。
 * 例如， （5，3，7，2，4，6，8）    中，
 * 按结点数值大小顺序第三小结点的值为4。
 */

 /*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function KthNode($pRoot, $k)
{
    $traverse = inOrderTraverse($pRoot);
    if ($k <= count($traverse)) {
        return $traverse[$k - 1];
    }

    return null;
}

function inOrderTraverse($pRoot)
{
    $traverse = [];

    if ($left = $pRoot->left) {
        $traverse = array_merge($traverse, inOrderTraverse($left));
    }

    array_push($traverse, $pRoot);

    if ($right = $pRoot->right) {
        $traverse = array_merge($traverse, inOrderTraverse($right));
    }

    return $traverse;
}
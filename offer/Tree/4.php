<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
//从上往下打印出二叉树的每个节点，同层节点从左至右打印。
function PrintFromTopToBottom($root)
{
    $traverse = [];
    array_push($traverse, $root->val);
    inQueue($root, $traverse);
    return $traverse;
}

function inQueue($node, &$return)
{
    if (empty($node)) {
        return;
    }

    if ($left = $node->left) {
        array_push($return, $left->val);
    }

    if ($right = $node->right) {
        array_push($return, $right->val);
    }

    inQueue($left, $return);
    inQueue($right, $return);
}
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
//建立一个队列，先将根节点入队，然后将队首出队，然后判断它的左右子树是否为空，不为空，则先将左子树入队，然后右子树入队。
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
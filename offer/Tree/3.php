<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
//https://www.zhihu.com/question/31202353?rf=31230953
//操作给定的二叉树，将其变换为源二叉树的镜像。
function Mirror(&$root)
{
    if (empty($root)) {
        return;
    }

    $left = $root->left;
    $right = $root->right;
    $root->right = $left;
    $root->left = $right;

    Mirror($root->left);
    Mirror($root->right);
}
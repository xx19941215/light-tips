<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
/**
 * 输入某二叉树的前序遍历和中序遍历的结果，请重建出该二叉树。假设输入的前序遍历和中序遍历的结果中都不含重复的数字。
 * 例如输入前序遍历序列{1,2,4,7,3,5,6,8}和中序遍历序列{4,7,2,1,5,3,8,6}，则重建二叉树并返回。
 */

 //https://blog.csdn.net/qq_33951180/article/details/72790549
function reConstructBinaryTree($pre, $vin)
{
    if (empty($pre) || empty($vin)) {
        return null;
    }

    $root = new TreeNode($pre[0]);

    $indexInVin = array_search($pre[0], $vin, true);

    $leftPrev = array_slice($pre, 1, $indexInVin); 
    $leftVin = array_slice($vin, 0, $indexInVin); 

    $rightPrev = array_slice($pre, $indexInVin + 1);
    $rightVin = array_slice($vin, $indexInVin + 1);

    $root->left = reConstructBinaryTree($leftPrev, $leftVin);
    $root->right = reConstructBinaryTree($rightPrev, $rightVin);

    return $root;
}
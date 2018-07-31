<?php
//请实现一个函数，用来判断一颗二叉树是不是对称的。注意，如果一个二叉树同此二叉树的镜像是同样的，定义其为对称的。

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/

/*思路：首先根节点以及其左右子树，左子树的左子树和右子树的右子树相同
* 左子树的右子树和右子树的左子树相同即可，采用递归
* 非递归也可，采用栈或队列存取各级子树根节点
*/
function isSymmetrical($pRoot)
{
    // write code here
    if (empty($pRoot)) return true;
    
    return compare($pRoot->left, $pRoot->right);
}

function compare($left, $right)
{
    if ($left === null) return $right === null;
    if ($right === null) return false;
    if ($left->val != $right->val) return false;

    return compare($left->right, $right->left) && compare($left->left, $right->right);
}
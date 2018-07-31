<?php
//输入一棵二叉搜索树，将该二叉搜索树转换成一个排序的双向链表。
//要求不能创建任何新的结点，只能调整树中结点指针的指向。
/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
// 方法一：递归版
// 解题思路：
// 1.将左子树构造成双链表，并返回链表头节点。
// 2.定位至左子树双链表最后一个节点。
// 3.如果左子树链表不为空的话，将当前root追加到左子树链表。
// 4.将右子树构造成双链表，并返回链表头节点。
// 5.如果右子树链表不为空的话，将该链表追加到root节点之后。
// 6.根据左子树链表是否为空确定返回的节点。
function Convert($pRootOfTree)
{
    // write code here
    if (empty($pRootOfTree)) {
        return null;
    }

    if (empty($pRootOfTree->left) && empty($pRootOfTree->right)) {
        return $pRootOfTree;
    }

    //将左子树构造成双链表，并返回链表头节点。
    $left = Convert($pRootOfTree->left);
    $temp = $left;

    // 2.定位至左子树双链表最后一个节点。
    while($temp !== null && $temp->right != null) {
        $temp = $temp->right;
    }

    // 3.如果左子树链表不为空的话，将当前root追加到左子树链表。
    if ($left != null) {
        $temp->right = $pRootOfTree;
        $pRootOfTree->left = $temp;
    }

    // 4.将右子树构造成双链表，并返回链表头节点。
    $right = Convert($pRootOfTree->right);

    // 5.如果右子树链表不为空的话，将该链表追加到root节点之后。

    if ($right != null) {
        $right->left = $pRootOfTree;
        $pRootOfTree->right = $right;
    }

    return $left != null ? $left : $pRootOfTree;
}

//方法二
//非递归算法
//解题思路：
//1.核心是中序遍历的非递归算法。
//2.修改当前遍历节点与前一遍历节点的指针指向。
function ConvertNotRecursive($pRootOfTree)
{
    if (empty($pRootOfTree)) {
        return null;
    }

    $stack = new \SplStack();
    $p = $pRootOfTree;

    // 用于保存中序遍历序列的上一节点
    $pre = null;
    $isFirst = true;
    
    while ($p || !$stack->isEmpty()) {
        while($p) {
            $stack->push($p);
            $p = $p->left;
        }

        $p = $stack->pop();
        if ($isFirst) {
            // 将中序遍历序列中的第一个节点记为root
            $pRootOfTree = $p;
            $pre = $pRootOfTree;
            $isFirst = false;
        } else {
            $pre->right = $p;
            $p->left = $pre;
            $pre = $p;
        }

        $p = $p->right;
    }

    return $pRootOfTree;
}
<?php
/**
 * 请实现两个函数，分别用来序列化和反序列化二叉树
 */
/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function MySerialize($pRoot)
{

    $arr = [];
    doSerialize($pRoot, $arr);
    return implode(',', $arr);
}

function doSerialize($pRoot, &$arr)
{
    if (empty($pRoot)) {
        $arr[] = '#';
        return;
    }

    $arr[] = $pRoot->val;
    doSerialize($pRoot->left, $arr);
    doSerialize($pRoot->right, $arr);
}

function MyDeserialize($s)
{
    $arr = explode(',', $s);

    $i = -1;

    return doDeserialize($arr, $i); 
}

function doDeserialize($arr, &$i)
{
    $i++;
    if ($i >= count($arr)) {
        return null;
    }

    if ($arr[$i] == '#') return null;
    $node = new TreeNode($arr[$i]);
    $node->left = doDeserialize($arr, $i);
    $node->right = doDeserialize($arr, $i);

    return $node;
}
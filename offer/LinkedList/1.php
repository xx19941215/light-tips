<?php
/*
  输入一个链表，从尾到头打印链表每个节点的值。
  class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/

function printListFromTailToHead($head)
{
    // write code here
    $list = [];
    $currentNode = $head;
    while ($currentNode) {
        $list[] = $currentNode->val;
        $currentNode = $currentNode->next;
    }

    return array_reverse($list);
}

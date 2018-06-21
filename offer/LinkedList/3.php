<?php
/*
 * 输入一个链表，反转链表后，输出新链表的表头。
 */

/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function ReverseList($pHead)
{
    if (empty($pHead)) {
        return [];
    } else {
        $currentNode = $pHead;
        $reversedList = null;
        while ($currentNode) {
            $nextNode = $currentNode->next;
            $currentNode->next = $reversedList;
            $reversedList = $currentNode;
            $currentNode = $nextNode;
        }

        $pHead = $reversedList;

        return $pHead;
    }
}
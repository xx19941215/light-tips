<?php
/**
 * 两个链表的第一个公共节点
 */

/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function FindFirstCommonNode($pHead1, $pHead2)
{
    $currentNode1 = $pHead1;
    $currentNode2 = $pHead2;

    if ($currentNode1 === $currentNode2) {
        return $pHead1;
    }

    while ($currentNode1 !== $currentNode2) {
        $currentNode1 = ($currentNode1 == null ? $pHead2 : $currentNode1->next);
        $currentNode2 = ($currentNode2 == null ? $pHead1 : $currentNode2->next);
    }

    return $currentNode1;
}

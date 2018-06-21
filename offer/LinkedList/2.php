<?php
/*
输入一个链表，输出该链表中倒数第k个结点。
class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function FindKthToTail($head, $k)
{
    $currentNode = $head;
    $data = [];
    if ($currentNode) {
        while ($currentNode) {
            $data[] = $currentNode;
            $currentNode = $currentNode->next;
        }

        return $data[count($data) - $k];
    }

    return null;
}
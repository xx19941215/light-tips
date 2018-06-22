<?php
/**
 * 链表中环的入口节点
 */

/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function EntryNodeOfLoop($pHead)
{
    $nodes = [];
    $currentNode = $pHead;

    while($currentNode) {
        foreach ($nodes as $node) {
            if ($node === $currentNode) {
                return $currentNode;
            }
        }

        $nodes[] = $currentNode;
        $currentNode = $currentNode->next;
    }
}
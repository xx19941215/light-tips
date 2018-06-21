<?php
/*
 * 输入两个单调递增的链表，输出两个链表合成后的链表，当然我们需要合成后的链表满足单调不减规则。
 */

/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function Merge($pHead1, $pHead2)
{
    if (is_null($pHead1)) {
        return $pHead2;
    } elseif (is_null($pHead2)) {
        return $pHead1;
    }

    $merged = new ListNode(null);

    if ($pHead1->val < $pHead2->val) {
        $merged->val = $pHead1->val;
        $merged->next = Merge($pHead1->next, $pHead2);
    } else {
        $merged->val = $pHead2->val;
        $merged->next = Merge($pHead1, $pHead2->next);
    }

    return $merged;
}

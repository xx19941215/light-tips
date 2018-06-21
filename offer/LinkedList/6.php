<?php
/**
 * 在一个排序的链表中，存在重复的结点，请删除该链表中重复的结点，重复的结点不保留，返回链表头指针。
 * 例如，链表1->2->3->3->4->4->5 处理后为 1->2->5
 */

/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function deleteDuplication($pHead)
{
    $currentNode = $pHead;
    $prev = null;
    if ($currentNode) {
        while ($currentNode) {
            if ($currentNode->val == $currentNode->next->val) {
                $sameVal = $currentNode->val;

                while ($currentNode->val == $sameVal) {
                    $currentNode = $currentNode->next;
                }

                //头节点
                if (empty($prev)) {
                    $pHead = $currentNode;
                    $currentNode = $pHead;
                } else {
                    //正常节点
                    $prev->next = $currentNode;
                }
            } else {
                $prev = $currentNode;
                $currentNode = $currentNode->next;
            }


        }

    }

    return $pHead;
}
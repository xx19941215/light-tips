<?php
/**
 * 输入一个复杂链表（每个节点中有节点值，以及两个指针，一个指向下一个节点，另一个特殊指针指向任意一个节点），
 * 返回结果为复制后复杂链表的head。
 * （注意，输出结果中请不要返回参数中的节点引用，否则判题程序会直接返回空）
 */

/*class RandomListNode{
    var $label;
    var $next = NULL;
    var $random = NULL;
    function __construct($x){
        $this->label = $x;
    }
}*/
function MyClone($pHead)
{
    if (empty($pHead)) {
        return null;
    }
    // write code here
    $head = new RandomListNode($pHead->label);

    if ($nextNode = $pHead->next) {
        $head->next = MyClone($nextNode);
    }

    if ($randomNode = $pHead->random) {
        $head->random = $randomNode;
    }

    return $head;
}
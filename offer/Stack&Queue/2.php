<?php
/**
 * 用两个栈来实现一个队列，完成队列的Push和Pop操作。 队列中的元素为int类型。
 */

$stack = [];
function mypush($node)
{
    global $stack;
    array_push($stack, $node);
    // write code here
}
function mypop()
{
    global $stack;
    if ($stack) {
        return array_shift($stack);
    }
    // write code here
}

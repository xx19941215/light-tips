<?php
/**
 * 从上到下按层打印二叉树，同一层结点从左至右输出。每一层输出一行。
 */

function MyPrint($root)
{
    if (empty($root)) return [];

    $return = [];
    $stack = [];
    $cur = 0;
    $return[0] = [];
    $next = 1;
    $i = 0;
    $stack[0] = [];
    $stack[1] = [];
    
    array_push($stack[0], $root);
    while(!empty($stack[$cur]) || !empty($stack[$next])) {
        $top = array_shift($stack[$cur]);
        array_push($return[$i], $top->val);

        if ($left = $top->left) {
            array_push($stack[$next], $left);
        }

        if ($right = $top->right) {
            array_push($stack[$next], $right);
        }


        if (empty($stack[$cur])) {
            $cur = 1 - $cur;
            $next = 1 - $next;
            if (!empty($stack[0]) || !empty($stack[1])) {
                $i++;
                $return[$i] = [];
            }
        }
    }

    return $return;
}
<?php
//请实现一个函数按照之字形打印二叉树，即第一行按照从左到右的顺序打印，
//第二层按照从右至左的顺序打印，第三行按照从左到右的顺序打印，其他行以此类推。

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/

/**
 * 当我们在打印某一行的结点时，把下一层的结点保存到相应的栈中。
 * 如果当前打印的是奇数层，则先保存左子结点再保存右子结点到一个栈中；
 * 如果当前打印的是偶数层，则先保存右子结点再保存左子结点到另一个栈中。 
 */
function MyPrint($pRoot)
{
    if (empty($pRoot)) return [];
    $cur = 0;
    $next = 1;
    $stack[0] = [];
    $stack[1] = [];
    array_push($stack[0], $pRoot);
    $i = 0;
    $return = [];
    $return[0] = [];

    while (!empty($stack[$cur]) || !empty($stack[$next])) {
        $top = array_pop($stack[$cur]);
        array_push($return[$i], $top->val);

        if ($cur == 0) {
            if ($left = $top->left) {
                array_push($stack[$next], $left);
            }

            if ($right = $top->right) {
                array_push($stack[$next], $right);
            }
        } else {
            if ($right = $top->right) {
                array_push($stack[$next], $right);
            }

            if ($left = $top->left) {
                array_push($stack[$next], $left);
            }
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
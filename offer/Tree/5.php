<?php

/**
 * 输入一个整数数组，判断该数组是不是某二叉搜索树的后序遍历的结果。
 * 如果是则输出Yes,否则输出No。假设输入的数组的任意两个数字都互不相同。
 */
//BST的后序序列的合法序列是，对于一个序列S，最后一个元素是x （也就是根），如果去掉最后一个元素的序列为T，
//那么T满足：T可以分成两段，前一段（左子树）小于x，后一段（右子树）大于x，且这两段（子树）都是合法的后序序列。完美的递归定义。
//第一版实现，以后再看有没有简单的写法
function VerifySquenceOfBST($sequence)
{
    if (count($sequence) == 0) return false;
    if (count($sequence) == 1) return true;
    
    if ($sequence) {
        $length = count($sequence);
        
         if ($length == 2) {
            if ($sequence[0] < $sequence[1]) return true;
        }
        
        $root = $sequence[$length - 1];
        $left = [];
        $right = [];

        $leftFlag = false;
        $rightFlag = false;

        $i = 0;
        while($sequence[$i] < $root) {
            array_push($left, $sequence[$i]);
            $i++;
        }

        $i === count($left) && $leftFlag = true;

        $j = $i;
        while($sequence[$j] > $root) {
             array_push($right, $sequence[$j]);
             $j++;
        }

        ($j === ($length - 1)) && $rightFlag = true;

        if ($leftFlag && $rightFlag) {
            if ($left && $right) {
                return VerifySquenceOfBST($left) && VerifySquenceOfBST($right);
            } elseif ($left) {
                return VerifySquenceOfBST($left);
            } else {
                return VerifySquenceOfBST($right);
            }
        } else {
            return false;
        }
    }

    return true;
}
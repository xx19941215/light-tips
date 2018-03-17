<?php 

/**
 * 大家都知道斐波那契数列，现在要求输入一个整数n，请你输出斐波那契数列的第n项。
 */

/**
 * 不推荐使用递归算法，这是效率最低的解法，原因是会出现大量的重复计算。
 */

function Fibonacci($n)
{
    $preNum = 1;
    $prePreNum = 0;
    $result = 1;
    if ($n == 0) {
        return 0;
    }
     
    if ($n == 1) {
        return 1;
    }
     
    for ($i = 2; $i <=$n; $i++) {
        $result = $preNum + $prePreNum;
        $prePreNum = $preNum;
        $preNum = $result;
    }
     
    return $result;
}
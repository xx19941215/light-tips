<?php
function binarySearchRecursion(array $arr, int $needle, int $low, int $high)
{
    if ($high < $low) return -1;

    $middle = (int)(($high + $low) / 2);

    if ($arr[$middle] < $needle) {
        return binarySearchRecursion($arr, $needle, $middle + 1, $high);
    } elseif ($arr[$middle] > $needle) {
        return binarySearchRecursion($arr, $needle, $low, $middle - 1);
    } else {
        return $middle;
    }
}
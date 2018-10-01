<?php

function exponentialSearch(array $arr, int $needle): int
{
    $length = count($arr);
    if ($length == 0) return -1;

    $bound = 1;

    while ($bound < $length && $arr[$bound] < $needle) {
        $bound *= 2;
    }

    return binarySearchRecursion($arr, $needle, $bound >> 1, min($bound, $length));
}

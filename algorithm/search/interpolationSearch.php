<?php

function interpolationSearch(array $arr, int $needle)
{
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
    // while ($arr[$low] != $arr[$high] && $needle >= $arr[$low] && $needle <= $arr[$high]) {
        $middle = intval($low + ($needle - $arr[$low]) * ($high - $low) / ($arr[$high] - $arr[$low]));

        if ($arr[$middle] < $needle) {
            $low = $middle + 1;
        } elseif ($arr[$middle] > $needle) {
            $high = $middle - 1;
        } else {
            return $middle;
        }
    }

    // if ($needle == $arr[$low]) {
    // 	return $low;
    // }

    return -1;
    
}
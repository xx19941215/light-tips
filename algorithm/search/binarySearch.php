<?php

function binarySearch(array $arr, int $needle)
{
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {
        $middle = (int)(($high + $low) / 2);

        if ($arr[$middle] < $needle) {
            $low = $middle + 1;
        } elseif ($arr[$middle] > $needle) {
            $high = $middle - 1;
        } else {
            return true;
        }
    }

    return false;
}
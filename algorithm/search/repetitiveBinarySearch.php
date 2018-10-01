<?php

function repetitiveBinarySearch(array $data, int $needle)
{
    $low = 0;
    $high = count($data);
    $firstIndex = -1;

    while ($low <= $high) {
        $middle = ($low + $high) >> 1;

        if ($data[$middle] === $needle) {
            $firstIndex = $middle;
            $high = $middle - 1;
        } elseif ($data[$middle] > $needle) {
            $high = $middle - 1;
        } else {
            $low = $middle + 1;
        }
    }

    return $firstIndex;
}

<?php

function linearSearch(array $arr, int $needle) {
    for ($i = 0, $count = count($arr); $i < $count; $i++) {
        if ($needle === $arr[$i]) {
            return true;
        }
    }

    return false;
}

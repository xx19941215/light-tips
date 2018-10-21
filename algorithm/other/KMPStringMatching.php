<?php

error_reporting(-1);
function strFindAll(string $str, string $find)
{
    $strLength = strlen($str);
    $findLength = strlen($find);

    $ret = [];

    if ($strLength < $findLength) return -1;
    for ($i = 0; $i <= $strLength - $findLength; $i++) {
        for ($j = 0; $j < $findLength; $j++) {
            if ($str[$i + $j] != $find[$j]) {
                break;
            }
        }

        if ($j == $findLength) {
            $ret[] = $i;
        }

    }

    return $ret;
}

$txt = "AABAACAADAABABBBAABAA";
$pattern = "AABA";
$matches = strFindAll($txt, $pattern);

var_dump($matches);
<?php

/**
 * 基数排序
 */

require_once __DIR__ . '/../random.php';

function maxLength(array $data)
{
    $maxLength = 0;

    for ($i = 0; $i < count($data); $i++) {
        $item = $data[$i];
        $currentLength = count(str_split($item));
        $maxLength = $currentLength > $maxLength ? $currentLength : $maxLength;
    }

    return $maxLength;
}

function getRadixByLoop(int $item, int $loop)
{
    $arr = str_split($item);

    if (count($arr) - 1 - $loop < 0) return 0;

    return (int) $arr[count($arr) - 1 - $loop];
}

function doSort(&$arr, int $loopCount)
{
    $bucket = array_fill(0, 10, []);

    $data = [];

    for ($i = 0; $i < count($arr); $i++) {
        $item = $arr[$i];
        $bucket[getRadixByLoop($item, $loopCount)][] = $item;
    }

    //还原数据
    $k = 0;
    for ($i = 0; $i < 10; $i++) {
        $currentBucketLen = count($bucket[$i]);

        for ($j = 0; $j < $currentBucketLen; $j++) {
            $data[$k] = $bucket[$i][$j];
            $k++;
        }
    }

    $arr = $data;
}

function radixSort(&$data)
{
    $maxLength = maxLength($data);

    for ($loopCount = 0; $loopCount < $maxLength; $loopCount++) {
        doSort($data, $loopCount);
    }
}



$arr = randomArr(1, 1000, 100);
$start = microtime(true);
radixSort($arr);
$end = microtime(true);
$used = $end - $start;
echo "radixSort used $used s" . PHP_EOL;

var_dump($arr);

<?php
/**
 * 堆排序是对选择排序的改进
 * 定理：堆排序处理N个不同元素的随机排列的平均比较次数
 * O(NlogN) - O(NloglogN)
 * 虽然堆排序给出最佳平均时间复杂度但实际效果不如用
 * Sedgewick增量序列的希尔排序
 */
require_once __DIR__ . '/../uniqueRandom.php';

function heapSort(&$arr)
{
    $length = count($arr);
    //使用具有线性复杂度的算法把数组调整成最大堆
    buildHeap($arr);
    $heapSize = $length - 1;
    for ($i = $heapSize; $i >= 0; $i--) {
        list($arr[0], $arr[$heapSize]) = [$arr[$heapSize], $arr[0]];
        $heapSize--;
        //再把剩下的元素调整成最大堆
        heapify(0, $heapSize, $arr);
    }
}

function buildHeap(&$arr)
{
    $length = count($arr);
    $heapSize = $length - 1;
    for ($i = ($length / 2); $i >= 0; $i--) {
        heapify($i, $heapSize, $arr);
    }
}

function heapify(int $k, int $heapSize, array &$arr)
{
    $largest = $k;
    $left = 2 * $k + 1;
    $right = 2 * $k + 2;

    if ($left <= $heapSize && $arr[$k] < $arr[$left]) {
        $largest = $left;
    }

    if ($right <= $heapSize && $arr[$largest] < $arr[$right]) {
        $largest = $right;
    }

    if ($largest != $k) {
        list($arr[$largest], $arr[$k]) = [$arr[$k], $arr[$largest]];
        heapify($largest, $heapSize, $arr);
    }
}

$arr = uniqueRandom(1, 100000, 5000);
$start = microtime(true);
heapSort($arr);
$end = microtime(true);
$used = $end - $start;
echo "used $used s" . PHP_EOL;

//used 0.10528588294983 s
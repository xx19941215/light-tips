<?php

require_once __DIR__ . '/../uniqueRandom.php';

/**
 * 归并排序
 * 时间复杂度 O(n log n)
 * 空间复杂度 O(n)
 * 发明人: 约翰·冯·诺伊曼
 * 速度仅次于快速排序，为稳定排序算法，一般用于对总体无序，但是各子项相对有序的数列
 */

function mergeSort($arr)
{
    $lenght = count($arr); 
    if ($lenght == 1) return $arr;
    $mid = (int)($lenght / 2);

    //把待排序数组分割成两半
    $left = mergeSort(array_slice($arr, 0, $mid));
    $right = mergeSort(array_slice($arr, $mid));

    return merge($left, $right);
}

function merge(array $left, array $right)
{
    //初始化两个指针
    $leftIndex = $rightIndex = 0;
    $leftLength = count($left);
    $rightLength = count($right);
    $combine = [];

    //比较两个指针所在的元素
    while ($leftIndex < $leftLength && $rightIndex < $rightLength) {
        //如果左边的元素大于右边的元素，就将右边的元素放在单独的数组，并将右指针向后移动
        if ($left[$leftIndex] > $right[$rightIndex]) {
            $combine[] = $right[$rightIndex];
            $rightIndex++;
        } else {
            //如果右边的元素大于左边的元素，就将左边的元素放在单独的数组，并将左指针向后移动
            $combine[] = $left[$leftIndex];
            $leftIndex++;
        }
    }

    //右边的数组全部都放入到了返回的数组，然后把左边数组的值放入返回的数组
    while ($leftIndex < $leftLength) {
        $combine[] = $left[$leftIndex];
        $leftIndex++;
    }

    //左边的数组全部都放入到了返回的数组，然后把右边数组的值放入返回的数组
    while ($rightIndex < $rightLength) {
        $combine[] = $right[$rightIndex];
        $rightIndex++;
    }

    return $combine;
}

$arr = uniqueRandom(1, 100000, 5000);

$start = microtime(true);
$arr = mergeSort($arr);
$end = microtime(true);
$used = $end - $start;
echo "used $used s" . PHP_EOL;
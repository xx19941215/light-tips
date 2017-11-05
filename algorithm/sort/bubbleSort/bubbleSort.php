<?php

/**
 * 冒泡排序 PHP实现 
 * 原理：两两相邻比较，如果反序就交换，否则不交换
 * 时间复杂度：最坏 O(n2) 平均 O(n2)
 * 空间复杂度：O(1)
 */

require_once '../uniqueRandom.php';

function bubbleSort(&$arr) : void
{
	$swapped = false;
	for ($i = 0, $c = count($arr); $i < $c; $i++) {
		for ($j = 0; $j < $c - 1; $j ++) {
			if ($arr[$j + 1] < $arr[$j]) {
				list($arr[$j], $arr[$j + 1]) = array($arr[$j + 1], $arr[$j]);
			}
		}

		if ($swapped) break; //第一遍没有发生交换，算法结束
	}
}

$arr = uniqueRandom(1, 100000, 5000);
$start = time();
bubbleSort($arr);
$end = time();
$used = $end - $start;
echo "V1 used $used s" . PHP_EOL;

function bubbleSortV2(&$arr) : void
{
	$newn = 0;
	for ($i = 0, $c = count($arr); $i < $c; $i++) {
		for ($j = 1; $j < $c; $j ++) {
			if ($arr[$j] < $arr[$j - 1]) {
				list($arr[$j], $arr[$j - 1]) = array($arr[$j - 1], $arr[$j]);
				$newn = $j;
			}
		}
		//记录最后一次的交换位置,在此之后的元素在下一轮扫描中均不考虑
		$c = $newn;
	}
}

$arr = uniqueRandom(1, 100000, 5000);
$start = time();
bubbleSortV2($arr);
$end = time();
$used = $end - $start;
echo "V2 used $used s" . PHP_EOL;
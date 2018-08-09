<?php

/**
 * 选择排序
 * 工作原理是每次从待排序的元素中的第一个元素设置为最小值，遍历每一个没有排序过的元素，如果元素小于现在的最小值，就将这个元素设置成为最小值，遍历结束就将最小值和第一个没有排过序交换位置，这样的遍历需要进行元素个数-1次
 * 这是一个不稳定的排序算法(排序后相对次序改变了)
 */
require_once __DIR__ . '/../uniqueRandom.php';


function selectSort(&$arr)
{
	$count = count($arr);

	for ($j = 0; $j <= $count - 1; $j++) {
		$min = $arr[$j];
		
		for ($i = $j + 1; $i < $count; $i++) {
			if ($arr[$i] < $min) {
				$min = $arr[$i];
				$minPos = $i;
			}
		}

		list($arr[$j], $arr[$minPos]) = [$min, $arr[$j]];
	}
	
}

$arr = uniqueRandom(1, 100000, 5000);

$start = microtime(true);
selectSort($arr);
$end = microtime(true);
$used = $end - $start;
echo "used $used s" . PHP_EOL;

//used 1.1448910236359 s
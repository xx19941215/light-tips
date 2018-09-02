<?php

/**
 * 选择排序
 * 工作原理是每次从待排序的元素中的第一个元素设置为最小值，
 * 遍历每一个没有排序过的元素，如果元素小于现在的最小值，
 * 就将这个元素设置成为最小值，遍历结束就将最小值和第一个没有排过序交换位置，
 * 这样的遍历需要进行元素个数-1次
 * 这是一个不稳定的排序算法(排序后相对次序改变了)
 * 对于选择排序如何找到最小元是关键 所以我们需要使用堆排序
 */
require_once __DIR__ . '/../uniqueRandom.php';


function selectionSort(&$arr)
{
	$count = count($arr);

	//重复元素个数-1次
	for ($j = 0; $j <= $count - 1; $j++) {
		//把第一个没有排过序的元素设置为最小值
		$min = $arr[$j];
		//遍历每一个没有排过序的元素
		for ($i = $j + 1; $i < $count; $i++) {
			//如果这个值小于最小值
			if ($arr[$i] < $min) {
				//把这个元素设置为最小值
				$min = $arr[$i];
				//把最小值的位置设置为这个元素的位置
				$minPos = $i;
			}
		}
		//内循环结束把最小值和没有排过序的元素交换
		list($arr[$j], $arr[$minPos]) = [$min, $arr[$j]];
	}
	
}

$arr = uniqueRandom(1, 100000, 5000);

$start = microtime(true);
selectionSort($arr);
$end = microtime(true);
$used = $end - $start;
echo "used $used s" . PHP_EOL;

//used 1.1448910236359 s
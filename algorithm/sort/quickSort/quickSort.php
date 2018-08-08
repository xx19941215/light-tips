<?php
/**
 * 快速排序是找出一个元素（理论上可以随便找一个）作为基准(pivot),然后对数组进行分区操作,使基准左边元素的值都不大于基准值,基准右边的元素值 都不小于基准值，如此作为基准的元素调整到排序后的正确位置。递归快速排序，将其他n-1个元素也调整到排序后的正确位置。最后每个元素都是在排序后的正 确位置，排序完成。所以快速排序算法的核心算法是分区操作，即如何调整基准的位置以及调整返回基准的最终位置以便分治递归。
 * 时间复杂度 最坏O(n2) 平均 O(nlogn)
 * 空间复杂度 O(log2n)~O(n)
 */

require_once __DIR__ . '/../uniqueRandom.php';

function quickSort(&$arr) 
{
	$count = count($arr);
	if ($count <= 1) {
		return $arr;
	}

	$left = $right = [];
	for ($i = 1; $i < $count; $i++) {
		if ($arr[$i] < $arr[0]) {
			$left[] = $arr[$i];
		} else {
			$right[] = $arr[$i];
		}
	}

	$left = quickSort($left);
	$right = quickSort($right);
	return array_merge($left, [$arr[0]], $right);
}


$arr = uniqueRandom(1, 100000, 5000);
$start = time();
quickSort($arr);
$end = time();
$used = $end - $start;
echo "used $used s" . PHP_EOL;

// var_dump(quickSort($arr));
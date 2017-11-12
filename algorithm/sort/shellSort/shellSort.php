<?php
/**
 * 原理：把排序的数据根据增量分成几个子序列，对子序列进行插入排序，直到增量为1，直接进行插入排序，增量的排序，一般是数组长度的一半，再变为原来增量的一半，直到增量为1
<<<<<<< HEAD
 时间复杂度：最差 Ω(n2) 平均时间复杂度 O(log2n)
=======
 * 时间复杂度：最差 O(n2) 平均时间复杂度 O(log2n)
>>>>>>> 07674f07cda9d35aca6f6273f407b92cab845dcb
 */

require_once '../uniqueRandom.php';

function shellSort(&$arr) 
{
	$count = count($arr);
	for ($gap = intval($count / 2); $gap > 0; $gap = intval($gap / 2)) {
		for ($i = $gap; $i < $count; $i++) {
			for ($j = $i; $j >= $gap; $j -= $gap) {
				if ($arr[$j - $gap] > $arr[$i]) {
					list($arr[$i], $arr[$j - $gap]) = array($arr[$j - $gap], $arr[$i]);
				}
			}
		}
	}
}


$arr = uniqueRandom(1, 100, 10);
$start = time();
shellSort($arr);
$end = time();
$used = $end - $start;
echo "used $used s" . PHP_EOL;

var_dump($arr);
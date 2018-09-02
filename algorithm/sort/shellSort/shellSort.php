<?php
/**
 * 原理：把排序的数据根据增量分成几个子序列，对子序列进行插入排序，
 * 直到增量为1，直接进行插入排序，增量的排序，一般是数组长度的一半，再变为原来增量的一半，直到增量为1
 * 时间复杂度：最差 Θ(n2) 平均时间复杂度 O(log2n)
 * 最差的情况：因为$gap的值不互质(最大公因数不是1)所以导致增量序列没有起到作用
 * 可以使用例如 Hibbrd增量序列
 */

require_once __DIR__ . '/../uniqueRandom.php';

function shellSort(&$arr) 
{
	$count = count($arr);
	//希尔增量序列
	for ($gap = intval($count / 2); $gap > 0; $gap = intval($gap / 2)) {
		//插入排序
		for ($p = $gap; $p < $count; $p++) {
			$temp = $arr[$p];
			for ($i = $p; $i >= $gap && $arr[$i - $gap] > $temp; $i -= $gap) {
				$arr[$i] = $arr[$i - $gap];
			}
			$arr[$i] = $temp;
		}
	}
}


$arr = uniqueRandom(1, 100000, 5000);
$start = microtime(true);
shellSort($arr);
$end = microtime(true);
$used = $end - $start;
echo "used $used s" . PHP_EOL;
//used 0.025881052017212 s
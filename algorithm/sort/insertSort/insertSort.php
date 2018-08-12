<?php
/**
 * 直接插入排序
 * 原理：每次从无序列表中取出第一个元素，把他插入到有序表中的合适位置，使有序表仍然有序
 * 时间复杂度：最坏O(n2) 平均O(n2)
 * 空间复杂度 O(1)
 */
require_once __DIR__ . '/../uniqueRandom.php';

function insertSort(&$arr) : void
{
    for ($i = 0, $c = count($arr) - 1; $i < $c; $i++) {
		for ($j = $i + 1; $j > 0; $j--) {
			if ($arr[$j] < $arr[$j - 1]) {
				list($arr[$j - 1], $arr[$j]) = array($arr[$j], $arr[$j - 1]);
			}
		}
	}
}

$arr = uniqueRandom(1, 100000, 100);
$start = microtime(true);
insertSort($arr);
$end = microtime(true);
$used = $end - $start;
echo "insertSort used $used s" . PHP_EOL;
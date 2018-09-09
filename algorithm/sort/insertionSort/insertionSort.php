<?php
/**
 * 直接插入排序(类比抓牌)
 * 原理：每次从无序列表中取出第一个元素，把他插入到有序表中的合适位置，使有序表仍然有序
 * 时间复杂度：最好O(n) 最坏O(n2) 平均O(n2)
 * 空间复杂度 O(1)
 * T(N, I)=O(N+I)(N是元素个数，I是逆序对个数)换言之，如果序列基本有序，使用插入排序简单且高效
 * 定理：任何N个不同元素组成的序列平均具有N(N-1)/4个逆序对
 * 任何仅以交换相邻元素来排序的算法其平均时间复杂度位为Ω(n2)
 * 意味着要提高算法效率我们必须每次消去不止一个逆序对或者每次交换相隔较远的两个元素
 */
require_once __DIR__ . '/../uniqueRandom.php';

function insertionSort(&$arr) : void
{
    for ($p = 1, $c = count($arr); $p < $c; $p++) {
		//摸下一张牌
		$temp = $arr[$p];
		for ($i = $p; $i > 0 && $arr[$i - 1] > $temp; $i--) {
			//移出空位
			$arr[$i] = $arr[$i - 1];
		}
		//新牌落位
		$arr[$i] = $temp;
	}
}

$arr = uniqueRandom(1, 100000, 5000);
$start = microtime(true);
insertionSort($arr);
$end = microtime(true);
$used = $end - $start;
echo "insertionSort used $used s" . PHP_EOL;
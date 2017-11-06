<?php
/**
 * 原理：把排序的数据根据增量分成几个子序列，对子序列进行插入排序，直到增量为1，直接进行插入排序，增量的排序，一般是数组长度的一半，再变为原来增量的一半，直到增量为1
 * 时间复杂度：最差 O(n2) 平均时间复杂度 O(log2n)
 */
function shellSort(&$arr) 
{
	for ($gap = intval(count($arr) / 2); $gap > 0; $gap = intval($gap / 2)) {
		for ($i = 0; $i < $gap; $i++) {
			for ($j = $i + $gap; $j < count($arr); $j += $gap) {

				if ($arr[$i] < $arr[$j]) {
					$temp = $arr[$j];
					while($i >= 0 && $arr[$i] > $temp) {
						$arr[$j] = $arr[$i];
					}
				}
			}
		}
	}
}
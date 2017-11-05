<?php
function uniqueRandom($min, $max, $num)
{
	$count = 0;
	$return = [];

	while($count < $num) {
		$return[] = mt_rand($min, $max);
		//去重
		$return = array_flip(array_flip($return));
		$count = count($return);
	}

	shuffle($return);
	return $return;
}
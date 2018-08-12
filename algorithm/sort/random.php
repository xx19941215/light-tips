<?php
function randomArr($min, $max, $num, $sorted = false, $isUnique = false)
{
	$count = 0;
	$return = [];

	while($count < $num) {
        $return[] = mt_rand($min, $max);
        if ($isUnique) {
            $return = array_flip(array_flip($return));
        }
		$count = count($return);
    }

    if ($sorted) sort($return);

	return $return;
}
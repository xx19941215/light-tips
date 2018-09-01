<?php
/**
 * 桶排序
 * 不是一种基于比较的排序
 * T(N, M) = O(M + N) N是带排序的数据的个数，M是数据值的数量
 * 当 M >> N 时，需要考虑使用基数排序
 */
require_once __DIR__ . '/../random.php';

function bucketSort(array &$data)
{
    $bucketLen = max($data) - min($data) + 1;
    $bucket = array_fill(0, $bucketLen, []);

    for ($i = 0; $i < count($data); $i++) {
        array_push($bucket[$data[$i] - min($data)], $data[$i]);
    }

    $k = 0;

    for ($i = 0; $i < $bucketLen; $i++) {
        $currentBucketLen = count($bucket[$i]);

        for ($j = 0; $j < $currentBucketLen; $j++) {
            $data[$k] = $bucket[$i][$j];
            $k++;
        }
    }
}

$arr = randomArr(1, 100, 50);
$start = microtime(true);
bucketSort($arr);
$end = microtime(true);
$used = $end - $start;
echo "bucketSort used $used s" . PHP_EOL;

 
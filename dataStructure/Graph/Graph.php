<?php
namespace DataStructure\Graph;

use DataStructure\Spl\SplPriorityQueue;


class Graph
{
    public static function BFS(&$graph, int $start, array $visited) : \SplQueue
    {
        $queue = new \SplQueue;
        $path = new \SplQueue;


        $queue->enqueue($start);
        $visited[$start] = 1;

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            $path->enqueue($node);

            foreach ($graph[$node] as $key => $vertex) {
                if (!$visited[$key] && $vertex == 1) {
                    $visited[$key] = 1;
                    $queue->enqueue($key);
                }
            }

        }

        return $path;
    }

    public static function DFS(&$graph, int $start, array $visited) : \SplQueue
    {
        $stack = new \SplStack();
        $path = new \SplQueue();

        $stack->push($start);
        $visited[$start] = 1;

        while (!$stack->isEmpty()) {
            $node = $stack->pop();
            $path->enqueue($node);

            foreach ($graph[$node] as $key => $vertex) {
                if (!$visited[$key] && $vertex == 1) {
                    $visited[$key] = 1;
                    $stack->push($key);
                }
            }
        }

        return $path;
    }

    public static function topologicalSort(array $matrix): \SplQueue
    {
        $order = new \SplQueue();
        $queue = new \SplQueue();
        $size = count($matrix);
        $incoming = array_fill(0, $size, 0);

        //找到所有入度为0的顶点
        for ($i = 0; $i < $size; $i++) {
            //遍历所有到顶点$i的边
            for ($j = 0; $j < $size; $j++) {
                if ($matrix[$j][$i]) {
                    //入度加1
                    $incoming[$i]++;
                }
            }

            //如果没有到$i的边
            if ($incoming[$i] == 0) {
                //将$i放入队列
                $queue->enqueue($i);
            }
        }

        while (!$queue->isEmpty()) {
            //从队列中拿一个顶点
            $node = $queue->dequeue();
            for ($i = 0; $i < $size; $i++) {
                //如果这个顶点到任何一个其他顶点都有边
                if ($matrix[$node][$i] == 1) {
                    //删除这个边
                    $matrix[$node][$i] = 0;
                    //另外这个顶点入度-1
                    $incoming[$i]--;
                    //如果这个顶点入度为0加入队列 
                    if ($incoming[$i] == 0) {
                        $queue->enqueue($i);
                    }
                }
            }

            $order->enqueue($node);
        }

        if ($order->count() != $size) { //cycle detected
            return new SplQueue();
        }

        return $order;
    }

    protected static function topologicalSortV2(array $matrix): \SplQueue
    {
        //这次使用数组存储顶点
        $sorted = [];
        $nodes = [];

        $size = count($matrix);

        //找到所有入度为0的顶点
        for ($i = 0; $i < $size; $i++) {
            $sum = 0;
            for ($j = 0; $j < $size; $j++) {
                $sum += $matrix[$j][$i];
            }

            if (!$sum) {
                array_push($nodes, $i);
            }
        }

        while($nodes) {
            //从所有入度为0的顶点中拿一个
            $node = array_shift($nodes);
            //放到排序的数组中
            array_push($sorted, $node);

            foreach($matrix[$node] as $index => $hasEdge) {
                //扫描这个这个顶点所有指向的顶点
                if ($hasEdge) {
                    //如果有边，就删除这个边
                    $matrix[$node][$index] = 0;

                    $sum = 0;

                    //接着检查被删除的边指向的顶点，看是不是入度为0
                    for ($i = 0; $i < $size; $i++) {
                        $sum += $matrix[$i][$index];
                    }

                    if (!$sum) {
                        //如果入度为0的话就放入排序的数组
                        array_push($sorted, $index);
                    }
                }
            }
        }

        return $sorted;
    }

    public static function floydWarshall(array $graph): array
    {
        $dist = [];
        $dist = $graph;
        $size = count($dist);

        for ($k = 0; $k < $size; $k++) {
            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j < $size; $j++) {
                    $dist[$i][$j] = min($dist[$i][$j], $dist[$i][$k] + $dist[$k][$j]);
                }
            }
        }

        return $dist;
    }

    public static function Dijkstra(array $graph, string $source, string $target)
    {
        $dist = [];
        $prev = [];
        
        $queue = new \SplPriorityQueue();

        foreach ($graph as $vertex => $weight) {
            $dist[$vertex] = PHP_INT_MAX;
            $prev[$vertex] = null;
            $queue->insert($vertex, min($weight));
        }

        $dist[$source] = 0;
        
        while (!$queue->isEmpty()) {
            $current = $queue->extract();

            if (!empty($graph[$current])) {
                foreach($graph[$current] as $vertex => $weight) {
                    //如果源点到$vertx的距离大于到源点到$current的距离再加上从$current到$vertex的距离
                    if ($dist[$current] + $weight < $dist[$vertex]) {
                        //修正源点到$vertex的最短距离
                        $dist[$vertex] = $dist[$current] + $weight;
                        //设置最短距离中的上一个节点
                        $prev[$vertex] = $current;
                    }
                }
            }
        }

        $stack = new \SplStack();
        $distance = 0;

        while(isset($prev[$target]) && $prev[$target]) {
            $stack->push($target);
            $distance += $graph[$target][$prev[$target]];
            $target = $prev[$target];
        }

        if ($stack->isEmpty()) {
            return ["distance" => 0, "path" => $stack];
        } else {
            $stack->push($source);
            return ["distance" => $distance, "path" => $stack];
        }
    }
}


<?php
namespace Test\DataStructure;

use PHPUnit\Framework\TestCase;
use DataStructure\Graph\Graph;

class GraphTest extends TestCase
{
    public function testBFS()
    {
        $graph = [];
        $vertexCount = 6;

        for ($i = 0; $i <= $vertexCount; $i++) {
            $graph[$i] = array_fill(1, $vertexCount, 0);
            $visited[$i] = 0;
        }

        $graph[1][2] = $graph[2][1] = 1;
        $graph[1][5] = $graph[5][1] = 1;
        $graph[5][2] = $graph[2][5] = 1;
        $graph[5][4] = $graph[4][5] = 1;
        $graph[3][2] = $graph[2][3] = 1;
        $graph[4][3] = $graph[4][3] = 1;
        $graph[6][4] = $graph[4][6] = 1;

        $path = Graph::BFS($graph, 1, $visited);

        $ret = [];

        while (!$path->isEmpty()) {
            $vertex = $path->dequeue();
            $ret[] = $vertex;
        }

        $this->assertEquals([1, 2, 5, 3, 4, 6], $ret);
    }

    public function testDFS()
    {
        $graph = [];
        $vertexCount = 6;

        for ($i = 0; $i <= $vertexCount; $i++) {
            $graph[$i] = array_fill(1, $vertexCount, 0);
            $visited[$i] = 0;
        }

        $graph[1][2] = $graph[2][1] = 1;
        $graph[1][5] = $graph[5][1] = 1;
        $graph[5][2] = $graph[2][5] = 1;
        $graph[5][4] = $graph[4][5] = 1;
        $graph[3][2] = $graph[2][3] = 1;
        $graph[4][3] = $graph[4][3] = 1;
        $graph[6][4] = $graph[4][6] = 1;

        $path = Graph::DFS($graph, 1, $visited);

        $ret = [];

        while (!$path->isEmpty()) {
            $vertex = $path->dequeue();
            $ret[] = $vertex;
        }

        $this->assertEquals([1, 5, 4, 6, 3, 2], $ret);
    }

    public function testTopologicalSort()
    {
        $graph = [
            [0, 0, 0, 0, 1],
            [1, 0, 0, 1, 0],
            [0, 1, 0, 1, 0],
            [0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0],
        ];
       
        $sorted = Graph::topologicalSort($graph);

        $ret = [];

        while (!$sorted->isEmpty()) {
            $vertex = $sorted->dequeue();
            $ret[] = $vertex;
        }

        $this->assertEquals([2, 1, 0, 3, 4], $ret);


    }

    public function testFW()
    {
        $totalVertices = 5;
        $graph = [];
        for ($i = 0; $i < $totalVertices; $i++) {
            for ($j = 0; $j < $totalVertices; $j++) {
                $graph[$i][$j] = $i == $j ? 0 : PHP_INT_MAX;
            }
        }

        $graph[0][1] = $graph[1][0] = 10;
        $graph[2][1] = $graph[1][2] = 5;
        $graph[0][3] = $graph[3][0] = 5;
        $graph[3][1] = $graph[1][3] = 5;
        $graph[4][1] = $graph[1][4] = 10;
        $graph[3][4] = $graph[4][3] = 20;

        $distance = Graph::FW($graph);

        $this->assertEquals(20, $distance[0][4]);
        $this->assertEquals(10, $distance[3][2]);
    }
}
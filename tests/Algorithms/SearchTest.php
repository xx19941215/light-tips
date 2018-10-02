<?php
namespace Test\Algorithms;

use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    public function testLinearSearch()
    {
        $arr = range(1, 200, 5);

        $found = linearSearch($arr, 6);

        $this->assertTrue($found);
    }

    public function testBinarySearch()
    {
        $arr = range(1, 200, 5);

        $found = binarySearch($arr, 7);

        $this->assertFalse($found);
    }

    public function testBinarySearchRecursion()
    {
        $arr = [1,1,1,2,3,4,5,5,5,5,5,6,7,8,9,10];

        $index = binarySearchRecursion($arr, 6, 0, count($arr) - 1);

        $this->assertEquals(11, $index);
    }

    public function testRepetitiveBinarySearch()
    {
        $arr = [1,1,1,2,3,4,5,5,5,5,5,6,7,8,9,10];

        $firstIndex = repetitiveBinarySearch($arr, 6);

        $this->assertEquals(11, $firstIndex);
    }

    public function testInterpolationSearch()
    {
        $arr = [1,1,1,2,3,4,5,5,5,5,5,6,7,8,9,10];

        $index = interpolationSearch($arr, 6);

        $this->assertEquals(11, $index);
    }

    public function testExponentialSearch()
    {
        $arr = [1,1,1,2,3,4,5,5,5,5,5,6,7,8,9,10];

        $index = exponentialSearch($arr, 6);

        $this->assertEquals(11, $index);
    }

    public function testHashSearch()
    {
        $arr = [1,1,1,2,3,4,5,5,5,5,5,6,7,8,9,10];

        $flag = hashSearch($arr, 6);

        $this->assertEquals(true, $flag);
    }

    public function testBFS()
    {
        $root = new \TreeNode("8");

        $tree = new \Tree($root);

        $node1 = new \TreeNode("3");
        $node2 = new \TreeNode("10");
        $root->addChildren($node1);
        $root->addChildren($node2);

        $node3 = new \TreeNode("1");
        $node4 = new \TreeNode("6");
        $node5 = new \TreeNode("14");
        $node1->addChildren($node3);
        $node1->addChildren($node4);
        $node2->addChildren($node5);

        $node6 = new \TreeNode("4");
        $node7 = new \TreeNode("7");
        $node8 = new \TreeNode("13");
        $node4->addChildren($node6);
        $node4->addChildren($node7);
        $node5->addChildren($node8);


        $visited = $tree->BFS($tree->root);

        $actual = [];

        while (!$visited->isEmpty()) {
            $actual[] = $visited->dequeue()->data;
        }

        $this->assertEquals(["8", "3", "10", "1", "6", "14", "4", "7", "13"], $actual);
    }

    public function testDFS()
    {
        $root = new \TreeNode("8");

        $tree = new \DFSTree($root);

        $node1 = new \TreeNode("3");
        $node2 = new \TreeNode("10");
        $root->addChildren($node1);
        $root->addChildren($node2);

        $node3 = new \TreeNode("1");
        $node4 = new \TreeNode("6");
        $node5 = new \TreeNode("14");
        $node1->addChildren($node3);
        $node1->addChildren($node4);
        $node2->addChildren($node5);

        $node6 = new \TreeNode("4");
        $node7 = new \TreeNode("7");
        $node8 = new \TreeNode("13");
        $node4->addChildren($node6);
        $node4->addChildren($node7);
        $node5->addChildren($node8);


        $visited = $tree->DFS($tree->root);

        $actual = [];

        while (!$visited->isEmpty()) {
            $actual[] = $visited->dequeue()->data;
        }

        $this->assertEquals(["8", "3", "1", "6", "4", "7", "10", "14", "13"], $actual);
    }
}
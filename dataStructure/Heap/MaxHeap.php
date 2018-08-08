<?php
namespace DataStructure\Heap;

class MaxHeap
{
    public $heap;
    public $count;

    public function __construct(int $size)
    {
        $this->heap = array_fill(0, $size, 0);
        $this->count = 0;
    }

    public function create(array $arr = [])
    {
        array_map(function($item){
            $this->insert($item);
        }, $arr);
    }

    public function insert(int $data)
    {
        if ($this->count == 0) {
            $this->heap[0] = $data;
            $this->count = 1;
        } else {
            $this->heap[$this->count++] = $data;
            $this->siftUp();
        }
    }

    public function display()
    {
		return implode(" ", array_slice($this->heap, 0));
    }

    public function siftUp()
    {
        $tempPos = $this->count - 1;    
        $parentPos = intval($tempPos / 2);

        while ($tempPos > 0 && $this->heap[$parentPos] < $this->heap[$tempPos]) {
            $this->swap($parentPos, $tempPos);
            $tempPos = $parentPos;
            $parentPos = intval($tempPos / 2);
        }
    }

    public function swap(int $a, int $b)
    {
        $temp = $this->heap[$a];
        $this->heap[$a] = $this->heap[$b];
        $this->heap[$b] = $temp;
    }

    public function extractMax()
    {
        $max = $this->heap[0];
        $this->heap[0] = $this->heap[$this->count - 1];
        $this->heap[--$this->count] = 0;
        $this->siftDown(0);

        return $max;
    }

    public function siftDown(int $k)
    {
        $largest = $k;
        $left = 2 * $k + 1;
        $right = 2 * $k + 2;

        if ($left < $this->count && $this->heap[$largest] < $this->heap[$left]) {
            $largest = $left;
        }

        if ($right < $this->count && $this->heap[$largest] < $this->heap[$right]) {
            $largest = $right;
        }

        if ($largest != $k) {
            $this->swap($largest, $k);
            $this->siftDown($largest);
        }
    }
}
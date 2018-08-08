<?php
namespace DataStructure\Heap;

class MinHeap
{
    public $heap;
    public $count;

    public function __construct(int $size)
    {
        $this->heap = array_fill(0, $size + 1, 0);
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
            $this->heap[1] = $data;
            $this->count = 2;
        } else {
            $this->heap[$this->count++] = $data;
            $this->siftUp();
        }
    }

    public function display()
    {
		return implode(" ", array_slice($this->heap, 1));
    }

    public function siftUp()
    {
        $tempPos = $this->count - 1;    
        $parentPos = intval($tempPos / 2);

        while ($tempPos > 0 && $this->heap[$parentPos] > $this->heap[$tempPos]) {
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

    public function extractMin()
    {
        $min = $this->heap[1];
        $this->heap[1] = $this->heap[$this->count - 1];
        $this->heap[--$this->count] = 0;
        $this->siftDown(1);

        return $min;
    }

    public function siftDown(int $k)
    {
        $smallest = $k;
        $left = 2 * $k;
        $right = 2 * $k + 1;

        if ($left < $this->count && $this->heap[$smallest] > $this->heap[$left]) {
            $smallest = $left;
        }

        if ($right < $this->count && $this->heap[$smallest] > $this->heap[$right]) {
            $smallest = $right;
        }

        if ($smallest != $k) {
            $this->swap($smallest, $k);
            $this->siftDown($smallest);
        }
    }
}
<?php
namespace DataStructure\Heap;

class PriorityQueue extends MaxHeap
{
    public function __construct(int $size)
	{
		parent::__construct($size);
	}

	public function enqueue(int $val)
	{
		parent::insert($val);
	}

	public function dequeue()
	{
		return parent::extractMax();
	}
}
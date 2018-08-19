<?php
namespace DataStructure\Heap;

class MaxHeap
{
    public $heap;
    public $count;

    public function __construct(int $size)
    {
        //初始化堆
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
        //插入数据操作
        if ($this->count == 0) {
            //插入第一条数据
            $this->heap[0] = $data;
            $this->count = 1;
        } else {
            //新插入的数据放到堆的最后面
            $this->heap[$this->count++] = $data;
            //上浮到合适位置
            $this->siftUp();
        }
    }

    public function display()
    {
		return implode(" ", array_slice($this->heap, 0));
    }

    public function siftUp()
    {
        //待上浮元素的临时位置
        $tempPos = $this->count - 1;    
        //根据完全二叉树性质找到副节点的位置
        $parentPos = intval($tempPos / 2);

        while ($tempPos > 0 && $this->heap[$parentPos] < $this->heap[$tempPos]) {
            //当不是根节点并且副节点的值小于临时节点的值，就交换两个节点的值
            $this->swap($parentPos, $tempPos);
            //重置上浮元素的位置
            $tempPos = $parentPos;
            //重置父节点的位置
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
        //最大值就是大跟堆的第一个值
        $max = $this->heap[0];
        //把堆的最后一个元素作为临时的根节点
        $this->heap[0] = $this->heap[$this->count - 1];
        //把最后一个节点重置为0
        $this->heap[--$this->count] = 0;
        //下沉根节点到合适的位置
        $this->siftDown(0);

        return $max;
    }

    public function siftDown(int $k)
    {
        //最大值的位置
        $largest = $k;
        //左孩子的位置
        $left = 2 * $k + 1;
        //右孩子的位置
        $right = 2 * $k + 2;


        if ($left < $this->count && $this->heap[$largest] < $this->heap[$left]) {
            //如果左孩子大于最大值，重置最大值的位置为左孩子
            $largest = $left;
        }

        if ($right < $this->count && $this->heap[$largest] < $this->heap[$right]) {
            //如果右孩子大于最大值，重置最大值的位置为左孩子
            $largest = $right;
        }


        //如果最大值的位置发生改变
        if ($largest != $k) {
            //交换位置
            $this->swap($largest, $k);
            //继续下沉直到初始位置不发生改变
            $this->siftDown($largest);
        }
    }
}
<?php
namespace DataStructure\Spl;

class SplPriorityQueue extends \SplPriorityQueue
{
    public function compare($priority1, $priority2)
    {
        return $priority1 <=> $priority2;
    }
}
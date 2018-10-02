<?php

class DFSTree
{
    public $root = null;

    public function __construct(TreeNode $treeNode)
    {
        $this->root = $treeNode;
        $this->visited = new SplQueue();
    }

    public function DFSRecursion(TreeNode $node): SplQueue
    {
        $this->visited->enqueue($node);

        if ($node->children) {
            foreach ($node->children as $child) {
                $this->DFS($child);
            }
        }

        return $this->visited;
    }

    public function DFS(TreeNode $node): SplQueue
    {
        $stack = new SplStack();
        $visited = new SplQueue();

        $stack->push($node);

        while (!$stack->isEmpty()) {
            $current = $stack->pop();
            $visited->enqueue($current);

            $current->children = array_reverse($current->children);
            foreach ($current->children as $child) {
                $stack->push($child);
            }
        }

        return $visited;
    }

}
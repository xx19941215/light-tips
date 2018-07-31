<?php
namespace DataStructure\Tree;

class BSTNode
{
    public $data;
    public $left;
    public $right;
    public $parent;

    public function __construct(int $data = null, BSTNode $node = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
        $this->parent = $node;
    }

    public function min()
    {
        $node = $this;

        while ($node->left) {
            $node = $node->left;
        }

        return $node;
    }

    public function max()
    {
        $node = $this;

        while ($node->right) {
            $node = $node->right;
        }

        return $node;
    }

    public function successor()
    {
        $node = $this;

        if ($node->right) {
            return $node->right->min();
        }

        return null;

    }

    public function predecessor()
    {
        $node = $this;

        if ($node->left) {
            return $node->left->max();
        }

        return null;
    }

    public function delete()
    {
        $node = $this;

        if (!$node->left && !$node->right) {
            if ($node->parent->left === $node) {
                $node->parent->left = null;
            } else {
                $node->parent->right = null;
            }
        } elseif ($node->left && $node->right) {
            $successor = $node->successor();
            $node->data = $successor->data;
            $successor->delete();
        } elseif ($node->left) {
            if ($node->parent->left === $node) {
                $node->parent->left = $node->left;
                $node->left->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->left;
                $node->left->parent = $node->parent->right;
            }

            $node->left = null;
        } elseif ($node->right) {
            if ($node->parent->left === $node) {
                $node->parent->left = $node->right;
                $node->right->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->right;
                $node->right->parent = $node->parent->right;
            }

            $node->right = null;
        }
    }

    public function traversePreOrder()
    {
        $traverse = [];
        array_push($traverse, $this->data);

        if ($node = $this->left) {
            $traverse = array_merge($traverse, $node->traversePreOrder());
        }

        if ($node = $this->right) {
            $traverse = array_merge($traverse, $node->traversePreOrder());
        }

        return $traverse;
    }

    public function traversePostOrder()
    {
        $traverse = [];
        if ($node = $this->left) {
            $traverse = array_merge($traverse, $node->traversePostOrder());
        }


        if ($node = $this->right) {
            $traverse = array_merge($traverse, $node->traversePostOrder());
        }

        array_push($traverse, $this->data);

        return $traverse;
    }


    public function traverseInOrder()
    {
        $traverse = [];

        if ($node = $this->left) {
            $traverse = array_merge($traverse, $node->traverseInOrder());
        }

        array_push($traverse, $this->data);

        if ($node = $this->right) {
            $traverse = array_merge($traverse, $node->traverseInOrder());
        }

        return $traverse;
    }

    /**
     * 前序非递归遍历
     */
    public function traversePreOrderNotRecursive()
    {
        $traverse = [];

        $stack = new \SplStack();

        $currentNode = $this;

        while ($currentNode || !$stack->isEmpty()) {
            while($currentNode) {
                $stack->push($currentNode);
                array_push($traverse, $currentNode->data);
                $currentNode = $currentNode->left;
            }
            
            $currentNode = $stack->pop();
            $currentNode = $currentNode->right;
            //另一种写法
            // if ($currentNode) {
            //     $stack->push($currentNode);
            //     array_push($traverse, $currentNode->data);
            //     $currentNode = $currentNode->left;
            // } else {
            //     $currentNode = $stack->pop();
            //     $currentNode = $currentNode->right;
            // }
        }

        return $traverse;
    }

    /**
     * 中序非递归遍历
     */
    public function traverseInOrderNotRecursive()
    {
        $traverse = [];

        $stack = new \SplStack();

        $currentNode = $this;

        while ($currentNode || !$stack->isEmpty()) {
            while ($currentNode) {
                $stack->push($currentNode);
                $currentNode = $currentNode->left;
            }
            
            $currentNode = $stack->pop();
            array_push($traverse, $currentNode->data);
            $currentNode = $currentNode->right;
            //另一种写法
            // if ($currentNode) {
            //     $stack->push($currentNode);
            //     $currentNode = $currentNode->left;
            // } else {
            //     $currentNode = $stack->pop();
            //     array_push($traverse, $currentNode->data);
            //     $currentNode = $currentNode->right;
            // }
        }

        return $traverse;
    }

    /**
     * 后序非递归遍历
     * 要保证根结点在左孩子和右孩子访问之后才能访问，因此对于任一结点P，先将其入栈。
     * 如果P不存在左孩子和右孩子，则可以直接访问它；
     * 或者P存在左孩子或者右孩子，但是其左孩子和右孩子都已被访问过了，则同样可以直接访问该结点。
     * 若非上述两种情况，则将P的右孩子和左孩子依次入栈，这样就保证了每次取栈顶元素的时候，
     * 左孩子在右孩子前面被访问，左孩子和右孩子都在根结点前面被访问。
     */
    public function traversePostOrderNotRecursive()
    {
        $traverse = [];

        $stack = new \SplStack();

        $currentNode = null;

        $prev = null;

        $stack->push($this);

        while (!$stack->isEmpty()) {
            $currentNode = $stack->top();
            if (($currentNode->left === null
                && $currentNode->right === null) || ($prev != null && ($prev === $currentNode->left || $prev === $currentNode->right))) {
                array_push($traverse, $currentNode->data);
                $prev = $currentNode;
                $stack->pop();
            } else {
                if ($currentNode->right != null) {
                    $stack->push($currentNode->right);
                }

                if ($currentNode->left != null) {
                    $stack->push($currentNode->left);
                }
            }
        }

        return $traverse;
    }

}
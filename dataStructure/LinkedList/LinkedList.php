<?php 
namespace DataStructure\LinkedList;
/**
 * Class LinkedList
 * @package DataStructure\LinkedList
 * |------------------------------------
 * | |----|----|    |----|----|    |----|
 * | | 12 |    ---> | 24 |    ---> |    |
 * | |----|----|    |----|----|    |----|
 * |------------------------------------
 */
class LinkedList implements \Iterator
{
    private $head = null;
    private $length = 0;
    private $currentNode;
    private $currentPosition;

    /**
     * 插入一个节点
     * @param string|null $data
     * @return bool
     * complexity O(n)
     */
    public function insert(string $data = null)
    {
        $newNode = new ListNode($data);

        if ($this->head === null) {
            $this->head = &$newNode;
        } else {
            $currentNode = $this->head;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }

            $currentNode->next = $newNode;
        }

        $this->length++;
        return true;
    }

    /**
     * 在特定节点前插入
     * @param string $data
     * @param string $query
     * complexity O(n)
     */
    public function insertBefore(string $data, string $query)
    {
        $newNode = new ListNode($data);

        if ($this->head) {
            $previous = null;
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    if (empty($previous)) {
                        $newNode->next = $currentNode;
                        $this->head = $newNode;
                    } else {
                        $previous->next = $newNode;
                    }
                    $this->length++;
                    break;
                }

                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    /**
     * 在特定节点后插入
     * @param string|null $data
     * @param string|null $query
     * complexity O(n)
     */
    public function insertAfter(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);

        if ($this->head) {
            $nextNode = null;
            $currentNode = $this->head;

            while ($currentNode !== null) {
                if ($currentNode->data === $query) {

                    if ($nextNode !== null) {
                        $newNode->next = $nextNode;
                        $currentNode->next = $newNode;
                        $this->length++;
                        break;
                    } else {
                        $currentNode->next = $newNode;
                        $currentNode->next = $newNode;
                        $this->length++;
                        break;
                    }

                }

                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
    }

    /**
     * 在最前方插入节点
     * @param string $data
     * complexity O(1)
     */
    public function insertAtFirst(string $data)
    {
        $newNode = new ListNode($data);

        if ($this->head === null) {
            $this->head = &$newNode;
        } else {
            $currentFirstNode = $this->head;
            $newNode->next = $currentFirstNode;
            $this->head = &$newNode;
        }

        $this->length++;
    }

    /**
     * 搜索一个节点
     * @param string $data
     * @return bool|ListNode
     * complexity O(n)
     */
    public function search(string $data)
    {
        if ($this->length > 0) {
            $currentNode = $this->head;
            while ($currentNode !== null) {
                if ($currentNode->data === $data) {
                    return $currentNode;
                }

                $currentNode = $currentNode->next;
            }
        }

        return false;
    }

    /**
     * 删除最前面的节点
     * @return bool
     * complexity O(1)
     */
    public function deleteFirst()
    {
        if ($this->head !== null) {
            if ($this->head->next !== null) {
                $this->head = $this->head->next;
            } else {
                $this->head = null;
            }

            $this->length--;

            return true;
        }

        return false;
    }

    /**
     * 删除最后面的节点
     * @return bool
     * complexity O(1)
     */
    public function deleteLast()
    {
        if ($this->head !== null) {
            $currentNode = $this->head;

            if ($currentNode->next !== null) {
                $previousNode = null;
                while ($currentNode->next !== null) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }

                $previousNode->next = null;
            } else {
                $this->head = null;
            }

            $this->length--;
            return true;
        }

        return false;
    }

    /**
     * 删除特定节点
     * @param string $query
     * @return bool
     * complexity O(n)
     */
    public function delete(string $query)
    {
        if ($this->head !== null) {
            $currentNode = $this->head;
            $previous = null;
            while ($currentNode !== null) {

                if ($currentNode->data === $query) {
                    if ($currentNode->next === null) {
                        $previous->next = null;
                    } else {
                        $previous->next = $currentNode->next;
                    }

                    $this->length--;
                    return true;
                }

                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }

        }

        return false;
    }

    /**
     *反转链表
     * complexity O(n)
     */
    public function reverse()
    {
        if ($this->head !== null) {
            if ($this->head->next !== null) {
                $reveredList = null;
                $next = null;
                $currentNode = $this->head;

                while ($currentNode !== null) {
                    $next = $currentNode->next;
                    $currentNode->next = $reveredList;
                    $reveredList = $currentNode;
                    $currentNode = $next;
                }

                $this->head = $reveredList;
            }
        }

    }

    /**
     * 返回特定位置的节点
     * @param int $n
     * @return null
     * complexity O(n)
     */
    public function getNthNode(int $n = 0)
    {
        $count = 0;
        if ($this->head !== null && $n <= $this->length) {
            $currentNode = $this->head;

            while ($currentNode !== null) {
                if ($count === $n) {
                    return $currentNode;
                }

                $count++;
                $currentNode = $currentNode->next;
            }

        }
    }

    public function current()
    {
        return $this->currentNode->data;
    }

    public function next()
    {
        $this->currentPosition++;
        $this->currentNode = $this->currentNode->next;
    }

    public function rewind()
    {
        $this->currentPosition = 0;
        $this->currentNode = $this->head;
    }

    public function key()
    {
        return $this->currentPosition;
    }

    public function valid()
    {
        return $this->currentNode !== NULL;
    }

    public function display()
    {
        echo 'LinkList length: ' . $this->length . PHP_EOL;
        $currentNode = $this->head;

        while ($currentNode !== null) {
            echo $currentNode->data . PHP_EOL;
            $currentNode = $currentNode->next;
        }
    }
}
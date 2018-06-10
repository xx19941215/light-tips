<?php

namespace DataStructure\DoubleLinkedList;

/**
 * Class DoubleLinkedList
 * @package DataStructure\DoubledLinkedList
 * |-----------------------------------------------------
 * ||----| |----|----|----|   |---- |----|----|    |----|
 * ||    |<--   | 12 |   --><--     | 24 |    ---> |    |
 * ||----| |----|----|----|   |---- |----|----|    |----|
 * |-----------------------------------------------------
 */
class DoubleLinkedList
{
    private $head = null;
    private $last = null;
    private $length = 0;

    /**
     * @param string|null $data
     * @return bool
     */
    public function insertAtFirst(string $data = null)
    {
        $newNode = new ListNode($data);

        if ($this->head === null) {
            $this->head = &$newNode;
            $this->last = $newNode;
        } else {
            $currentFirstNode = $this->head;
            $currentFirstNode->prev = $newNode;
            $newNode->next = $currentFirstNode;
            $this->head = &$newNode;
        }

        $this->length++;
        return true;
    }

    /**
     * @param string|null $data
     * @return bool
     */
    public function insertAtLast(string $data = null)
    {
        $newNode = new ListNode($data);

        if ($this->head !== null) {
            $currentNode = $this->last;
            $this->last = $newNode;
            $currentNode->next = $newNode;
            $newNode->prev = $currentNode;
        } else {
            $this->head = &$newNode;
            $this->last = $newNode;
        }

        $this->length++;
        return true;
    }

    /**
     * @param string|null $data
     * @param string|null $query
     */
    public function insertBefore(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);

        if ($this->head) {
            $currentNode = $this->head;
            $prevNode = $this->head->prev;

            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($prevNode) {
                        $currentNode->prev = $newNode;
                        $newNode->next = $currentNode;
                        $newNode->prev = $prevNode;
                    } else {
                        $currentNode->prev = $newNode;
                        $newNode->next = $currentNode;
                        $this->head = $newNode;
                    }

                    $this->length++;
                    break;

                }

                $prevNode = $currentNode->prev;
                $currentNode = $currentNode->next;
            }

        }

    }

    /**
     * @param string|null $data
     * @param string|null $query
     */
    public function insertAfter(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);

        if ($this->head) {
            $currentNode = $this->head;
            while ($currentNode) {
                if ($currentNode->data === $query) {
                    if ($nextNode = $currentNode->next) {
                        $currentNode->next = $newNode;
                        $newNode->prev = $currentNode;
                        $nextNode->prev = $newNode;
                        $newNode->next = $nextNode;
                    } else {
                        $currentNode->next = $newNode;
                        $newNode->prev = $currentNode;
                    }

                    $this->length++;
                    break;
                }

                $currentNode = $currentNode->next;
            }
        }
    }

    /**
     * @return bool
     */
    public function deleteFirst()
    {
        if ($this->head) {
            $currentNode = $this->head;
            $nextNode = $currentNode->next;

            if ($nextNode) {
                $nextNode->prev = null;
                $this->head = $nextNode;
            } else {
                $this->head = null;
            }

            unset($currentNode);
            $this->length--;
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function deleteLast()
    {
        if ($this->head) {
            $currentNode = $this->head;

            while ($currentNode->next) {
                $currentNode = $currentNode->next;
                $prevNode = $currentNode->prev;
            }

            $this->last = $prevNode;
            unset($currentNode);
            $this->length--;
            return true;
        }

        return false;
    }

    /**
     * @param string|null $query
     * @return bool
     */
    public function delete(string $query = null)
    {
        if ($this->head) {
            $currentNode = $this->head;

            while ($currentNode) {
                $prevNode = $currentNode->prev;
                if ($currentNode->data === $query) {
                    if ($nextNode = $currentNode->next) {
                        if ($prevNode) {
                            $prevNode->next = $nextNode;
                            $nextNode->prev = $prevNode;
                            unset($currentNode);
                        } else {
                            $this->head = $nextNode;
                        }
                    } else {
                        if ($prevNode) {
                            $this->last = $prevNode;
                            unset($currentNode);
                        } else {
                            return false;
                        }
                    }

                    $this->length--;
                    return true;
                }

                $currentNode = $currentNode->next;
            }
        }


        return false;
    }

    /**
     * @param string|null $data
     * @return bool
     */
    public function insert(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->head) {
            $currentNode = $this->head;
            while ($currentNode) {
                if ($currentNode->next === null) {
                    $currentNode->next = $newNode;
                    $newNode->prev = $currentNode;
                    $this->last = $newNode;
                    $this->length++;
                    return true;
                }

                $currentNode = $currentNode->next;
            }
        } else {
            $this->head = &$newNode;
            $this->last = $newNode;
            $this->length++;
            return true;
        }

    }

    /**
     * 反转双链表
     */
    public function reverse()
    {

        if ($this->head !== null) {

            if ($this->head->next !== null) {
                $reversedList = null;
                $currentNode = $this->head;

                while ($currentNode !== null) {
                    $next = $currentNode->next;
                    $currentNode->next = $reversedList;
                    $currentNode->prev = $next;

                    $reversedList = $currentNode;
                    $currentNode = $next;

                }

                $this->last = $this->head;
                $this->head = $reversedList;
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

}
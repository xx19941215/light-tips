<?php

namespace DataStructure\Queue;

class LinkedList implements \Iterator
{
    private $head = null;
    private $length = 0;
    private $currentNode = null;
    private $currentPosition = null;

    public function insert(string $data, int $priority)
    {
        $newNode = new ListNode($data, $priority);

        $currentNode = $this->head;
        $previousNode = null;

        if ($currentNode) {
            while ($currentNode) {
                if ($currentNode->priority < $priority) {
                    if ($previousNode === null) {
                        $newNode->next = $currentNode;
                        $this->head = &$newNode;
                    } else {
                        $previousNode->next = $newNode;
                        $newNode->next = $currentNode;
                    }

                    $this->length++;
                    return true;
                }


                $previousNode = $currentNode;
                $currentNode = $currentNode->next;
            }

            $previousNode->next = $newNode;

            $this->length++;
            return true;

        } else {
            $this->head = &$newNode;
            $this->length++;
            return true;
        }
    }

    public function deleteFirst()
    {
        $currentNode = $this->head;

        if ($currentNode) {
            if ($currentNode->next !== null) {
                $this->head = $currentNode->next;
            } else {
                $this->head = null;
            }

            $this->length--;
            return true;
        }

        return false;
    }

    public function getSize()
    {
        return $this->length;
    }

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

    public function valid()
    {
        return $this->currentNode !== null;
    }

    public function key()
    {
        return $this->currentPosition;
    }

    public function rewind()
    {
        $this->currentPosition = 0;
        $this->currentNode = $this->head;
    }

    public function next()
    {
        $this->currentPosition++;
        $this->currentNode = $this->currentNode->next;
    }

    public function current()
    {
        return $this->currentNode->data;
    }
}

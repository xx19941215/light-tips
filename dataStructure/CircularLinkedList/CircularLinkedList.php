<?php
namespace DataStructure\CircularLinkedList;

use DataStructure\LinkedList\ListNode;

class CircularLinkedList
{
    private $head = null;
    private $length = 0;

    public function insertAtEnd(string $data = null)
    {
        $newNode = new ListNode($data);

        if ($this->head) {
            $currentNode = $this->head;

            while ($currentNode->next !== $this->head) {
                $currentNode = $currentNode->next;
            }

            $currentNode->next = $newNode;
        } else {
            $this->head = &$newNode;
        }

        $this->length++;
        $newNode->next = $this->head;
        return true;
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
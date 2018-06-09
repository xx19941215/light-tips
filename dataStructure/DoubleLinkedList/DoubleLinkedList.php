<?php
namespace DataStructure\DoubledLinkedList;

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

    public function insertBefore(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);

        if ($this->head) {
            $currentNode = $this->head;
            $prevNode = $this->head->prev;

            while ($currentNode->next !== null) {
                if ($currentNode->data === $query) {
                    $currentNode->prev = $newNode;
                    $newNode->next = $currentNode;
                    $newNode->prev = $prevNode;
                    $this->length++;
                    break;
                }

                $prevNode = $currentNode->prev;
                $currentNode = $currentNode->next;
            }

        }

    }

}
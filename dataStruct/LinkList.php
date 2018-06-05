<?php 
namespace DataStruct;

class ListNode
{
    private $data;
    private $next;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function __get($var)
    {
        return $this->$var;
    }

    public function __set($var, $val)
    {
        return $this->$var = $val;
    }
}

class LinkList
{
    private $head = null;
    private $length = 0;

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
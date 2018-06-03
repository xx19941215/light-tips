<?php 

class ListNode
{
    private $data;
    private $next;

    public function __construct(string $data)
    {
        $this->data = $data;
    }
}

class LinkList
{
    private $head = NULL;
    private $length = 0;

    public function insert(string $data = NULL)
    {
        $newNode = new ListNode($data);

        if ($this->head === NULL) {
            $this->head = &$newNode;
        } else {
            $currentNode = $this->head;
            while ($currentNode->next !== NULL) {
                $currentNode = $currentNode->next;
            }

            $currentNode->next = $newNode;
        }

        $this->length ++;
        return true;
    }

    public function insertBefore(string $data, string $query)
    {
        $newNode = new ListNode($data);

        if ($this->head) {
            $previous = NULL;
            $currentNode = $this->head;

            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    $this->length++;
                    break;
                }

                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function insertAfter(string $data = NULL, string $query = NULL)
    {
        $newNode = new ListNode($data);

        if ($this->head) {
            $nextNode = NULL;
            $currentNode = $this->head;

            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {

                    if ($nextNode !== NULL) {
                        $newNode->next = $nextNode;
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

        if ($this->head === NULL) {
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
            while ($currentNode !== NULL) {
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
        if ($this->head !== NULL) {
            if ($this->head->next !== NULL) {
                $this->head = $this->head->next;
            } else {
                $this->head = NULL;
            }

            $this->length --;

            return TRUE;
        }

        return FALSE;
    }

    public function deleteLast()
    {
        if ($this->head !== NULL) {
            $currentNode = $this->head;

            if ($currentNode->next !== NULL) {
                $previousNode = NULL;
                while ($currentNode->next !== NULL) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }

                $previousNode->next = NULL;
            } else {
                $this->head = NULL;
            }

            $this->length --;
            return TRUE;
        }

        return FALSE;
    }

    public function delete(string $query)
    {
        if ($this->head !== NULL) {
            $currentNode = $this->head;
            $previous = NULL;
            while ($currentNode !== NULL) {

                if ($currentNode->data === $query) {
                    if ($currentNode->next === NULL) {
                        $previous->next = NULL;
                    } else {
                        $previous->next = $currentNode->next;
                    }

                    $this->length--;
                    return TRUE;
                }

                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }

        }

        return FALSE;
    }

    public function reverse()
    {
        if ($this->head !== NULL) {
            if ($this->head->next !== NULL) {
                $reveredList = NULL;
                $next = NULL;
                $currentNode = $this->head;

                while ($currentNode !== NULL) {
                    $next = $currentNode->next;
                    $currentNode->next = $reveredList;
                    $reveredList = $currentNode;
                    $currentNode = $next;
                }

                $this->head->next = $reveredList;
            }
        }
    
    }

    public function getNthNode(int $n = 0)
    {
        $count = 0;
        if ($this->head !== NULL && $n <= $this->length) {
            $currentNode = $this->head;

            while ($currentNode !== NULL) {
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

        while ($currentNode !== NULL) {
            echo $currentNode->data . PHP_EOL;
            $currentNode = $currentNode->next;
        }
    }
}
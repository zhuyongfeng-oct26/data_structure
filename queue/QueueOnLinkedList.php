<?php
class Node{
    public $data = null;
    public $next = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class CircularQueueList{
    private $head = null;
    private $tail = null;
    private $length = 0;

    public function __construct($data)
    {
        $this->head = new Node($data);
        $this->tail = $this->head;
    }

    /*
     * 入队
     * */
    public function enqueue($item)
    {
        $newNode = new Node($item);
        $this->tail->next  = $newNode;
        $this->tail = $newNode;
        $this->length ++;
    }

    /*
     * 出队
     * */
    public function dequeue()
    {
        if($this->length == 0) return null;
        $node = $this->head->next;
        $this->head->next = $this->head->next->next;
        $this->length --;
        return $node;
    }

    /*
     * 打印队列(顺序：先进先出)
     * */
    public function display()
    {
        $current = $this->head;
        while($current->next != null) {
            echo  $current->next->data . '&nbsp;';
            $current = $current->next;
        }
        return;
    }



}

$obj = new CircularQueueList('header');
$obj->enqueue(1);
$obj->enqueue(2);
$obj->enqueue(3);
$obj->enqueue(4);
$obj->enqueue(5);
$obj->display();
<?php

class Node{
    public $data;
    public $next;
    public $previous;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
        $this->previous = null;
    }
}


class Stack{
    private $header = null;

    public function __construct($data)
    {
        $this->header = new Node($data);
    }

    /*
     * 入栈
     * */
    public function inPush($data)
    {
        $newNode = new Node($data);
        $current = $this->header;
        while($current->next != null) {
            $current = $current->next;
        }
        $current->next = $newNode;
        return true;
    }

    /*
     * 出栈
     * */
    public function outPush()
    {
        $current = $this->header;
        while($current->next->next != null) {
            $current = $current->next;
        }

        $obj = $current->next;
        $current->next = null;
        return $obj;

    }

    /*
     * 遍历栈
     * */
    public function display()
    {
        $current = $this->header;
        while($current->next) {
            echo $current->next->data . '&nbsp;';
            $current = $current->next;
        }
        return true;
    }

}
$obj = new Stack('header');
$obj->inPush(1);
$obj->inPush(2);
$obj->inPush(3);
$obj->inPush(4);
var_Dump($obj->outPush());
$obj->display();

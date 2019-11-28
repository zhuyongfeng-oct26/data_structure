<?php
class Node{
    public $data;
    public $previous = null;
    public $next = null;

    public function __construct($data)
    {
        $this->data = $data;
        $this->previous = null;
        $this->next = null;
    }

}

class CircularLinkedList{
    private $header = null;

    function __construct($data)
    {
        $this->header = new Node($data);
        $this->header->next = $this->header;
    }

    /*
     * 查找元素
     * */
    public function find($item)
    {
        $current = $this->header;
        while($current->data != $item) {
            $current = $current->next;
        }
        return $current;
    }

    /*
     * 查找链表中最后的元素
     * */
    public function findLast(){
        $current = $this->header;
        while($current->next != $this->header) {
            $current = $current->next;
        }
        return $current;
    }

    /*
     * 在指定节点后插入元素
     * */
    public function insert($item, $new_item)
    {
        $newNode = new Node($new_item);
        $current = $this->find($item);
        if($current->next != $this->header) {
            $newNode->next = $current->next;
            $current->next = $newNode;
        } else {
            $current->next = $newNode;
            $newNode->next = $this->header;
        }
        return true;
    }

    /*
    * 删除链表中的指定元素
    * */
    public function delete($item)
    {
        $current = $this->header;
        while($current->next != null && $current->next->data !=$item) {
            $current = $current->next;
        }

        if($current->next != $this->header) {
            $current->next = $current->next->next;
        } else {
            $current->next = $this->header;
        }

        return $current;
    }

    /*
     * 更新元素
     * */
    public function update($old, $item)
    {
        $current = $this->find($old);
        return $current->data = $item;
    }

    /*
     * 打印链表元素
     * */
    public function display()
    {
        $current = $this->header;
        while($current->next != $this->header) {
            echo $current->next->data . '&nbsp;';
            $current = $current->next;
        }
        return;
    }

}

$obj = new CircularLinkedList('header');
$obj->insert('header', 'first');
$obj->insert('first', 'second');
$obj->insert('second', 'third');
$obj->insert('third', 'fourth');
$obj->insert('fourth', 'fifth');
//var_Dump($obj->findLast());
//$obj->delete('fifth');
$obj->update('second', 'second1212');
$obj->display();

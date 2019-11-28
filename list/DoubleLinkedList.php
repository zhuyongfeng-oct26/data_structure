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

class DoubleLinkedList{
    private $header = null;

    function __construct($data)
    {
        $this->header = new Node($data);
    }


    /*
     * 查找元素
     * */
    public function find($item)
    {
        $current = $this->header;
        while($current && $current->data != $item){
            $current = $current->next;
        }
        return $current;
    }

    /*
     * 查找链表最后一个节点
     * */
    public function findLast()
    {
        $current = $this->header;
        while($current->next != null){
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
        if(!$current) return 'null';

        $newNode->next = $current->next;
        $newNode->previous = $current;
        $current->next = $newNode;
        return true;
    }

    /*
     * 删除指定节点
     * */
    public function delete($item)
    {
        $current = $this->find($item);
        if(!$current) return null;

        $previous = $current->previous;
        $previous->next = $current->next;
        $previous->next->previous = $previous;
        $current->next = null;
        $current->previous = null;
        return true;
    }

    /*
     * 更新指定节点的值
     * */
    public function update($old_item, $new_item)
    {
        $current = $this->find($old_item);
        if(!$current) return null;
        return $current->data = $new_item;
    }

    /*
     * 显示链表中的元素
     * */
    public function display()
    {
        $current = $this->header;
        while($current->next) {
            echo $current->next->data . '&nbsp;&nbsp;';
            $current = $current->next;
        }
    }

}

$obj = new DoubleLinkedList('header');
$obj->insert('header', 'first');
$obj->insert('first', 'second');
$obj->insert('second', 'third');
$obj->insert('third', 'fourth');
$obj->insert('fourth', 'fifth');
//$obj->delete('second');
//$obj->update('second', 'second1122');
//var_dump($obj->findLast());

$obj->display();
<?php
/**
 * Created by PhpStorm.
 * User: bamboo
 * Date: 2019-11-25
 * Time: 22:35
 */

class Node{
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class SingleLinkedList{
    private $header;

    public function __construct($data)
    {
        $this->header = new Node($data);
    }

    //查找节点
    public function find($item)
    {
        $current = $this->header;
        while($current && $current->data !=$item){
            $current = $current->next;
        }
        return $current;
    }

    //查找指定节点的前一个节点
    public function findBeforeNode($item)
    {
        $current = $this->header;
        while($current->next && $current->next->data !=$item){
            $current = $current->next;
        }
        return $current;
    }

    //（在节点后）插入新节点
    public function insert($item, $new_item)
    {
        $newNode = new Node($new_item);
        $current = $this->find($item);
        $newNode->next = $current->next;
        $current->next = $newNode;
        return $newNode;
    }

    // 显示链表中的元素
    public function display()
    {
        $current = $this->header;
        if($current->next == null) {
            echo "list is none";
            return;
        }
        while ($current->next != null) {
            echo $current->next->data . '  ';
            $current = $current->next;
        }
    }

    //更新节点
    public function update($old, $new_item)
    {
        $current = $this->header;
        if($current->next == null) {
            echo "list is none";
            return;
        }

        while($current->next ) {
            if($current->data == $old){
                break;
            }
            $current = $current->next;
        }
        return $current->data = $new_item;

    }

    //删除指定元素
    public function delete($item)
    {
        $before = $this->findBeforeNode($item);
        if($before) {
            $before->next = $before->next->next;
        }
    }

    //清空链表
    public function clear()
    {
        $this->header = null;
    }

}

$obj = new SingleLinkedList('header');
$obj->insert('header', 'first');
$obj->insert('first', 'second');
$obj->insert('second', 'third');
$obj->insert('third', 'fourth');
$obj->insert('fourth', 'fifth');
$obj->insert('fifth', 'sixth');
$obj->insert('sixth', 'seventh');

$obj->update('second', 'second222');

//$obj->clear();
//$obj->findBeforeNode('third')
//$obj->delete('third');
$obj->display();
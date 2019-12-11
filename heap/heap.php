<?php

/*
 * 数组实现堆(完全二叉树)
 * */
class Heap{

    public $heap = [];  //初始化一个数组，下标从1开始
    public $int = 0;   //堆中可存储元素个数
    public $count = 0;  //已存储元素个数

    public function __construct()
    {
        $this->heap[0] = 'head';
        $this->int = 10;
        $this->count = 0;
    }

    /*
     * 往堆中插入一个元素
     * */
    public function insert($data)
    {
        if($this->count >= $this->int ) {
            return false;
        }

        ++$this->count;
        $this->heap[$this->count] = $data;
        $i = $this->count;
        while(intval($i / 2) > 0 && $this->heap[$i] > $this->heap[intval($i / 2)]) {
            $temp = $this->heap[$i];
            $this->heap[$i] = $this->heap[intval($i / 2)];
            $this->heap[intval($i / 2)] = $temp;
            $i = intval($i / 2);

        }
        return true;
    }

    /*
     * 建堆
     * */
    public function buildHeap()
    {
        for($i = (intval($this->count / 2) - 1) + 1; $i >= 1; --$i) {
            if($i * 2 < $this->count) {
                if($this->heap[$i * 2] > $this->heap[$i]) {
                    $this->swap($this->heap[$i * 2], $this->heap[$i]);
                }
                if($this->heap[$i * 2 + 1] > $this->heap[$i]){
                    $this->swap($this->heap[$i * 2 + 1], $this->heap[$i]);
                }
            }

        }
        return true;
    }

    /*
     * 数据交换
     * */
    public function swap(&$a, &$b)
    {
        list($a, $b) = array( $b, $a );
    }

    /*
     * 排序
     * */
    public function sort()
    {
        $this->buildHeap();
        $k = $this->count;
        while($k > 1){
            $temp = $this->heap[$k];
            $this->heap[$k] = $this->heap[1];
            $this->heap[1] = $temp;
            --$k;
            $this->heapify($k, 1);
        }
    }






}

$arr = new heap();
/*
$arr->insert(1);
$arr->insert(4);
$arr->insert(2);
$arr->insert(5);
$arr->insert(7);
$arr->insert(6);
 * */
$arr->heap = ['head',5,6,4,1,2,8,9,3];
$arr->count = 8;

$arr->buildHeap();
var_Dump($arr->heap);
die();

$arr->sort();
var_Dump($arr->heap);
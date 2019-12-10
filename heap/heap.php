<?php

/*
 * 数组实现堆(完全二叉树)
 * */
class Heap{

    public $heap = [];  //初始化一个数组，下标从1开始
    public $int = 10;   //堆中可存储元素个数
    public $count = 0;  //已存储元素个数

    public function __construct()
    {
        $this->heap[0] = 'head';
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
        for($i = floor($this->count / 2); $i >= 1; $i--) {
            $this->heapify($this->count, $i);
        }
    }

    public function heapify($num, $i)
    {
        while(true){
            $maxpos = $i;
            if(floor(($i * 2)) < $num && $this->heap[floor(($i * 2))] >  $this->heap[$i]) {
                $maxpos = floor(($i * 2));
            }
            if(floor(($i * 2) + 1) < $num && $this->heap[floor(($i * 2) + 1)] >  $this->heap[floor(($i * 2))]) {
                $maxpos = floor(($i * 2) + 1);
            }
            if($maxpos == $i) break;
            $temp = $this->heap[$i];
            $this->heap[$i] = $this->heap[$maxpos];
            $this->heap[$maxpos] = $temp;
            $i = $maxpos;
        }
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
$arr->insert(1);
$arr->insert(4);
$arr->insert(2);
$arr->insert(5);
$arr->insert(7);
$arr->insert(6);
var_Dump($arr->heap);
die();

$arr->sort();
var_Dump($arr->heap);
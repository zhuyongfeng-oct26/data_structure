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
        while(($i / 2) > 0 && ) {

        }
    }





}
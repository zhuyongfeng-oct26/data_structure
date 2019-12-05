<?php
/*
 * 二叉树存储节点
 * */
class TreeNode
{
    /*
     * 节点数据
     * */
    public $data = null;

    /*
     * 左节点
     * */
    public $left = null;

    /*
     * 右节点
     * */
    public $right = null;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }


}
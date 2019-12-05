<?php

/*
 * 二叉查找树具体实现
 * */
class Tree
{

    /*
     * 树的根节点
     * */
    public $head = null;

    public function __construct($head_data = null)
    {
        if($head_data != null) {
            $this->head = new TreeNode($head_data);
        }
    }

    /*
     * 查找数据
     * */
    public function find($data)
    {
        if($this->head == null) return null;

        $current = $this->head;
        while($current->data != null) {
            if($current->data == $data) {
                return $current->data;
            } else if($current->data > $data){
                $current = $current->left;
            } else {
                $current = $current->right;
            }
        }
        return null;
    }

    /*
     * 插入操作
     * */
    public function insert($data)
    {
        if($this->head == null) {
            $this->head = new TreeNode($data);
            return null;
        }

        $current = $this->head;
        while($current != null) {
            if($data > $current->data) {
                if($current->right == null) {
                    $current->right = new TreeNode($data);
                    return true;
                }
                $current = $current->right;

            } else {
                if($current->left == null) {
                    $current->left = new TreeNode($data);
                    return true;
                }
                $current = $current->left;
            }
        }
    }

    /*
     * 先序遍历
     * */
    public function preOrder($node)
    {
        if($node == null) {
            return null;
        }

        echo $node->data . PHP_EOL . '->';
        $this->preOrder($node->left);
        $this->preOrder($node->right);
    }

    /*
    * 中序遍历
    * */
    public function inOrder($node)
    {
        if($node == null) {
            return null;
        }
        $this->inOrder($node->left);
        echo $node->data . PHP_EOL . '->';
        $this->inOrder($node->right);
    }

    /*
    * 后序遍历
    * */
    public function postOrder($node)
    {
        if($node == null) {
            return null;
        }
        $this->postOrder($node->left);
        $this->postOrder($node->right);
        echo $node->data . PHP_EOL . '->';
    }



}
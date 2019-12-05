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
     * 删除操作
     * */
    public function delete($data)
    {
        // 找到需要删除节点
        $node = $this->head;
        $pnode = null;
        while ($node != null) {
            if ($node->data == $data) {
                break;
            } elseif ($data > $node->data) {
                $pnode = $node;
                $node = $node->right;
            } else {
                $pnode = $node;
                $node = $node->left;
            }
        }
        if ($node == null) {
            return false;
        }
        // 要删除的节点有两个子节点
        // 查找右子树中最小节点
        if ($node->left != null && $node->right != null) {
            $minPP = $node;
            $minP = $node->right;
            while ($minP->left != null) {
                $minPP = $minP;
                $minP = $minP->left;
            }
            $node->data = $minP->data;
            $node = $minP;
            // 删除掉右子树中的最小节点
            $minPP->left = null;
        }

        if ($node->left != null) {
            $child = $node->left;
        } elseif ($node->right != null) {
            $child = $node->right;
        } else {
            $child = null;
        }

        if ($pnode == null) {
            // 删除的是根节点
            $node = $child;
        } elseif ($pnode->left == $node) {
            $pnode->left = $child;
        } else {
            $pnode->right = $child;
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
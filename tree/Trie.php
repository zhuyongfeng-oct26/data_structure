<?php
/*
 * Trie树 - 查找字符串
 * */

class TrieNode {
    public $data = null;    //查找键
    public $content = null;    //查找键对应的内容信息
    public $trie_node = [];

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class Trie {
    public $root = null;
    public function __construct()
    {
        $this->root = new TrieNode('/');
    }

    /*
     * 插入字符串
     * */
    public function insert($data)
    {
        $p = $this->root;
        for($i = 0; $i < strlen($data); $i++) {
            $index = ord($data{$i}) - ord('a');
            if(!isset($p->trie_node[$index])) {
                $new_data = new TrieNode($data{$i});
                $p->trie_node[$index] = $new_data;
            }
            $p = $p->trie_node[$index];
        }

        //在最后的字符中，保存内容信息
        $p->content = 'My name is ' . $data;

        return true;
    }

    /*
     * 查找字符串
     * */
    public function find($data)
    {
        $p = $this->root;
        for($i = 0; $i < strlen($data); $i++) {
            $index = ord($data{$i}) - ord('a');
            if(!isset($p->trie_node[$index])) {
                return false;
            }

            $p = $p->trie_node[$index];
        }
        return $p->content;
    }
}

$obj = new Trie();
$obj->insert('zoe');
$obj->insert('evelyn');
$obj->insert('georgia');
$obj->insert('geo');
$obj->insert('alexandrea');
var_Dump($obj->find('geo'));

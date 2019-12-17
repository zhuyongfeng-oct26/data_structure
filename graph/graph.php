<?php

class Node{
    public $val = null;
    public $arrNext = array();
    public function __construct($val = null)
    {
        $this->val = $val;
    }
}

class Graph{

    /*
     * 建立连通图
     * */
    public function generate(array $nodes)
    {
        $arrNodes = array_keys($nodes);
        $resNodes = array();

        foreach($arrNodes as $nodeVal) {
            $resNodes[$nodeVal] = new Node($nodeVal);
        }

        foreach($nodes as $key => $val) {
            foreach($val as $node) {
                if(isset($resNodes[$node]) && is_object($resNodes[$node])) {
                    $resNodes[$key]->arrNext[] = $resNodes[$node];
                }
            }
        }

        return current($resNodes);

    }

    /*
     * 广度优先搜索
     * */
    public function searchByWide(Node $node)
    {
        $resultWord = array();  //存放结果集
        $nodeStack = array();   //实现队列遍历
        $wordStack = array();   //存放已遍历的节点
        array_push($nodeStack, $node);

        while(!empty($nodeStack)) {
            $curNode = array_shift($nodeStack);
            array_push($resultWord, $curNode->val);
            array_push($wordStack, $curNode->val);
            $arrNext = $curNode->arrNext;
            for($i = 0; $i< count($arrNext); $i++) {
                $curChildNode = $arrNext[$i];
                if(!in_array($curChildNode->val, $resultWord) && !in_array($curChildNode->val, $wordStack)){
                    array_push($nodeStack, $curChildNode);
                    array_push($wordStack, $curChildNode->val); //标记该节点已经进栈
                }

            }


        }

        return $resultWord;
    }

    /*
     * 深度优先搜索
     * */
    public function searchByDeep(Node $node)
    {
        $resultWord = array();  //存放结果集
        $nodeStack = array();   //实现队列遍历
        $wordStack = array();   //存放已遍历的节点
        array_push($nodeStack, $node);
        array_push($wordStack, $node->val);

        while(!empty($nodeStack)){
            $curNode = array_pop($nodeStack);
            array_push($resultWord, $curNode->val);
            $arrNext = $curNode->arrNext;
            for($i = count($arrNext); $i>=0; $i--) {
                $curChildNode = $arrNext[$i];
                if(!in_array($curChildNode->val, $resultWord) && !in_array($curChildNode->val, $wordStack)){
                    array_push($nodeStack, $curChildNode);
                    array_push($wordStack, $curChildNode->val); //标记该节点已经进栈
                }
            }
        }

        return $resultWord;
    }



}

$graph = new Graph();

$arrNode = [
    'a' => ['b', 'f'],
    'b' => ['a', 'c', 'd'],
    'c' => ['b', 'd', 'e'],
    'd' => ['b', 'c'],
    'e' => ['c'],
    'f' => ['a', 'g', 'h'],
    'g' => ['f', 'h'],
    'h' => ['f', 'g'],
];

$graphTree = $graph->generate($arrNode);
$searchByWideRes = $graph->searchByWide($graphTree);
//var_dump($searchByWideRes);

$searchByDeepRes = $graph->searchByDeep($graphTree);
var_dump($searchByDeepRes);
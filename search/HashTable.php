<?php

class HashTable
{

    public $buckets;			//用于存储数据的数组
    private $size = 12;			//记录buckets 数组的大小
    public function __construct(){

        $this->buckets = new SplFixedArray($this->size);
        //SplFixedArray效率更高，也可以用一般的数组来代替
    }

    private function hashfunc($key){
        $strlen = strlen($key); 	//返回字符串的长度
        $hashval = 0;
        for($i = 0; $i<$strlen ; $i++){
            $hashval +=ord($key[$i]); //返回ASCII的值
        }
        return $hashval%12;    //    返回取余数后的值
    }


    public function insert($key,$value){

        $index = $this->hashfunc($key);
        if(isset($this->buckets[$index])){
            $newNode = new HashNode($key,$value,$this->buckets[$index]);
        }else{
            $newNode = new HashNode($key,$value,null);
        }
        $this->buckets[$index] = $newNode;

    }

    public function find($key){

        $index = $this->hashfunc($key);

        $current = $this->buckets[$index];
        while(isset($current)){    //遍历当前链表
            if($current->key==$key){    //比较当前结点关键字
                return $current->value;
            }
            $current = $current->nextNode;
        }
        return NULL;
    }
}

class HashNode{

    public $key;		//关键字
    public $value;		//数据
    public $nextNode;	//HASHNODE来存储信息
    public function __construct($key,$value,$nextNode = NULL){
        $this->key = $key;
        $this->value = $value;
        $this->nextNode = $nextNode;

    }

}

$nums = [2, 7, 11, 15];
$target = 9;
$ht = new HashTable();
foreach($nums as $key => $val) {
    $ht->insert($key, $val);
}

echo $ht->find(2);
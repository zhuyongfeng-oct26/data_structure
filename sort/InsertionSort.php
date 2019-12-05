<?php
/*
 * 插入排序
 * @param Array $data [1,5,6,4,7,8,9]
 * */
function insertSort($data)
{
    if(count($data) <= 1) return $data;

    $n = count($data);
    for($i = 1; $i < $n; $i++) {
        $value = $data[$i];
        $j = $i - 1;
        for(; $j >= 0 ; $j--) {
            if($data[$j] > $value) {
                $data[$j+1] = $data[$j];
            } else {
                break;
            }
        }
        $data[$j+1] = $value;
    }
    return $data;
}

// test
$data  = [1,5,6,4,2,7,3,9,8,10];
var_dump(insertSort($data));
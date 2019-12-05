<?php

/*
 * 冒泡算法
 * @param Array $data [1,5,6,4,7,8,9]
 * */
function bubbleSort($data)
{
    if(count($data) <= 1) return $data;

    $n = count($data);
    for($i = 0; $i < $n; $i++) {
        for($j = 0; $j < $n - $i - 1; $j++) {
            if($data[$j] > $data[$j+1]) {
                $temp = $data[$j];
                $data[$j] = $data[$j+1];
                $data[$j+1] = $temp;
            }
        }
    }
    return $data;
}

// test
$data  = [1,5,6,4,2,7,3,9,8,10];
var_dump(bubbleSort($data));
<?php
/*
 * 选择排序
 * @param Array $data [1,5,6,4,7,8,9]
 * */
function selectionSort($data)
{
    if(count($data) <= 1) return $data;

    $n = count($data);
    for($i = 0; $i < $n - 1; $i++) {
        $p = $i;
        for($j = $i + 1; $j < $n; $j++) {
            if($data[$p] > $data[$j]) {
                $p = $j;
            }
        }

        $temp = $data[$p];
        $data[$p] = $data[$i];
        $data[$i] = $temp;
    }
    return $data;
}

// test
$data  = [1,5,6,4,2,7,3,9,8,10];
var_dump(selectionSort($data));

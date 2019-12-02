<?php

/*
 * 二分查找算法(折半查找算法)
 * 非递归实现
 * @param Array $data = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17];
 * */
function bSearch($data, $value)
{
    if(count($data) <= 1) return $data;
    $n = count($data);
    $low = 0;
    $high = $n - 1;

    while ($low <= $high) {
        $mid = floor(($high + $low) / 2);

        if($data[$mid] == $value) {
            return $mid;
        } else if($data[$mid] > $value) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }
    return -1;
}
/*
$data = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17];
var_Dump(bSearch($data, 8));
*/

/*
 * 二分查找算法(折半查找算法)
 * 递归实现
 * @param Array $data = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17];
 * */
function bSearchByRec($data, $value)
{
    $n = count($data);
    return recursion($data, 0, $n - 1, $value);
}

function recursion($data, $low, $high, $value)
{
    if($low > $high) return -1;
    $mid = floor(($high + $low) / 2);
    if($data[$mid] == $value) {
        return $mid;
    } else if($data[$mid] > $value) {
        return recursion($data, $low, ($mid - 1), $value);
    } else {
        return recursion($data, ($mid + 1), $high, $value);
    }
}

$data = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17];
var_Dump(bSearchByRec($data, 8));


<?php

/*
 * 1.二分查找算法(折半查找算法) - 非递归实现
 * @param Array $data 有序不重复数组(升序)
 * @param Int $value 查找值
 * test:
 * $data = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17];
 * var_Dump(bSearch_1($data, 8));
 * */
function bSearch_1($data, $value)
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
 * 2.二分查找算法(折半查找算法) - 递归实现
 * @param Array $data 有序不重复数组(升序)
 * @param Int $value 查找值
 * test:
 * $data = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17];
 * var_Dump(bSearch_2($data, 8));
 * */
function bSearch_2($data, $value)
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

/*
 * 3.二分查找算法(折半查找算法) - 查找第一个值等于给定值的元素
 * @param Array $data 有序重复数组(升序)
 * @param Int $value 查找值
 * test:
 * $data = [0, 1, 2, 3, 4, 4, 4, 5, 6, 7, 8, 9, 10, 10, 10, 11, 12, 12, 12, 13, 14, 15, 16, 17];
 * var_Dump(bSearch_3($data, 10));
 * */
function bSearch_3($data, $value)
{
    if(count($data) <= 1) return $data;
    $n = count($data);
    $low = 0;
    $high = $n - 1;

    while($low <= $high) {
        $mid = floor(($low + $high) / 2);
        if($data[$mid] > $value) {
            $high = $mid - 1;
        } else if($data[$mid] < $value) {
            $low = $mid + 1;
        } else {
            if($mid == 0 || $data[$mid - 1] != $value) return $mid;
            else $high = $mid - 1;
        }
    }

    return -1;
}

/*
 * 4.二分查找算法(折半查找算法) - 查找最后一个值等于给定值的元素
 * @param Array $data 有序重复数组(升序)
 * @param Int $value 查找值
 * test:
 * $data = [0, 1, 2, 3, 4, 4, 4, 5, 6, 7, 8, 9, 10, 10, 10, 11, 12, 12, 12, 13, 14, 15, 16, 17];
 * var_Dump(bSearch_4($data, 10));
 * */
function bSearch_4($data, $value)
{
    if(count($data) <= 1) return $data;
    $n = count($data);
    $low = 0;
    $high = $n - 1;

    while($low <= $high) {
        $mid = floor(($low + $high) / 2);
        if($data[$mid] > $value) {
            $high = $mid - 1;
        } else if($data[$mid] < $value) {
            $low = $mid + 1;
        } else {
            if($mid == ($n - 1) || $data[$mid + 1] != $value) return $mid;
            else $low = $mid + 1;
        }
    }

    return -1;
}

/*
 * 5.二分查找算法(折半查找算法) - 查找第一个大于等于给定值的元素
 * @param Array $data 有序重复数组(升序)
 * @param Int $value 查找值
 * test:
 * $data = [0, 1, 2, 3, 4, 4, 4, 5, 6, 7, 8, 9, 11, 12, 12, 12, 13, 14, 15, 16, 17];
 * var_Dump(bSearch_5($data, 10));
 * */
function bSearch_5($data, $value)
{
    if(count($data) <= 1) return $data;
    $n = count($data);
    $low = 0;
    $high = $n - 1;

    while($low <= $high) {
        $mid = floor(($low + $high) / 2);
        if($data[$mid] >= $value) {
            if($data[$mid] == 0 || $data[$mid - 1] < $value) return $mid;
            else $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }

    return -1;
}

/*
 * 6.二分查找算法(折半查找算法) - 查找最后一个小于等于给定值的元素
 * @param Array $data 有序重复数组(升序)
 * @param Int $value 查找值
 * test:
 * $data = [0, 1, 2, 3, 4, 4, 4, 5, 6, 7, 8, 9, 11, 12, 12, 12, 13, 14, 15, 16, 17];
 * var_Dump(bSearch_6($data, 4));
 * */
function bSearch_6($data, $value)
{
    if(count($data) <= 1) return $data;
    $n = count($data);
    $low = 0;
    $high = $n - 1;

    while($low <= $high) {
        $mid = floor(($low + $high) / 2);
        if($data[$mid] > $value) {
            //if($data[$mid] == 0 || $data[$mid - 1] < $value) return $mid;
            //else $high = $mid - 1;
            $high = $mid - 1;
        } else {
            if($data[$mid] == ($n - 1) || $data[$mid + 1] > $value) return $mid;
            else $low = $mid + 1;
        }
    }

    return -1;
}






<?php

/**
 * Utils for sorting methods.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */

function _swapArrEl(&$arr, $i, $j)
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

function _getMinValueOfArray($arr)
{
    $min = $arr[0];

    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $min) {
            $min = $arr[$i];
        }
    }

    return $min;
}

function _getMaxValueOfArray($arr)
{
    $max = $arr[0];

    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
    }

    return $max;
}
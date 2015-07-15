<h4>Heap sort</h4>

<?php

function sortHeap($arr)
{
    function _heapify(&$arr, $id, $size)
    {
        $left = 2 * $id + 1;
        $right = 2 * $id + 2;
        $max = $id;

        if ($left < $size && $arr[$left] > $arr[$id]) {
            $max = $left;
        }

        if ($right < $size && $arr[$right] > $arr[$max]) {
            $max = $right;
        }

        if ($max !== $id) {
            _swapArrEl($arr, $id, $max);
            _heapify($arr, $max, $size);
        }
    }

    function _buildMaxHeap(&$arr)
    {
        $len = count($arr);
        for ($i = floor($len / 2); $i >= 0; $i -= 1) {
            _heapify($arr, $i, $len);
        }

        return $arr;
    }

    $size = count($arr);
    _buildMaxHeap($arr);
    for ($i = $size - 1; $i > 0; $i -= 1) {
        _swapArrEl($arr, 0, $i);
        $size -= 1;
        _heapify($arr, 0, $size);
    }

    return $arr;
}

echo "<pre>result arr: ";
print_r(sortHeap($arr));
echo "</pre>";
echo "<br/>";
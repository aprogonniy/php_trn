<h4>Selection sort</h4>

<?php

function sortSelect($arr)
{
    $j = null;
    $min = null;
    $len = count($arr);

    for ($i = 0; $i < $len; $i++) {
        $min = $i;

        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$j] < $arr[$min]) {
                $min = $j;
            }
        }

        if ($arr[$min] < $arr[$i]) {
            _swapArrEl($arr, $i, $min);
        }
    }

    return $arr;
}

echo "<pre>result arr: ";
print_r(sortSelect($arr));
echo "</pre>";
echo "<br/>";
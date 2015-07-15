<h4>Insertion sort</h4>

<?php

function sortInsert($arr)
{
    $x = null;
    $j = null;
    $len = count($arr);

    for ($i = 0; $i < $len; $i++) {
        $j = $i;
        while ($j > 0 && $arr[$j - 1] > $arr[$j]) {
            _swapArrEl($arr, $j, $j - 1);

            $j--;
        }
    }

    return $arr;
}

echo "<pre>result arr: ";
print_r(sortInsert($arr));
echo "</pre>";
echo "<br/>";
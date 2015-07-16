<?php

/**
 * Bubble sort algorithm implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */

?>

<h4>Bubble sort</h4>

<?php

function sortBubble($arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len - 1 - $i; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                _swapArrEl($arr, $j, $j + 1);
            }
        }
    }

    return $arr;
}

echo "<pre>result arr: ";
print_r(sortBubble($arr));
echo "</pre>";
echo "<br/>";
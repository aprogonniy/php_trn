<?php

/**
 * Comb sort algorithm implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */

?>

<h4>Comb sort</h4>

<?php

function sortComb(&$arr)
{
    $gap = count($arr);
    $swapped = true;

    while ($gap > 1 || $swapped) {
        if ($gap > 1) {
            $gap = intval($gap / 1.3);
        }
        $swapped = false;
        for ($i = 0; $i + $gap < count($arr); $i++) {
            if ($arr[$i] > $arr[$i + $gap]) {
                _swapArrEl($arr, $i, $i + $gap);
                $swapped = true;
            }
        }
    }
}

echo "<pre>result arr: ";
$arrCopy = $arr;
sortComb($arrCopy);
print_r($arrCopy);
echo "</pre>";
echo "<br/>";
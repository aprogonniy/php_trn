<?php

/**
 * Merge (bottom-up) sort algorithm implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */

?>

<h4>Merge (bottom-up) sort</h4>

<?php

function _mergeAdvanced(&$arr, $aux, $low, $mid, $high)
{
    $k = 0;
    $i = $low;
    $j = $mid + 1;

    for ($k = $low; $k <= $high; $k++) {
        $aux[$k] = $arr[$k];
    }

    for ($k = $low; $k <= $high; $k++) {
        if ($i > $mid) {
            $arr[$k] = $aux[$j++];
        } else if ($i > $high) {
            $arr[$k] = $aux[$i++];
        } else if ($aux[$j] < $aux[$i]) {
            $arr[$k] = $aux[$j++];
        } else {
            $arr[$k] = $aux[$i++];
        }
    }
}

function sortBottomUpMerge($arr)
{
    $aux = [];
    $len = count($arr);
    for ($n = 1; $n < $len; $n += $n) {
        for ($i = 0; $i < $len - $n; $i += 2 * $n) {
            $low = $i;
            $mid = $i + $n - 1;
            $high = min($i + 2 * $n - 1, $len - 1);

            _mergeAdvanced($arr, $aux, $low, $mid, $high);
        }
    }
    return $arr;
}

echo "<pre>result arr: ";
print_r(sortBottomUpMerge($arr));
echo "</pre>";
echo "<br/>";
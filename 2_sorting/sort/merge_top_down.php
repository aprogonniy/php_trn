<?php

/**
 * Merge (top-down) sort algorithm implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */

?>

<h4>Merge (top-down) sort</h4>

<?php

function _merge(&$left, &$right, &$arr)
{
    $a = 0;

    while (count($left) && count($right)) {
        if ($right[0] < $left[0]) {
            $arr[$a++] = array_shift($right);
        } else {
            $arr[$a++] = array_shift($left);
        }
    }
    while (count($left)) {
        $arr[$a++] = array_shift($left);
    }
    while (count($right)) {
        $arr[$a++] = array_shift($right);
    }
}

function sortTopDownMerge(&$arr)
{
    $tmp = array_slice($arr, 0);
    $len = count($arr);

    if ($len === 1) {
        return;
    }

    $m = floor($len / 2);
    $tmp_l = array_slice($tmp, 0, $m);
    $tmp_r = array_slice($tmp, $m);

    sortTopDownMerge($tmp_l, array_slice($tmp, 0, $m), $m);
    sortTopDownMerge($tmp_r, array_slice($tmp, $m), $len - $m);
    _merge($tmp_l, $tmp_r, $arr);
}

echo "<pre>result arr: ";
$arrCopy = $arr;
sortTopDownMerge($arrCopy);
print_r($arrCopy);
echo "</pre>";
echo "<br/>";
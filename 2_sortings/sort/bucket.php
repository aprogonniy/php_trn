<?php

/**
 * Bucket sort algorithm implementation.
 * @author oprohonnyi@gmail.com
 * @license Apache-2.0
 */

?>

<h4>Bucket sort</h4>

<?php
function sortBucket(&$arr)
{
    $len = count($arr);
    $buckets = [];

    for ($i = 0; $i < $len; $i++) {
        $buckets[$i] = [];
    }

    for ($i = 0; $i < $len; $i++) {
        array_push($buckets[ceil($arr[$i] / 10)], $arr[$i]);
    }

    $j = 0;
    for ($i = 0; $i < $len; $i++) {
        if (!empty($buckets[$i])) {
            sortInsert($buckets[$i]);

            for ($k = 0; $k < count($buckets[$i]); $k++) {
                $arr[$j++] = $buckets[$i][$k];
            }
        }
    }

}


echo "<pre>result arr: ";
$arrCopy = $arr;
sortBucket($arrCopy);
print_r($arrCopy);
echo "</pre>";
echo "<br/>";
<h4>Shell sort</h4>

<?php

function sortShell(&$arr)
{
    $len = count($arr);
    for ($h = $len; $h = intval($h / 2);) {
        for ($i = $h; $i < $len; $i++) {
            $k = $arr[$i];
            for ($j = $i; $j >= $h && $k < $arr[$j - $h]; $j -= $h)
                $arr[$j] = $arr[$j - $h];
            $arr[$j] = $k;
        }
    }
}

echo "<pre>result arr: ";
$arrCopy = $arr;
sortShell($arrCopy);
print_r($arrCopy);
echo "</pre>";
echo "<br/>";
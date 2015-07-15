<h4>Counting sort</h4>

<?php
function sortCount(&$arr)
{
    $i = 0;
    $z = 0;
    $count = [];
    $min = _getMinValueOfArray($arr);
    $max = _getMaxValueOfArray($arr);

    for ($i = $min; $i <= $max; $i++) {
        $count[$i] = 0;
    }

    for ($i = 0; $i < count($arr); $i++) {
        $count[$arr[$i]]++;
    }

    for ($i = $min; $i <= $max; $i++) {
        while ($count[$i]-- > 0) {
            $arr[$z++] = $i;
        }
    }

    return $arr;
}

echo "<pre>result arr: ";
print_r(sortCount($arr));
echo "</pre>";
echo "<br/>";
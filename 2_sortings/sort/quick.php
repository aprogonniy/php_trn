<h4>Quick sort</h4>

<?php
function _partition(&$arr, $pivot, $left, $right)
{
    $storeIndex = $left;
    $pivotValue = $arr[$pivot];

    _swapArrEl($arr, $pivot, $right);
    for ($v = $left; $v < $right; $v++) {
        if ($arr[$v] < $pivotValue) {
            _swapArrEl($arr, $v, $storeIndex);
            $storeIndex++;
        }
    }
    _swapArrEl($arr, $right, $storeIndex);

    return $storeIndex;
}


function sortQuick(&$arr, $left, $right)
{
    $pivot = null;
    $newPivot = null;

    if (!is_int($left)) {
        $left = 0;
    }
    if (!is_int($right)) {
        $right = count($arr) - 1;
    }

    if ($left < $right) {
        $pivot = $left + ceil(($right - $left) * 0.5);
        $newPivot = _partition($arr, $pivot, $left, $right);

        sortQuick($arr, $left, $newPivot - 1);
        sortQuick($arr, $newPivot + 1, $right);
    }
}

echo "<pre>result arr: ";
$arrCopy = $arr;
sortQuick($arrCopy, null, null);
print_r($arrCopy);
echo "</pre>";
echo "<br/>";
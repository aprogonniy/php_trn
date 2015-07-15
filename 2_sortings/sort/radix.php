<h4>Radix sort (LSD)</h4>

<?php
echo "<pre>init arr: ";
$strArr = ['a', 'm', 'o', 'q', 'z', 'b'];
print_r($strArr);
echo "</pre>";



function utf8_char_code_at($str, $index)
{
    $char = mb_substr($str, $index, 1, 'UTF-8');

    if (mb_check_encoding($char, 'UTF-8')) {
        $ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
        return hexdec(bin2hex($ret));
    } else {
        return null;
    }
}

function sortRadix(&$arr){
    for ($i = 0; $i >= 0; $i--) {
        $count = [];
        $temp = [];
        for ($j = 0; $j < count($arr); $j++) {


            $charCode = utf8_char_code_at($arr[$j], $i);


            $old = (isset($count[$charCode + 1])) ? $count[$charCode + 1] : 0;
            $count[$charCode + 1] = $old + 1;
        }
        for ($c = 0; $c < count($count) - 1; $c++) {
            $count[$c] = (isset($count[$c])) ? $count[$c] : 0;
            $count[$c + 1] = (isset($count[$c + 1])) ? $count[$c + 1] : 0;
            $count[$c + 1] += $count[$c];
        }
        for ($j = 0; $j < count($arr); $j++) {


            $char = utf8_char_code_at($arr[$j], $i);


            $temp[$count[$char]] = $arr[$j];
            $count[$char]++;
        }
        for ($j = 0; $j < count($arr); $j++) {
            $arr[$j] = $temp[$j];
        }
    }
}



echo "<pre>result arr: ";
sortRadix($strArr);
print_r($strArr);
echo "</pre>";
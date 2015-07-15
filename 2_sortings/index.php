<?php

//error_reporting(E_ERROR | E_PARSE);
include("utils.php");

?>

<div>
    The page implements all sorting algorithms described here: <a href=\http://en.wikipedia.org/wiki/Sorting_algorithm">http://en.wikipedia.org/wiki/Sorting_algorithm</a>
</div>

<?php
$arr = [3, 5, 1, 9, 0, -5, 17];

echo "<br/><pre>init arr: ";
print_r($arr);
echo "</pre><br/>";

?>

<h3>- Simple sorts</h3>

<?php

include("sort/insertion.php");
include("sort/selection.php");

?>

<h3>- Efficient sorts</h3>

<?php

include("sort/merge_top_down.php");
include("sort/merge_bottom_up.php");
include("sort/heap.php");
include("sort/quick.php");

?>

<h3>- Bubble sort and variants</h3>

<?php

include("sort/bubble.php");
include("sort/shell.php");
include("sort/comb.php");

?>

<h3>- Distribution sort</h3>

<?php

include("sort/counting.php");
include("sort/bucket.php");
include("sort/radix.php");

?>
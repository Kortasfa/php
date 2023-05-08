<?php
require("utils.php");
$a1 = 132134;
$a2 = 21312;
$b1 = [
    1 => 2,
    2 => [
        3 => 4,
        4 => 5,
    ],
];
$b2 = [
    2 => [
        4 => 5,
        3 => 4,
    ],
    1 => 2,
];

// echo compareFloats($a1, $a2) . "\n";
echo arrayEquals($b1, $b2) . "\n";
// var_dump( arrayNumberFilter($b1));

?>
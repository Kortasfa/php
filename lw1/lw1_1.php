<?php
if ($argc < 2)
{
    echo "incorrect\n";
    exit();
}
$max = -INF;
$min = INF;
for ($i = 1; $i < $argc; $i++)
{
    $max = ($argv[$i] > $max) ? $argv[$i] : $max;
    $min = ($argv[$i] < $min) ? $argv[$i] : $min;
}
echo "$argc\n";
echo "min = $min and max = $max\n";
<?php
if ($argc < 2)
{
    echo "incorrect";
}

$max = $argv[1];
$min = $argv[1];

for ($i = 2; $i < $argc; $i = +2)
{
    $max = (strncmp($max, $argv[$i], 5) = 1) ? $max : $argv[$i];
    $min = (strncmp($min, $argv[$i], 5) = -1) ? $min : $argv[$i];
}
echo "$argc" . "\n";
echo "min = $min and max = $max";
<?php

$input = $argv[1];
$len = strlen($input);

while (str_contains($input, "  "))
{
    $input = str_replace('  ', ' ', $input);
}

$input = ltrim($input, " ");
$input = rtrim($input, " ");

echo $input;

?>
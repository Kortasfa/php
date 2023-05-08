<?php

$maxvalue = -INF;
$minvalue = INF;

for ($i = 1; $i < $argc; $i++)
{

    $key = (explode('=', $argv[$i]))[0];
    $value = (explode('=', $argv[$i]))[1];

    if (strncmp($value, $maxvalue, strlen($value)) === 1)
    {
        $maxvalue = $value;
        $maxkey = $key;
    }

    if (strncmp($value, $minvalue, strlen($value)) === -1)
    {
        $minvalue = $value;
        $minkey = $key;
    }

}

echo "max: $maxkey \n" . "min: $minkey";

?>

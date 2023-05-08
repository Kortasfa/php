<?php
function compareFloats(float $value1, float $value2): int
{
    if (abs($value1 - $value2) < PHP_FLOAT_EPSILON)
    {
        return 0;
    } else
    {
        return ($value2 > $value1) ? 1 : -1;
    }
}

function arrayEquals(array $left, array $right): bool
{
    return $left === $right;

}

function arrayNumberFilter(array $data): array
{
    $arrayDigit = [];
    foreach ($data as $value)
    {
        if (is_int($value))
        {
            $arrayDigit[] = $value;
        }
    }
    return $arrayDigit;
}

?>
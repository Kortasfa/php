<?php
$password = $_POST["password"];

if (!isset($password) && ($password == ''))
{
    echo "Пароль не задан";
    exit();
}

if (!preg_match('/[a-zA-Z0-9]/', $password))
{
    echo "Пароль содержит запрещенные символы";
    exit();
}

$digits = count(array_filter(str_split($password), 'is_numeric'));
$passwordLength = strlen($password);
$passwordBottom = 0;
$passwordTop = 0;

for ($i = 0; $i < $passwordLength; $i++)
{
    $passwordTop += (ctype_upper($password[$i])) ? 1 : 0;
    $passwordBottom += (ctype_lower($password[$i])) ? 1 : 0;
}

$passwordString = 0;
$passwordString += $passwordLength * 4;
$passwordString += $digits * 4;
$passwordString += ($passwordLength - $passwordTop) * 2;
$passwordString += ($passwordLength - $passwordBottom) * 2;

if (($digits = 0) or ($digits = $passwordLength))
{
    $passwordString -= $passwordLength;
}

foreach (count_chars($password, 1) as $i => $val)
{
    for ($j = 1; $j < $val; $j++)
    {
        --$passwordString;
    }
}

echo "Надежность пароля: $passwordString";




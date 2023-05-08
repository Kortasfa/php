<?php

$data = '';
$dir = './dict/';

try // в случае неккоректной работы кода - файл все равно закроется
{
    if ($handle = opendir($dir)) //получаем дирекотрию где лежат данные
    {
        while (false !== ($entry = readdir($handle))) //читаем файл в директории
        {
            if ($entry != "." && $entry != "..") //смотрим, чтобы не попали технические . и .. в виде файла
            {
                $contents = file_get_contents($dir . $entry);
                $data = "$data" . PHP_EOL . $contents;
                $data = trim($data);
                $tempArray = explode(PHP_EOL, $data); //tempArray нужен для конкретного файла

                foreach ($tempArray as $lineNum => $line) //читаем и закидываем в общий массив dictionary
                {
                    $parsed = explode(":", $line);
                    $key = $parsed[0];
                    $value = $parsed[1];
                    $dictionary[$key] = $value;
                }
            }
        }
    }
} finally
{
    closedir($handle);
}

ksort($dictionary); //сортируем по ключам

try //для 100% закрытия файла
{
    $output = fopen("output.txt", 'c+');

    foreach ($dictionary as $key => $value)
    {
        fwrite($output, "$key:$value\n");
    }
} finally
{
    fclose($output);
}


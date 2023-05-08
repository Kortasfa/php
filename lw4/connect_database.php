<?php

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
function connectDatabase(): PDO
{
    // Создаёт объект PDO, представляющий подключение к MySQL.
    // Использует фиксированные параметры dsn, username, password.
    $dsn = $_ENV['DSN'];
    $user = $_ENV['USER'];
    $password = $_ENV['PASSWORD'];
    return new PDO($dsn, $user, $password);
}












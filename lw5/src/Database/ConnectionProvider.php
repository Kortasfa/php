<?php

declare(strict_types=1);

namespace App\Database;

class ConnectionProvider
{
    public static function connectDatabase(): \PDO
    {
        // Создаёт объект PDO, представляющий подключение к MySQL.
        // Использует фиксированные параметры dsn, username, password.
        $dsn = 'mysql:host=127.0.0.1;dbname=php_course';
        $user = 'root';
        $password = 'root123321';
        return new \PDO($dsn, $user, $password);
    }
}












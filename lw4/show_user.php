<?php
require_once 'connect_database.php';
require_once 'class_user.php';
function findUserInDatabase(PDO $pdo, int $userId): ?User
{
    // Извлекает пользователя с заданным ID из базы данных
    //  с помощью SELECT.
    // Возвращает ассоциативный массив либо null, если
    //  пользователь не найден
    $query = <<<SQL
        SELECT 
            first_name, 
            last_name, 
            middle_name, 
            gender, 
            birth_date, 
            email, 
            phone, 
            avatar_path
        FROM user 
        WHERE user_id = $userId
    SQL;
    $stmt = $pdo->query($query);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ? new User(
        $user['userId'],
        $user['first_name'],
        $user['last_name'],
        $user['middle_name'],
        $user['gender'],
        $user['birth_date'],
        $user['email'],
        $user['phone'],
        $user['avatar_path']
    ) : null;
}

$userId = (int)$_GET['user_id'];
$connection = connectDatabase();
$userData = findUserInDatabase($connection, $userId);

if (!$userData)
{
    echo 'User not found';
    exit();
}

require_once 'lw4-3.php';

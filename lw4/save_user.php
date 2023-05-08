<?php
require_once 'connect_database.php';
require_once 'class_user.php';
function saveUserToDatabase(PDO $connection, user $userParams): int
{
    // Добавляет пользователя в таблицу 'user' с помощью INSERT.
    // Возвращает целочисленный ID добавленного пользователя.
    // SQL Injection не может быть так как все значения string
    $first_name = $userParams->getFirstName();
    $last_name = $userParams->getLastName();
    $middle_name = $userParams->getMiddleName() ;
    $gender = $userParams->getGender();
    $birth_date = $userParams->getBirthDate();
    $email = $userParams->getEmail();
    $phone = $userParams->getPhone();
    $avatar_path = $userParams->getAvatarPath();
    $query = <<<SQL
        INSERT INTO 
            user (
                first_name, 
                last_name, 
                middle_name, 
                gender, 
                birth_date, 
                email, 
                phone, 
                avatar_path
            ) 
        VALUES (
            '$first_name', 
            '$last_name', 
            '$middle_name', 
            '$gender', 
            '$birth_date', 
            '$email', 
            '$phone', 
            '$avatar_path'
           )
    SQL;

    $connection->exec($query);
    return (int)$connection->lastInsertId();
}
function getUsers(): ?int
{
    //Читает поля, сохраняет в БД пользователя, возвращает ID пользователя
    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['gender']) && !empty($_POST['birth_date']) && !empty($_POST['email']))
    { //check valid points
        $user =
            new User(
                null,
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['middle_name'],
                $_POST['gender'],
                $_POST['birth_date'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['avatar_path']
            );
        $connection = connectDatabase();
        return saveUserToDatabase($connection, $user);
    }
    else
    {
        return 0;
    }
}

$userId = getUsers();
if ($userId == 0)
{
    echo 'Необходимые поля не заполнены';
    exit();
}

if (!$userId)
{
    echo "<script>console.log('ID is not found, getUsers() has problem');</script>";
}

if (isset($_POST['submit'])) //Переход на следующее задание
{
    $redirectUrl = "/show_user.php?user_id=$userId";
    header('Location: ' . $redirectUrl, true, 303);
    die();
}

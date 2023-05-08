<?php
const jsonUsers = 'users.json';
function findSameUser(array $users, array $user): bool
{
    foreach ($users as $fields)
    {
        foreach ($fields as $key => $value)
        {
            if (($key == 'email' && $value == $user['email']) || ($key == 'phone' && $value == $user['phone'] && $value != null))
            {
                return true;
            }
        }
    }
    return false;
}

// Проверка данных формы на заполненность + на пустоту строк
if (!empty($_POST['last_name']) && !empty($_POST['first_name']) && !empty($_POST['gender']) && !empty($_POST['birth_date']) && !empty($_POST ['email']))
{
    $user = [
        'last_name' => $_POST['last_name'],
        'first_name' => $_POST['first_name'],
        'middle_name' => $_POST['middle_name'],
        'gender' => $_POST['gender'],
        'birth_date' => $_POST['birth_date'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'avatar_path' => $_POST['avatar_path']
    ];

    $json = file_get_contents(jsonUsers);
    $users = json_decode($json, true);
    $userToArray[] = $user; //переводим данные $user в 1-массив, чтобы добавить к $users

    if (!$json) //если файл пустой - добавляем
    {
        file_put_contents(jsonUsers, json_encode($userToArray, JSON_UNESCAPED_UNICODE));
        echo 'Вы успешно зарегистрировались';
    }
    else //если не пустой то
    {
        if (!findSameUser($users, $user))  //проверяем есть ли там тот же самый пользователь, если нет - добавляем
        {
            $userToArray = array_merge($userToArray, $users); //сливаем $user в массив $users
            file_put_contents(jsonUsers, json_encode($userToArray, JSON_UNESCAPED_UNICODE));
            echo 'Вы успешно зарегистрировались';
        }
        else // если да - выводим сообщение
        {
            echo 'Данный пользователь уже зарегистрирован';
        }
    }
}
else
{
    echo 'Некорректные данные';
}
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>USER</title>
</head>
<body>
<p>Фамилия: <?= htmlentities($user->getLastName()) ?></p>
<p>Имя: <?= htmlentities($user->getFirstName()) ?></p>
<p>Отчество: <?= htmlentities($user->getLastName()) ?></p>
<p>Пол: <?= htmlentities($user->getGender()) ?></p>
<p>Дата рождения: <?= htmlentities($user->getBirthDate()) ?></p>
<p>Email: <?= htmlentities($user->getEmail()) ?></p>
<p>Телефон: <?= htmlentities($user->getPhone()) ?></p>
<p>Аватар: <?= htmlentities($user->getAvatarPath()) ?></p>
</body>

</html>
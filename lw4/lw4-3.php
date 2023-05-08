<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>USER</title>
</head>
<body>
<p>Фамилия: <?= htmlentities($userData->getLastName()) ?></p>
<p>Имя: <?= htmlentities($userData->getFirstName()) ?></p>
<p>Отчество: <?= htmlentities($userData->getLastName()) ?></p>
<p>Пол: <?= htmlentities($userData->getGender()) ?></p>
<p>Дата рождения: <?= htmlentities($userData->getBirthDate()) ?></p>
<p>Email: <?= htmlentities($userData->getEmail()) ?></p>
<p>Телефон: <?= htmlentities($userData->getPhone()) ?></p>
<p>Аватар: <?= htmlentities($userData->getAvatarPath()) ?></p>

<a href="lw4-2.php">Return</a>
</body>

</html>
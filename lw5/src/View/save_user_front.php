<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>FORM</title>
    <style>
        label {
            display: block;
            position: relative;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
<form method="POST" action="/add_user.php" enctype="multipart/form-data">
    <label>Фамилия<input type="text" name='last_name'/></label>
    <label>Имя <input type="text" name='first_name'/></label>
    <label>Отчество <input type="text" name='middle_name'/></label>
    <label>Пол <br/>
        <input type="radio" name="gender" value="M"/> Мужчина <br/>
        <input type="radio" name="gender" value="F"/> Женщина
    </label>
    <label>Дата рождения <input type="date" name='birth_date'/></label>
    <label>Email <input type="email" name='email'/></label>
    <label>Телефон <input type="tel" name='phone'/></label>
    <label>Аватар <input type="file" name='avatar_path' accept="image/jpeg, image/png, image/gif"/></label>
    <input type="submit" name="submit" value="Отправить">
</form>
</body>

</html>
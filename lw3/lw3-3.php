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
<form action="form.php" method="POST">
    <label>Фамилия <input type="text" required name='last_name'/></label>
    <label>Имя <input type="text" required name='first_name'/></label>
    <label>Отчество <input type="text" name='middle_name'/></label>
    <label>Пол <br/>
        <input type="radio" required name="gender" value="M"/> Мужчина <br/>
        <input type="radio" required name="gender" value="F"/> Женщина
    </label>
    <label>Дата рождения <input type="date" required name='birth_date'/></label>
    <label>Email <input type="email" required name='email'/></label>
    <label>Телефон <input type="tel" name='phone'/></label>
    <label>Аватар <input type="file" name='avatar_path'/></label>
    <input type="submit" name="submit" value="Отправить">
</form>
</body>

</html>
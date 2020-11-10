<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Форма регистаии</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

    <form action="signup.php" method="post" enctype="multipart/form-data">
        <Label>ФИО</Label>
        <input type="text" name="full_name" placeholder="Введите своё полное имя">
        <Label>Логин</Label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <Label>Почта</Label>
        <input type="text" name="email" placeholder="Введите адре своей почты">
        <Label>Изображение профиля</Label>
        <input type="file" name="avatar">
        <Label>Пароль</Label>
        <input type="password" name="password" placeholder="Введите пароль">
        <Label>Подтверждение пароля</Label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit">Зарегестрироваться</button>
        <p>
            У Вас уже есть аккаунт? - <a href="form.php">Авторизируйтесь</a>
        </p>

        <?php
        if (isset($_SESSION['message'])) { // если переменная message существует, то выводим сообщение "Пароли не совподают"
            echo '<p class="msg">' . $_SESSION['message'] . '</p>'; // выводим сообщение с рамкой
            unset($_SESSION['message']); // удаляем сообщение
        }
        ?>
    </form>
</body>

</html>
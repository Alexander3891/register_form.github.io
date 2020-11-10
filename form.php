<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистаия</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>


    <form action="signin.php" method="post">
        <Label>Логин</Label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <Label>Пароль</Label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit">Войти</button>
        <p>
            У Вас нет аккаунта? - <a href="register.php">Зарегестрируйтесь</a>
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
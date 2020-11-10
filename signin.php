<?php
//  АВТОРИЗАЦИЯ ПОЛЬЗОВАТЕЛЯ
session_start(); // сессии для вывода  на странице register - Пароли не совподают
require_once 'connect.php'; // делаем обращение к БД

$login = $_POST['login'];
$password = md5($_POST['password']); // md5 - для зашифровки и расшифровки пароля в БД  

$query = "SELECT * FROM `users` WHERE `login`= '$login' AND `password`= '$password'"; // запрос в БД
$check_user = mysqli_query($connect, $query);
if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user); // преобразуем в нормальный массив $user(доступны все данные по запросу $query в виде ммассива из БД) из массива $check_user

    $_SESSION['user'] =
        [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "email" => $user['email'],
            "avatar" => $user['avatar']

        ];
    header("Location: profile.php"); // переадресовываем человека на этуже страницу после нажатия кнопки отравить

} // сколько строк нашел с таким логином и паролем
else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header("Location: form.php"); // переадресовываем человека на этуже страницу после нажатия кнопки отравить

}

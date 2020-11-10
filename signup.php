<?php
//  РЕГИСТРАЦИЯ
/*
require_once
require
include
include_once
*/
session_start(); // сессии для вывода  на странице register - Пароли не совподают
require_once 'connect.php'; // делаем обращение к БД

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];


if ($password === $password_confirm) {

    $path = 'uploads/' . time() . $_FILES['avatar']['name']; // из массива фото первый ключ avatar второй ключ name time - для уникальности имени файла
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $path)); { // функция загрузки файла в папку uploads 
        $_SESSION['message'] = 'Ошибка при загрузке файла';
        header("Location: register.php");
    }

    $password = md5($password); // захеширует пароль в БД

    // $query = $connect->prepare("INSERT INTO users SET full_name=:full_name, login=:login, email=:email, password=:password"); //(делаем две пустые дырки - защита от ввода одинарной кавычки)(готовит к выполнению запрос)добавляем данные в таблицу коментариев и добавляем в поле значение имени и текст
    //$params = ['full_name' => $full_name, 'login' => $login, 'email' => $email, 'password' => $password];
    //$query->execute($params); //(выполняет запрос)метод выполняет добавление в базу данных

    $query =  "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES(NULL, '$full_name', '$login', '$email', '$password', '$path')";
    mysqli_query($connect, $query);




    $_SESSION['message'] = 'Регистрация прошла успешно';
    header("Location: form.php"); // переадресовываем человека на этуже страницу после нажатия кнопки отравить


} else {
    $_SESSION['message'] = 'Пароли не совподают'; // Суперглобальная переменная от  функции session_start()  создает массив с ключем message которая будет доступна на любой странице
    header("Location: register.php"); // перейти обратно на страницу register
}

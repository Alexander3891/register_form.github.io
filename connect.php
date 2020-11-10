<?php
// mysqli_connect - функция для соединеия с БД

//$connect = new PDO('mysql:host=localhost;dbname=site', 'root', ''); // соединение с бд
//$connect->exec("SET NAMES UTF8"); // шрифт

$connect = mysqli_connect('localhost', 'root', '', 'site'); // соединение с бд

if (!$connect) { // проверка подключения к БД
    die('Error connect to DateBase'); // функция выводка сообщения и при этом остановит весь код
}

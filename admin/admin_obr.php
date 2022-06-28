<?php
session_start(); 
header("Content-type: text/html; charset=utf-8");


$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);
include "data_base.php";  
$sql = "SELECT * FROM content_manager WHERE manager_login = '$login' AND password = '$password'"; //в sql записывается строка  
$result = $data_base->query($sql); //возвращаем объект mysqli_result
// проверяем количество полученных строк от базы

if($result->num_rows == 0){ //num_rows Получает число рядов в результирующей выборке
  header("Refresh: 2;url=admin.php");
  echo "Почта или пароль введены не верно";
} else {
  header("Refresh: 2;url=account.php");
  $user = $result->fetch_assoc();
  $user['login'] = htmlspecialchars( $_POST["login"] );
  $_SESSION['user'] = $user; //получаем ассоциативный массив с данными от пользователя и сохраняем его в сессию
  echo "Авторизация прошла успешно";
}
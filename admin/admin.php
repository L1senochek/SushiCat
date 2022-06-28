<?php
session_start();
$title = "Авторизация";
$style = "css/admin.css";
$script = "javascript/admin.js";
include"header.php";
?>
  <div class="form_auth">
    <form action="admin_obr.php"  method="post">
      <input type="text" name="login" required placeholder="Введите login" width=400px><br>
      <input type="password" name="password" required placeholder="Введите пароль" width=400px><br>
      <button class="btn">Войти</button>
    </form>
  </div>
  <br>

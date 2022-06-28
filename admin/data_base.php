<?php

$ip_db = "localhost";
$name_db = "b9160422_1";
$pass_db = "Admin1!";
$user_db = $name_db;

/* подключаемся к базе данных */
$data_base = new mysqli( $ip_db, $name_db, $pass_db, $user_db );
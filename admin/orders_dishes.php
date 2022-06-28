<?php
session_start();
$title = "Личный кабинет";
$style = "css/account.css";
include"header.php";

$user = $_SESSION['user']; // из сессии получаем массив с данными о пользователе или null

if( isset($user['id_manager']) ) {
  echo "<a href='new_dishes.php'><button> Внесение новых блюд </button></a>";
  echo "<a href='new_category.php'><button> Редактирование категорий блюд</button></a>";
  echo "<a href='edit_dishes.php'><button> Удаление блюд</button></a>";
  echo "<a href='orders_dishes.php'><button> Просмотр заказов </button></a>";
}

include"data_base.php";
$sql = "SELECT * FROM orders";
$result = $data_base->query( $sql );
$arr = $result->fetch_assoc();

echo "<table border=2 cellspacing=0>";
  thead( $arr );
  while( $arr  ){
    tbody( $arr );
    $arr = $result->fetch_assoc();
  } //Извлекает результирующий ряд в виде ассоциативного массива
  
  echo "</table>";

function thead( $arr ){
  echo "<tr>";
    foreach( $arr as $key => $value) {
      echo "<th> $key </th>";
    }
  echo "</tr>";
}
function tbody( $arr ){
  echo "<tr>";
    foreach( $arr as  $value) {
      echo "<td> $value </td>";
    }
  echo "</tr>";
}
?>
<br>-------------------------------------------------------------------------

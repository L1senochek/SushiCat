<?php
session_start();
include"header.php";
include"data_base.php";
$user = $_SESSION['user'];

$id_delete = $_GET['id_delete'];

//if (isset($_GET['id_delete'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
  $sql = "DELETE FROM dishes WHERE id='$id_delete'";
  $result = $data_base->query( $sql );
  //print_r($sql);
  
  if ($result) {
    echo "<p>Товар удален.</p>";
  } else {
    echo '<p>Произошла ошибка </p>';
    /*print_r($id_delete);
    print_r($sql);
    print_r($result);*/
  };

<?php
include"data_base.php";

//функция, которая принимает ассинхронно
function get_dishes_by_id($id){
  global $data_base;
  
  $query = "SELECT * FROM dishes WHERE id=$id";
  $req = mysqli_query($data_base, $query); //запрос к базе данных
  $resp = mysqli_fetch_assoc($req); //Извлекает результирующий ряд в виде ассоциативного массива
  
  return $resp;
  
}

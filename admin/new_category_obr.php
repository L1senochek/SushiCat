<?php
session_start();

$category = $_POST['category'];
$id_category = $_POST['category_id'];

include "data_base.php";

$sql = "UPDATE category_menu SET name='$category' WHERE id='$id_category'";
$result = $data_base->query( $sql );
  //return $result;

 
if($result == true){
  echo "ok";
  //print_r($result);
} else {
  echo "don`t ok";
}


<?php
session_start();
$cart_list = $_SESSION["cart_list"];

$id_item = $_GET["delete"]; // [25]
$item = $_SESSION['cart_list'][$id_item] ; //1


if ( $item > 1){ //если количество > 1

 $cart_list[$id_item] = $item -1;
 $_SESSION["cart_list"] = $cart_list; //перезаписываю полученное значение $cart_list в сессию
}else{
  unset( $_SESSION['cart_list'][$id_item] );
}

header("location: cart.php");
<?php
session_start();
$cart_list = $_SESSION["cart_list"];
$id_item = $_POST["dishes_id"];
if( empty($cart_list) ) { //проверяет пустая ли переменная $cart_list
  $cart_list = [];  // если $cart_list пустая переопределяю массив
  $cart_list[$id_item] = 1; //24 1 добавляю id в пустой массив +1
} else if( isset($cart_list[$id_item]) ){ //Определяет, была ли установлена переменная значением, отличным от null
  $cart_list[$id_item] += 1; //24 n+1 //если такой id найден в корзине, его колво увеличивается на +1
} else {
  $cart_list[$id_item] = 1; // если id не найдено, добавляется в id переданное по клику с кол-вом 1
}

$_SESSION["cart_list"] = $cart_list; //перезаписываю полученное значение $cart_list в сессию

//exit("ok");
exit($cart_list[$id_item]);

//print_r($cart_list);
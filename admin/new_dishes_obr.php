<?php
session_start();
$id = $_SESSION['user']['id_manager'];

$category = $_POST['select_category_menu']; // key name 'select_category_menu'

$dish_name = htmlspecialchars($_POST['dish_name']); //Преобразует специальные символы в HTML-сущности
$ingredients = htmlspecialchars($_POST['ingredients']); //Преобразует специальные символы в HTML-сущности

  //загрузка файла image
  $file = $_FILES['image'];
  if( $file['error'] != 0){
    //return ("content_manager");
    exit("файл не был загружен");
  }
  $image_name = $file['name']; // имя картинки
  $from = $file['tmp_name']; //Временное имя, с которым принятый файл был сохранен на сервере
  $to = "image_dishes/".$image_name['name'];
  
  move_uploaded_file($from, $to); //перемещает загруженный файл в новое место
  
  $price = $_POST['price'];
  
  $weight = $_POST['weight'];
  
  
  include "data_base.php";
  
  function addDishes( $dish_name, $ingredients, $image_name, $category, $price, $weight){
    global $data_base;
    $sql = "INSERT INTO dishes (dish_name, ingredients, image, category_id, price, weight)
    VALUES ('$dish_name', '$ingredients', '$image_name', '$category', '$price', '$weight')";
    $result = $data_base->query( $sql );
    return $result;
  }
  
  $result = addDishes( $dish_name, $ingredients, $image_name, $category, $price, $weight);
  
  //var_dump($result);
  //var_dump($data_base);
  
  if($result == true){
    echo "ok";
    //exit("добавлена");
    
  } else {
    echo "don`t ok";
    //("не добавлена");
  }


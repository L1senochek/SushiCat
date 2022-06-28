<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="<?= $style ?>">
  <script src="<?= $script ?>" defer></script>
  <link rel="stylesheet" href="resource/CSS/header.css"> <!-- -->
  <!--<script src="resource/javascript/header.js" defer></script>-->
</head>
<body >
  <header class="header">
    
    <nav class="left">
      <div class="logotype">
        <a href="index.php" >
          <img src="resource/emblems/sushicat_main_v4.jpg" height="80px"
    width="310px">
        </a>
      </div>
      <div class="discounts">
        <a href="discounts.php" class="href-discounts"> скидки <br>
          <img src="resource/emblems/cat1.jpg" width="75px">
        </a>
      </div>
              
      <div class="delivery">
        <a href="delivery.php" class="href-delivery"> о доставке <br>
        <img src="resource/emblems/cat2.jpg" width="75px"></a>
      </div>
    </nav>
    
    <nav class="right">
      <!----------->
      <div class="search_dishes">
        <form action="search.php" class="search" method="post">
          <input type="text"  name="search_dishes_input" autocomplete="off" placeholder="поиск">
          <button id="button_id" class="button_id"><img src="resource/emblems/cat3.jpg" width="75px"></button>
        </form>
        <div class="dishes_search_list">
          
        </div>
        
      </div>
      
      
      <!----------->
      <!--<div class="smalcartshop">
        <strong>Товаров в корзине:</strong><?php//$dishes['cart_count']?> шт.
         <br/><strong>На сумму:</strong><?php//$dishes['cart_price']?> руб.   
        <br/><a href=''>Оформить заказ</a>
      </div>-->
      <!----------->
      <!--<div class="cartshop">
        <strong>Товаров в корзине:</strong> <span id="cart_count">
          <?php 
          //---------------------проверяю, заданна ли $_SESSION['cart_list']
          /*if(isset($_SESSION['cart_list'])){ //если существует cart_list
            echo count($_SESSION['cart_list']); //то добавляем значение count($_SESSION['cart_list'])
          }*/
          //print_r($_SESSION['cart_list'])
          ?>
        </span>
      </div>
      -->
      <!----------->
      <div class="basket">
        <a href="cart.php"> 
          <img src="resource/emblems/basket.jpg" alt="">
        </a>
      </div>
    </nav>
    
    
    
    
    <!------------------------------------------------->
    
    <?php
    
    ?>
    
    
    
    
    
    
    
    
    
    
  </header>
  <main class="main"  >    
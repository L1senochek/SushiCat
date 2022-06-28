<?php
session_start();
include "header.php";

include"data_base.php";
$style = "resource/CSS/header.css";

?>
<div class="bgc_order">
<div class="order"> Ваш заказ: </div> 

<div class="break"></div>



<?php 

  $cart_list = $_SESSION['cart_list']; //массив из сессии
  if(empty($cart_list)){
    echo '<div class="cart_empty"> Корзина пустая <br>
      <image src="resource/emblems/cart_empty.jpg"></image>
    </div> ';
  }
  $key = array_keys($cart_list); //Возвращает все или некоторое подмножество ключей массива
  $id = implode(", ", $key); //Объединяет элементы массива в строку
  $sql = " SELECT * FROM dishes WHERE id IN ($id)";
  $result = $data_base->query($sql);
  while( $dishes = $result->fetch_assoc() ):
    ?>
  
  
  <!--<div class="order_creat_cart">-->
    
    <div class="order_creat_cart_main">
      <div class="cart_image">
        <image src="resource/dishes/<?=$dishes['image']?>" width=150></image>
      </div>
      <div class="cart_dishes_name">
        <p width=200><?=$dishes['dish_name']?></p>
      </div> 
      <div class="cart_dishes_price">
        <p>цена: <?=$dishes['price']?> руб x <?php echo $cart_list[$dishes['id']] ?> шт</p>
      </div>
      
      
    </div>
    <?php
    $sum = $sum + ($cart_list[ $dishes['id'] ])*$dishes['price'];
    $order_composition = $order_composition.$dishes['dish_name']." ".$cart_list[$dishes['id']]." шт".", ";
    endwhile;
     
    //print_r($order_composition); 
    
    $order_composition = substr($order_composition,0,-2);
   // print_r($order_composition)
  
  ?>
  <div class="total_sum">
    Общая сумма заказа: <?php echo $sum ?> руб
    
    <br>
    
  </div>
  <?php 
  
  
  ?>
  
  
 <!-- </div>-->
  <div class="personal_data">
    <form action="order_creation_obr.php" method="post" class="personal_data_form">
      
      <label>
        Имя:
      </label>
      <input name="name_user" type="text" value="<?php ?>" required placeholder="введите имя" > <br>
      
      <label>
        Фамилия: 
      </label>
      <input name="lastname_user" type="text" value="<?php ?>" required placeholder="введите фамилию"> <br>
      
      <label>
        Номер телефона:
      </label>
      <input name="phone_user" type="tel" value="<?php ?>" required placeholder="введите номер телефона" maxlength="11"> <br>
      
      <label>
        Адрес:
      </label>
      <input name="adress" type="text" value="<?php ?>" required placeholder="введите адрес"> <br>
      
      <label>
        Состав заказа:
      </label>
      <p name="order_composition" type="text" value="<?php  ?>" required  readonly> <?php echo $order_composition ?></p><br>
      
      <!--<label>
        Дата оформления:
      </label>-->
      <input name="creation_date" type="datetime-local" value="<?php ?>" required placeholder="дата оформления" readonly hidden> <br>
      
      <label>
        Комментарий:
      </label>
      <input name="comment" type="text" value="<?php ?>"  placeholder="введите комментарий"> <br>
      
      <!--<label>
        Общая сумма заказа:
      </label>-->
      <p name="price" value="<?php $sum ?>" required placeholder="" readonly hidden><?php $sum?> </p><br>
      
      <button class="order_creat" >оформить заказ<!--<a href="order_placed.php"></a>--></button>
    </form>
    
  </div>
  
 
  <div class="href">
    <button class="href_index_btn"><a class="href_index" href="index.php"> Продолжить покупки</a> </button><br>
    <button class="href_cart_btn"><a class="href_cart" href="cart.php"> Вернуться в коризу</a> </button><br>
  </div>
  
  <?php

  ?>
  </div>
<?php
include "footer.php"; ?>
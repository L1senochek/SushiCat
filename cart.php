<?php
session_start();
include "header.php";

include"data_base.php";
//include"resource/CSS/header.css";
$title = "Корзина";
$style = "resource/CSS/header.css";
//$script = "resource/javascript/index.js";
?>
<div class="bgc_cart">
<div class="cart"> Корзина: </div> 

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
    
    /*$count = $cart_list[$key[$i]];
    $sum = $sum + $dishes['price'] * $dishes['count'];*/
  
  //print_r($cart_list);
  ?>
  
  

  
  <div class="cart_main">
    <div class="cart_image">
      <image src="resource/dishes/<?=$dishes['image']?>" width=150></image>
    </div>
    <div class="cart_dishes_name">
      <p ><?=$dishes['dish_name']?></p>
    </div>
    <div class="cart_dishes_price">
      <p ><?=$dishes['price']?> руб</p>
    </div>
    <div class="cart_dishes_price_count">
      <p > количество: <?php echo $cart_list[ $dishes['id'] ] ?> шт <?php//$dishes['price']*$dishes['count']?></p>
    </div>
    <div class="quantity_control">
      <form action="add_product_in_cart.php" method="get">
        <button class="cart_add" name="add" value=<?=$dishes['id']?>>+</button>
      </form>
      <form action="delete_item_in_cart.php" method="get">
        <button class="cart_delete" name="delete" value=<?=$dishes['id']?>>-</button>
      </form>
    </div>
    
  </div>
  <?php
  $sum = $sum + ($cart_list[ $dishes['id'] ])*$dishes['price'];
  endwhile;
   
  
  ?>
  <div class="sum">
    сумма: <?php echo $sum ?> руб
  </div>
  <div class="href">
    <button class="href_index_btn"><a class="href_index" href="index.php"> продолжить покупки </a> <imgage src="resource/emblems/cat4.jpg" width="100px" height="100px"></imgage></button><br>
    <button class="href_order_creation_btn"><a class="href_order_creation" href="order_creation.php"><imgage src="resource/emblems/cat5.jpg"></imgage> оформить заказ </a></button>
  </div>
  
  </div>

<?php
include "footer.php"; ?>
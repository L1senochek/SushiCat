<?php
session_start();
include "header.php";
include"data_base.php";

?>
<div class="order_creation_obr">
<?php
  
  $cart_list = $_SESSION['cart_list']; //массив из сессии
  $key = array_keys($cart_list); //Возвращает все или некоторое подмножество ключей массива
  $id = implode(", ", $key); //Объединяет элементы массива в строку
  $sql = " SELECT * FROM dishes WHERE id IN ($id)";
  $result = $data_base->query($sql);
  while( $dishes = $result->fetch_assoc() ):
    $dish_name = $dishes['dish_name'];
    $price= $dishes['price'];
    $count = $cart_list[$dishes['id']];
      
    $sum = $sum + $count*$price;
    $order_composition = $order_composition.$dishes['dish_name']." ".$cart_list[$dishes['id']]." шт".", ";
    endwhile;
     
    
    $order_composition = substr($order_composition,0,-2);
    //print_r($order_composition); 
//--------------------------------------------------------------------------  

  $name_user = $_POST['name_user'];
  $lastname_user = $_POST['lastname_user'];
  $phone_user = $_POST['phone_user'];
  $adress = $_POST['adress'];
  //$order_composition = $order_composition;
  $creation_date =  date("Y-m-d H:i:s");  
  $comment = $_POST['comment'];
  $price = $sum;
  
  //INSERT INTO orders (name_user,	lastname_user,	phone_user,	adress,	order_composition,	creation_date,	comment) VALUES ('Bob', 'Bobov', 89005554444, 'Bobovskaya, 234, 32', 'test', '2001-12-01-00:00:00', 'wfw')
  
  $sql = "INSERT INTO orders (name_user,	lastname_user,	phone_user,	adress,	order_composition,	creation_date,	comment, price) VALUES ('$name_user', '$lastname_user', $phone_user, '$adress', '$order_composition', '$creation_date', '$comment', '$price')";
  
  //print_r($sql);
  $result = $data_base->query($sql);
  //print_r($sql);
  if($result == true){
  echo "<div class='order_creation'>
          <p class='order_creation_text'>Заказ успешно оформлен! С Вами скоро свяжутся, ждите!</p>
          <image src='resource/emblems/cooking.jpg'></image>
        </div>";
} else {
  
  echo "<p class='order_dont_creation' >Заказ не оформлен! Заполните обязательные поля!</p>";
  header("location: order_creation.php");
}

?>
</div>
<?php
include "footer.php"; ?>
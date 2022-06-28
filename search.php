<?php
include "data_base.php";
include "header.php";
$style = "resource/CSS/header.css";
$request = $_POST["search_dishes_input"];
?>

<div class="search-container">
<?php
$sql = "SELECT * FROM dishes WHERE dish_name OR ingredients LIKE '%$request%' ORDER BY `dish_name` OR `ingredients`";
$result = $data_base->query( $sql );
while( $dishes = $result->fetch_assoc() ){ ?>
     <div class="search-result">
      <!--<a href="dishes?id=<?php//$dishes['id']?>">-->
        
        <div class="search-image">
          <image src="resource/dishes/<?=$dishes['image']?>" width=250 height="250px"></image>
        </div>
        <p class="search-dishes"><?=$dishes['dish_name']?></p>
        <div class="search-ingredients"><?=$dishes['ingredients']?></div>
        <div class="search_dishes-weight" width=250><?=$dishes['weight']?> г</div>
        <div class="search_price" width=250><?=$dishes['price']?> руб</div>
      
      <button class="product_link">
          <a class="product_link_with_id" data-id="<?php echo $dishes['id']?>">
            добавить
          </a>
        </button>
    </div>
  
  <?php
       if($dishes == true){
     } else {
       echo "<p class='order_dont_creation' >Блюдо не найдено!</p>";
     }
       /*if(empty($cart_list)){
         echo '<div class="cart_empty"> Корзина пустая <br>
           <image src="resource/emblems/cart_empty.jpg"></image>
         </div> ';
       }*/
     };
   ?>
</div>
<script src="resource/javascript/main.js"></script>
<?php
include "footer.php"; ?>

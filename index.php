<?php
session_start();
  $title = "Главная";
  $style = "resource/CSS/index.css";
  $script = "resource/javascript/index.js";
  include "header.php";
  include "data_base.php";
  
  $category_id = $_GET['category_id'];
  
  $sql = "SELECT * FROM category_menu";
  
  if( isset($category_id) ) {
    $sql = "$sql WHERE id = $category_id";
    $list[] = "<li><a class='href_category' href='index.php'> меню </a></li>";
    $class = 'class=breadcrumbs';
  } 
  $result = $data_base->query( $sql );
  
  while( $category = $result->fetch_assoc() ){
    $id = $category["id"];
    $name = $category["name"];
    $list[] = "<li><a class='href_category' href='index.php?category_id=$id' $class>$name</a></li>";
  }
  
  $ul = implode(" / ", $list);
  echo "<ul class='category'>$ul</ul>";
   
?>
<?php 
          //---------------------проверяю, заданна ли $_SESSION['cart_list']
        /* if(isset($_SESSION['cart_list'])){ //если существует cart_list
            echo count($_SESSION['cart_list']); //то добавляем значение count($_SESSION['cart_list'])
          }*/
          //print_r($_SESSION['cart_list'])
          ?>

<div class="dishes-container">
<?php
  
  $sql = "SELECT id, dish_name, ingredients, image, price, weight FROM dishes";
  
  if( isset($category_id) ) {
    $sql = "$sql WHERE category_id = $category_id";
  } 
  
  $result = $data_base->query( $sql );
  
  while( $dishes = $result->fetch_assoc() ){  ?>
    <div class="dishes" >
      <div class="border-dishes">
        <div class="dishes-image">
          <image src="resource/dishes/<?=$dishes['image']?>" width="280px" height="300px"></image>
        </div>
        <p class="dishes-name" ><?=$dishes['dish_name']?></p>
        <div class="dishes-ingredients" ><?=$dishes['ingredients']?></div>
        <div class="dishes-weight" ><?=$dishes['weight']?> г</div>
        <div class="price" ><?=$dishes['price']?> руб</div>
        <div  id-dishes="<?=$dishes['id']?>"></div>
        <!--<button class="add-items" id="addCart_{$dishes['id']}" href"#" onclick="addToCart({$dishes['id']}); return false;" alt="Добавить">Добавить</button>-->
        <!-- "<a href='add_cart_item.php?id=$dishes[id]'>Добавить</a>" -->
        <!--<button class="remove-items" >-</button>-->
         <button class="product_link">
          <a class="product_link_with_id" data-id="<?php echo $dishes['id']?>">
            добавить
          </a>
        </button>
       <!-- <a data-id="<?php// echo $dishes['id']?>">
          добавить
        </a>--><!--<a href="cart.php?dishes['id']=<?php// echo dished['id']?>">добавить</a>-->
      </div> 
    </div>
  
<?php
  
  //print_r($_SESSION['cart_list']);

  }?>
  
  <!--data-* Глобальные атрибуты образуют класс атрибутов, называемых пользовательскими атрибутами данных, которые позволяют обмениваться проприетарной информацией между HTML и его представлением DOM посредством сценариев.
  -->
  
  <!--<sript src="/resource/javascript/basket.js"></sript>-->
<?php
/*include "cart.php";*/
include "footer.php"; ?>

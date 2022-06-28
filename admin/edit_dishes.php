<?php
session_start();
$title = "Внесение новых блюд";
$style = "css/new_dished.css";
include"header.php";
$user = $_SESSION['user'];

echo "<a href='account.php'><button> Назад  </button></a>";
echo "<a href='new_category.php'><button> Редактирование категорий блюд </button></a>";
echo "<a href='new_dishes.php'><button> Внесение новых блюд </button></a>";



include"data_base.php";

$sql = "SELECT * FROM category_menu";
$result = $data_base->query( $sql );
//echo($result_category);
?>

<div class="delete dishes">
  <form action="delete_dishes_obr.php" class="delete">
    <p>
      <label> Введите номер id товара, который хотите удалить: <br>
        <textarea name="id_delete" maxlength="10" required t> </textarea>  
      </label>
  </p>
  <button> Внести изменения </button>
  </form>
  <?php
  
?>
</div>
-------------------------------------------------------------------------
<?php

include"data_base.php";
$sql = "SELECT * FROM dishes";
$result = $data_base->query( $sql );
$arr = $result->fetch_assoc();

echo "<table border=2 cellspacing=0>";
  thead($arr);
  while($arr){
    tbody($arr);
    $arr = $result->fetch_assoc();
  } //Извлекает результирующий ряд в виде ассоциативного массива
  
  echo "</table>";

function thead( $arr ){
  echo "<tr>";
    foreach( $arr as $key => $value) {
      echo "<th> $key </th>";
    }
  echo "</tr>";
}

function tbody( $arr ){
  echo "<tr>";
    foreach( $arr as  $value) {
      echo "<td> $value </td>";
    }
  echo "</tr>";
}


?>
<br>-------------------------------------------------------------------------


<?php
      $sql = 
      query('SELECT dish_name, ingredients, image, category_id, price, weight FROM dishes');
       $result = $data_base->query( $sql );
      while ($result = $data_base->fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['id']}</td>" .
             "<td>{$result['dish_name']}</td>" .
             "<td>{$result['ingredients']}</td>" .
             "<td>{$result['image_dished']}</td>" .
             "<td>{$result['category_id']}</td>" .
             "<td>{$result['price']} р</td>" .
             "<td>{$result['weight']}</td>" .
             "<td><a href='?id={$result['id']}'>Изменить</a></td>" .
             '</tr>';
      }
    ?>
  
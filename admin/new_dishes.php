<?php
session_start();
$title = "Внесение новых блюд";
$style = "css/new_dished.css";
include"header.php";
$user = $_SESSION['user'];

echo "<a href='account.php'><button> Назад  </button></a>";
echo "<a href='new_category.php'><button> Редактирование категорий блюд </button></a>";
echo "<a href='edit_dishes.php'><button> Удаление блюд </button></a>";
include"data_base.php";
echo("<br></br><div class='text_for_admin'> Внесение новых блюд:</div>");
echo "<a href='orders_dishes.php'><button> Просмотр заказов </button></a>";

$sql = "SELECT * FROM category_menu";
$result = $data_base->query( $sql );
//echo($result_category);
?>
<div class="new_dishes_bgc">
  <form class="new_dishes_bgc_form" action="new_dishes_obr.php" method="post" enctype="multipart/form-data" >    
    <p>
        <label> Выберите категорию <br>
          <select name="select_category_menu" required>
    <?php /* выводим в документ список категорий */
          while( $category = $result->fetch_assoc() ){
            $id = $category["id"];
            $name = $category["name"];
            echo "<option value='$id'> $name </option>";
          }                   
    ?>
          </select>
        </label>
      </p>   
    <p>
      <label> Название блюда: <br>
        <textarea name="dish_name" maxlength="150" required></textarea>
      </label>
    </p>   
    <p>
      <label> Состав: <br>
        <textarea name="ingredients" maxlength="1000" required></textarea>
      </label>
    </p>   
    <p>
      <input type="file" accept="image_dished/*" name="image" required>
    </p>   
    <p>
      <label> Вес: <br>
        <textarea name="weight" maxlength="10" required> </textarea>  г
      </label>
    </p>  
    <p>
      <label> Цена: <br>
        <textarea name="price" maxlength="10" required> </textarea>  руб
      </label>
    </p>
    <button> Загрузить </button>    
  </form>
</div>
<?php
 

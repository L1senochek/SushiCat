<?php
session_start();
$title = "Внесение новых блюд";
$style = "css/new_dished.css";
include"header.php";
$user = $_SESSION['user'];

echo "<a href='account.php'><button> Назад  </button></a>";
echo "<a href='new_dishes.php'><button> Внесение новых блюд </button></a>";
echo "<a href='edit_dishes.php'><button> Удаление блюд </button></a>";

echo("<br></br><div class='text_for_admin'> Редактирование категорий блюд</div>");
echo "<a href='orders_dishes.php'><button> Просмотр заказов </button></a>";

include"data_base.php";
$sql = "SELECT * FROM category_menu";
$result = $data_base->query( $sql );
$arr = $result->fetch_assoc();

echo "<table border=2 cellspacing=0>";
  thead( $arr );
  while( $arr  ){
    tbody( $arr );
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

<form action="new_category_obr.php" class="update" method="post" enctype="multipart/form-data" >
  <p>
    <label> Введите название категории, которую хотите изменить <br>
      <textarea name="category" maxlength="100" required></textarea>
    </label>
  </p>
  <p>
    <label> Введите id категории, которую хотите изменить <br>
      <textarea name="category_id" maxlength="2" required></textarea>
    </label>
  </p>
  <button> Загрузить </button>
</form>

<?php

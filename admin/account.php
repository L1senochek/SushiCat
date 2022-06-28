<?php
session_start();
$title = "Личный кабинет";
$style = "css/account.css";
include"header.php";

$user = $_SESSION['user']; // из сессии получаем массив с данными о пользователе или null

if( empty($user) ) { //если $user пустой это значит что пользователь не авторизовывался
  exit('Для доступа в личный кабинет, необходимо авторизоваться');
}
if( isset($user['id_manager']) ) {
  echo "<a href='new_dishes.php'><button> Внесение новых блюд </button></a>";
  echo "<a href='new_category.php'><button> Редактирование категорий блюд</button></a>";
  echo "<a href='edit_dishes.php'><button> Удаление блюд </button></a>";
  echo "<a href='orders_dishes.php'><button> Просмотр заказов </button></a>";
}
?>
<?php
echo("<br></br><div class='hello_text_for_admin'> Вы вошли от имени администратора!</div>");

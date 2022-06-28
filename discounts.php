<?php
session_start();
include "header.php";

include"data_base.php";
$title = "Корзина";
$style = "resource/CSS/header.css";
?>
<div class="sales_main">
<div class="sales">
  <br>
  Самовывоз и заказы с собой с повышенной скидкой для всех!

  Без QR-кода, без вопросов, без проблем, 25%! Сделайте заказ online (на сайте или в приложениях) или в ресторане и заберите его в любом удобном ресторане "SUSHICAT" со скидкой 25%.

  Акция не суммируется с другими скидками и специальными предложениями компании. Минимальная сумма заказа - 990 рублей. 
  <image class="sales_img" src="resource/emblems/advertising_sushi_cat.jpg"></image>
  
</div>
</div>

<?php
include "footer.php";
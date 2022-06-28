<?php
$title = "Главная";
  $style = "resource/CSS/index.css";
  include "header.php";
  include "data_base.php";
  
?>  
  <div class="block_map">
  <div class= "map" id="map" >
  
  <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
<script type="text/javascript">
  let myMap;
  ymaps.ready(init); // Ожидание загрузки API с сервера Яндекса
  function init () {
    myMap = new ymaps.Map("map", {
      center: [55.76, 37.64], // Координаты центра карты
      zoom: 10 // Zoom
    });
  }
</script>
  </div>
  <div class="info">
    Доставка суши — онлайн сервис заказа суши и других блюд в Москве.
    
    Прием заказов: c 10:00 до 4:45<img src="resource/emblems/advertising_sushi_cat.jpg" width=300px>
  </div>
  </div>
<?php
  

  include "footer.php";
  
  ?><!--
<sript src="basket_test.js"></sript> -->
$(function(){
  //alert(123); //проверка
  //const link_with_id = document.querySelector('.product_link_with_id') //на js
  const link_with_id = $('.product_link_with_id'); //product_link_with_id селектор $ - это просто функция
  
  const cart_value = $("#cart_count"); //обращаюсь к cart_count в корзине элемент  
  //let counter = 1;
  
  //console.log(link_with_id);
  //если на js через for 
  
  $('.product_link_with_id').click(function(){
    let current_id = $(this).attr('data-id'); //(this).attr() -обращение к атрибуту data-id
    //cart_value.html(counter++); //.html()перезаписывает html разметку
    
    $.post("add_item_in_cart.php", { "dishes_id": current_id}) //jquery post //из файла апи dishes_id : текущий айди товара
    .done(function(data){ //Callback функция обратного вызова
    //alert("Data Loaded: " + data);
    cart_value.html(data); //data -ответ, перезаписываю то что пришло с api.php
    }) 
  });  
});

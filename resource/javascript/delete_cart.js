$(function(){
  
  $('.cart_delete').click(function(){
    let current_id = $(this).attr('data-id');
    cart_value.html(counter++); //.html()перезаписывает html разметку
    
    $.get("delete_item_in_cart.php", { "dishes_id": current_id})
    
    .done(function(data){ //Callback функция обратного вызова
    //alert("Data Loaded: " + data);
    cart_value.html(data); //data -ответ, перезаписываю то что пришло с api.php
    })
  });
  
});
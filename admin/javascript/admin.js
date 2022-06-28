let form_auth_admin = document.querySelector("form[action='admin_obr.php']");

form_auth_admin.addEventListener("submit", async function(event){ //регистрирует определённый обработчик события, вызванного на EventTarget. //При отправке формы срабатывает событие submit, оно обычно используется для проверки (валидации) формы перед её отправкой на сервер или для предотвращения отправки и обработки её с помощью JavaScript.
  event.preventDefault(); // отменяем отправку формы
  let fd = new FormData( this ); //this ссылка на тот объект, который привязан к обработчику
  let options = {
    method: "POST", //метод отправки
    body: fd //данные отправки 
  };


//ассинхронный запрос - запрос улетает, а сам скрипт продолжает работать  
  
  
  //встроенная функция fetch отправляет ассинхронный запрос на сервер
  let response = await fetch(this.action, options); //1 аргумент url, 2 аргумент объект с настройками //Ключевое слово await заставит интерпретатор JavaScript ждать до тех пор, пока промис справа от await не выполнится.
  let text = await response.text(); // получаем ответ от сервера в виде текста
  if(text == "Авторизация прошла успешно"){
    alert(text);
    location.href = "account.php";
    
  }else{
    alert(text);
  }
});





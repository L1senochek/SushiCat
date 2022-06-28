<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$style?>">
  <script src="<?=$script?>" defer></script>
  <style>
    body{
      min-height: 100vh;
      display: flex;
      flex-direction: column;     
    }
    main{
      flex-grow: 1;
      margin: 15px 0px;
    }
    header{
      height: 100px;
      background-color: #0089f2;
    }
    header{
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0px 20px;
    }
    header>.rigth li{
      display: inline;
      margin: 0px 5px;
    }
  </style>
</head>
<body>
  <header>
    <!--Шапка-->
    <nav class="left">
    </nav>
    <nav class="rigth">
      <?php if(isset($_SESSION["user"])) : ?>
        <a href="account.php"><button> личный кабинет </button></a>
        <a href='exit.php'>
          <button> выход </button>
        </a>
      <?php else : ?>
        <a href="admin.php"><button> вход</button> </a>       
      <?php endif ?>    
    </nav>
  </header>
  <main>

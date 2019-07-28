<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>demug</title>
  <link rel="icon" href="favicon.png" type="image/png" sizes="16x16">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="cart.php" class="visible-xs cart-mobile">
          <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
        </a>
        <a class="navbar-brand" href="index.php">
          <img src="img/demug-logo-yellow.png" alt="">
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="categoria.php">Canecas</a></li>
          <li><a href="categoria.php">Squeeze</a></li>
          <li><a href="categoria.php">Quadros</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php 
              if(isset($_SESSION['nome-usuario'])){
            ?>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Olá <?php echo $_SESSION['nome-usuario']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">sair</a></li>
                </ul>
              </li>
            <?php
              }else{
                echo "<li><a href='login.php'>Login</a></li>";
              }
            ?>
          </li>
          <li class="hidden-xs"><a href="cart.php">
          <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
        </a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

<?php session_start(); ?>
<?php include('header.php') ?>
<div class="container">
    <h1>Olá <?php echo isset($_SESSION['nome-usuario'])? $_SESSION['nome-usuario']: ''; ?></h1>
    <img src="img/fotoUsuario/" alt="">
    <h2>Cadastro realizado com sucesso!</h2>
</div>
<?php include('footer.php') ?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="styles/cadlog.css">
   <title>Cadastro de usuário</title>
</head>
<body> 
<?php
include("conexao.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='loginadm.php';</script>";  
}
else {
    include("session.php");
}
?>
   <div class="container">
      <img class="logoimg" src="img/logoiec.png" >
    <form action="cadastroBackend.php" method="POST">
     <div class="formulario2">
     <h2>Cadastre um novo Administrador</h2>
      <input type="text" name="nome" class="nome" placeholder="Digite seu nome completo" required> 
        <input type="text" name="usuario" class="usu" placeholder="Digite seu usuário" required> 
        <input type="password" name="senha" class="senha"  placeholder="Digite sua senha" required>
     <button type="submit" class="btnlog">Cadastrar</button>
    </form>
   </div>
   </div>
</body>
</html>
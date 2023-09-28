<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="styles/EditEsc.css">
   <title>Verificação de login</title>
</head>
<body>

<?php
include("conexao.php");
session_start();
$logged = $_SESSION['logged'];
$login = $_SESSION['usuario'];
$verificar = mysqli_query($conn, "SELECT SuperADM FROM usuarios WHERE usuario = '$login' AND SuperADM = 'sim'");
if(mysqli_num_rows($verificar)<=0){
    $superADM = 'nao';
}
else {
    $superADM = 'sim';
}


if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='loginadm.php';</script>";  
}
else {
    include("session.php");
}

?>

<div class="container">
    <div class="header">
        <div class="back">
             <a href="adm.php" class="icon"><i class="fa-solid fa-circle-arrow-left"></i></a>
        </div>
        
    </div>
    <div class="conteudo">
        
    </div>
</div>
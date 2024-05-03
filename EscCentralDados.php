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
        <div class="for">
            <h1>Central de alterações </h1> 
        </div>

        <div class="logout">
        </div>
    </div>
        

        <div class="conteudo">
            <script>
            function executaAcao(){
            window.location = "verificaEstoque.php";
            }
            </script>
            <div class="btnEstoque efeito" onclick="executaAcao()" >
             <div class="img1">
               <i class="fa-solid fa-cubes-stacked"></i>
             </div>
             <br><br>
              <p>Conferir ações do estoque</p>
              </div>
            <script>
            function executaAcao1(){
            window.location = "verificaTarefas.php";
            }
            </script>
                 <div class="btnTarefas efeito" onclick="executaAcao1()"> 
                 <div class="img2">
                    <i class="fa-solid fa-list-check"></i>
                 </div>
                 <br><br>
              <p>Conferir ações das tarefas</p>
                </div>
            <script>
            function executaAcao2(){
            window.location = "verificaLogs.php";
            }
            </script>
                <div class="btnAcao efeito" onclick="executaAcao2()">
                <div class="img3">
                 <i class="fa-solid fa-network-wired"></i>
                 </div>
                 <br><br>
               <p>Conferir ações da intranet</p>
                </div>
        
        </div>
     
</div>

</body> 

</html>
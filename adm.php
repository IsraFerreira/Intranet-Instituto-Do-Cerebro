<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="styles/stylesAdm.css">
   <title>Área Administrativa</title>
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

<script src="https://kit.fontawesome.com/baa307742c.js" crossorigin="anonymous"></script>
<div class="container">
    <div class="header">
        <div class="ultimaMd">
                <?php
                $sql = "Select usuario, acao, datahora from logs ORDER BY id DESC LIMIT 1";
                $sql2 = mysqli_query($conn, "$sql");
                
                while ($registro = mysqli_fetch_array($sql2)) {
                    $usuario = $registro['usuario'];
                    $acao = $registro['acao'];
                    $datahora = $registro['datahora'];
                    echo "<p> $usuario $acao às $datahora </p>";

                }
                ?>
        </div>
        
    </div>
       
    <div class="altera">
        <a href="usuarioEdit.php" class="area1 efeito"> <i class="fa-solid fa-user"></i><br>Gerenciar Usuarios</a>
        <a href="info.php" class="area2 efeito"><i class="fa-solid fa-land-mine-on"></i><br>Informações</a>
        <a href="upload.php" class="area3 efeito"><i class="fa-solid fa-panorama"></i><br>Slider</a>
        <a href="visualizarPags.php" class="area4 efeito"><i class="fa-solid fa-copy"></i><br>Editar páginas</a>
        <a href="http://172.16.3.38/Sistemas-Integrados/login.html" class="area5 efeito"><i class="fa-solid fa-sitemap"></i><br>Sistemas Integrados</a>
        <a href="http://172.16.3.38/Sistemas-Integrados/ocorrencias/visualizarOcorrencias.php" class="area6 efeito"><i class="fa-solid fa-list-check"></i><br>Tarefas</a>
        <a href="http://intranet.iec.net/estoque/visualizar.php" class="area7 efeito"><i class="fa-solid fa-boxes-stacked"></i><br>Estoque</a>
        <a href="teste3" class="area8 efeito"><i class="fa-solid fa-clock"></i><br>Em Breve</a>
        <a href="teste4" class="area9 efeito"><i class="fa-solid fa-clock"></i><br>Em Breve</a>
        <a href="teste5" class="area10 efeito"><i class="fa-solid fa-clock"></i><br>Em Breve</a>
        <a href="EscCentralDados.php" class="area11 efeito"><i class="fa-solid fa-globe"></i><br>Controle de alterações</a>
        <a href="index.php" class="area12 efeito"><i class="fa-solid fa-house"></i><br>Retornar Intranet</a>
            
    </div>
    <div class="footer">
            <h1> Faça as alterações com sabedoria e que a força esteja com você</h1>
    </div>



</div>
</body>


</html>
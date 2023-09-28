<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="styles/Editusu.css">
   <title>Usuários</title>
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
        <div class="ad">
            <h1>Gerenciador de usuários </h1><br>
            <a href='cadastro.php' class='cadastrar'>Adicione usuário<i class='fa-solid fa-user-plus'></i></a>
        </div>

        <div class="logout">

        </div>
    </div>

    <div class="tabela">
    <?php
        if($superADM == 'sim'){
        echo "<table class='tabelaUsuarios'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>usuários</th>";
        echo "<th>Ações</th>";
        echo "<th>Super ADM</th>";
        echo "</tr>";
        } else {
        echo "<table class='tabelaUsuarios'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>usuários</th>";
        echo "</tr>";
        }


            $sql = "SELECT * from usuarios";
            $todos = mysqli_query($conn, "$sql");
            $totalregistros = mysqli_num_rows($todos);

            $resultado = mysqli_query($conn, "$sql") or die ("Erro ao tentar cadastrar registro");

            $numero = 1;
            $usuario = [];

            while ($registro = mysqli_fetch_array($resultado)) {
                $id = $registro['id']; 
                $usuario = $registro['usuario'];
                $super = $registro['SuperADM'];
                echo "<tr>";
                echo "<td>".$id."</td>";
                echo "<td> ".$usuario."</td>";
                if($superADM == 'sim'){
                echo "<td><a href='acoes/apagarUsuario.php?id=".$id."'><i class='fa-solid fa-trash' id='icone'></i></a></td>";   
                    if($super == 'sim'){
                    echo "<td>Sim</td>";    
                    }
                    else {
                    echo "<td><a href='acoes/tornarSuperADM.php?id=".$id."&usuario=".$usuario."'>Tornar Super ADM</a></td>";
                    }
                }
                else {
                }
                echo "</tr>";
                $numero += 1;
           }

           mysqli_close($conn);
           echo "</table>";
          ?>
    </div>

</div>
</body> 

</html>
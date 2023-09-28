<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="styles/EditSlider.css">
   <title>Edição slider</title>
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
    <div class="up">
    <a href="adm.php" class="icon"><i class="fa-solid fa-circle-arrow-left"></i></a>
    <div class="upload">
        <h1>Upload de Imagens</h1>
        <form action="upload2.php" method="POST" enctype="multipart/form-data">
            Arquivo: <input type="file" required name="arquivo">
            <input type="submit" value="Salvar">
        </form>
        <div class="logout">

        </div> 
    </div>
    </div>

    <div class="edit">

        <?php
        echo "<table class='tabelaSlides'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Imagem</th>";
        echo "<th>Ações</th>";
        echo "</tr>";


            $sql = "SELECT * from slider";
            $todos = mysqli_query($conn, "$sql");
            $totalregistros = mysqli_num_rows($todos);

            $resultado = mysqli_query($conn, "$sql") or die ("Erro ao tentar cadastrar registro");

            $numero = 1;
            $imagens = [];

            while ($registro = mysqli_fetch_array($resultado)) {
                $id = $registro['id']; 
                $arquivo = $registro['arquivo'];
                $imagens[$numero] = $arquivo;
                echo "<tr>";
                echo "<td>".$id."</td>";
                echo "<td><img src='uploads/$imagens[$numero]' class='imagemSlides' alt='Imagem $numero'></td>";
                echo "<td><a href='acoes/apagarSlide.php?id=".$id."'><i class='fa-solid fa-trash' id='icone'></i></td>";
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
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="../styles/excluipg.css">
   <title>Excluir Informação</title>
</head>
<body> 
<?php
include("../conexao.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='loginadm.php';</script>";  
}
else {
    include("../session.php");
}

$id = $_GET['id'];

$query = "SELECT * from avisos WHERE id=$id";
$todos = mysqli_query($conn, "$query");
$totalregistros = mysqli_num_rows($todos);

$resultado = mysqli_query($conn, "$query") or die ("Erro ao tentar excluir registro");

while ($registro = mysqli_fetch_array($resultado)) {
    $id = $registro['id']; 
    $nome = $registro['nome'];
    $conteudo = $registro['conteudo'];
}

?>
  <div class="back">
             <a href="../info.php" class="icon"><i class="fa-solid fa-circle-arrow-left"></i></a>
        </div>
   <div class="container">
        <h1>Você tem certeza que deseja excluir está informação?</h1>
    <div class="bloco">

      <P>Autor da informação:<input type="text" name="nome" class="nomep" value="<?php echo $nome; ?>" readonly> <br>
      <p>Conteúdo da informação</p>
      <textarea type="textarea" name="conteudo" rows="15" class="conteudo" readonly><?php echo $conteudo; ?></textarea> <br>
   </div>
      <div class="conteudo">
      
      <h2> após ser excluída, a informação não poderá ser resgatada<h2>
        <h3>Deseja continuar?</h3>
        
      <?php
              echo "<a href='apagarInfo.php?id=".$id."' class='excluir'>Sim, excluir está informação</a>";
              echo "<a href='../info.php?id=".$id."' class='cancelar'>Não, cancelar</a>";
        ?>
        </div>
  
  </div>
</body>
</html>
      
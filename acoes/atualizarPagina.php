<?php 
include("../conexao.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='../loginadm.html';</script>";  
}
else {
    include("../session.php");
}


 

$ip = $_SERVER['REMOTE_ADDR']; 
$acao = "atualizou uma página";
$login = $_SESSION['usuario'];


$log = "INSERT INTO logs(usuario, ip, acao, datahora) VALUES ('$login', '$ip', '$acao', NOW())";
$log2 = mysqli_query($conn, $log);


$id = $_POST['id'];
$nomeP = $_POST['pagina'];
$conteudo = $_POST['conteudo'];

        $query = "UPDATE paginas SET nomedaPag = '$nomeP', conteudoPag = '$conteudo' WHERE id='$id'";
        $insert = mysqli_query($conn, $query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Página atualizada com sucesso!');window.location.href='../visualizarPags.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível atualizar esta página');window.location.href='visualizarPags.php'</script>";
        }

?>
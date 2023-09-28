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

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
 

$ip = $_SERVER['REMOTE_ADDR']; 
$acao = "adicionou uma nova página";
$login = $_SESSION['usuario'];


$log = "INSERT INTO logs(usuario, ip, acao, datahora) VALUES ('$login', '$ip', '$acao', NOW())";
$log2 = mysqli_query($conn, $log);



$nomeP = $_POST['pagina'];
$conteudo = $_POST['conteudo'];

        $query = "INSERT INTO paginas (nomedaPag, conteudoPag) VALUES ('$nomeP', '$conteudo')";
        $insert = mysqli_query($conn, $query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Página criada  com sucesso!');window.location.href='../visualizarPags.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível criar esta página');window.location.href='../visualizarPags.php'</script>";
        }

?>
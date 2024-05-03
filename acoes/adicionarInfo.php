<?php 
include("../conexao.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='login.html';</script>";  
}
else {
    include("../session.php");
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
 

$ip = $_SERVER['REMOTE_ADDR']; 
$acao = "adicionou uma nova informação";
$login = $_SESSION['usuario'];


$log = "INSERT INTO logs(usuario, ip, acao, datahora) VALUES ('$login', '$ip', '$acao', NOW())";
$log2 = mysqli_query($conn, $log);


$nome = $_POST['nome'];
$conteudo = $_POST['conteudo'];
$chaveAtivo = $_POST['chaveAtivo'];
$ordem = $_POST['ordem'];

$query = "INSERT INTO avisos (nome, conteudo, chaveAtivo, ordemAparicao) VALUES ('$nome', '$conteudo', '$chaveAtivo', '$ordem')";
        $insert = mysqli_query($conn, $query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('informação criada  com sucesso!');window.location.href='../info.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível criar esta informação');window.location.href='../info.php'</script>";
        }

?>
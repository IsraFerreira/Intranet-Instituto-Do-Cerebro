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
$data = date('Y-m-d H:i:s'); 
$acao = "excluiu uma informação";
$login = $_SESSION['usuario'];

$log = "INSERT INTO logs(usuario, ip, acao, datahora) VALUES ('$login', '$ip', '$acao', NOW())";
$log2 = mysqli_query($conn, $log);



$result = "DELETE FROM avisos WHERE id='$id'";
$resultado = mysqli_query($conn, $result);

if(mysqli_connect_errno()){
	 echo "Falha na conexão com o banco de dados";
}else{
    echo "<h3>Informação Deletada</h3>";
}

header("Location:../info.php");
?>
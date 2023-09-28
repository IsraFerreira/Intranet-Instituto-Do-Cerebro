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
$usuario = filter_input(INPUT_GET, 'usuario', FILTER_SANITIZE_STRING);

$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do usuário
$acao = "tornou o usuario ".$usuario." Super Adm";
$login = $_SESSION['usuario'];

// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(usuario, ip, acao, datahora) VALUES ('$login', '$ip', '$acao', NOW())";
$log2 = mysqli_query($conn, $log);


$result = "UPDATE usuarios SET SuperADM = 'sim' WHERE id='$id'";
$resultado = mysqli_query($conn, $result);

if(mysqli_connect_errno()){
	 echo "Falha na conexão com o banco de dados";
}else{
    echo "<h3>Usuário agora é Super ADM</h3>";
}




header("Location:../usuarioEdit.php");
?>
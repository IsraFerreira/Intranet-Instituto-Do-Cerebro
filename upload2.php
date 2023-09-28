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

$msg = false;


$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do usuário
$data = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
$acao = "adicionou um slide";
$login = $_SESSION['usuario'];

// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(usuario, ip, acao, datahora) VALUES ('$login', '$ip', '$acao', NOW())";
$log2 = mysqli_query($conn, $log);



if(isset($_FILES['arquivo'])){
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "uploads/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    $sql_code = "INSERT INTO slider (arquivo, data) VALUES('$novo_nome', NOW())";

    $enviar = mysqli_query($conn, $sql_code);



    header('Location:upload.php');
}

?>
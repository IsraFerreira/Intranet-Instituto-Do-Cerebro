<?php 
include("conexao.php");
session_start();
$logged = $_SESSION['logged'];

if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='login.html';</script>";  
}
 

$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do usuário
$acao = "adicionou usuario";
$login = $_SESSION['usuario'];

// Monta a query para inserir o log no sistema
$log = "INSERT INTO logs(usuario, ip, acao, datahora) VALUES ('$login', '$ip', '$acao', NOW())";
$log2 = mysqli_query($conn, $log);



$nome = $_POST['nome'];
$user = $_POST['usuario'];
$senhaUser = MD5($_POST['senha']);
// $connect = mysqli_connect($servidor, $usuario, $senha);
// $db = mysql_select_db($dbname);
$query_select = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
$select = mysqli_query($conn, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['usuario'];
 
  if($user == "" || $user == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.php';</script>";
 
    }else{
      if($logarray == $user){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.php';</script>";
        die();
 
      }else{
        $query = "INSERT INTO usuarios (usuario, senha, nome) VALUES ('$user', '$senhaUser', '$nome')";
        $insert = mysqli_query($conn, $query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='usuarioEdit.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.php'</script>";
        }
      }
    }
?>
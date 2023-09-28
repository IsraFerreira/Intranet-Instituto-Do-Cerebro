<?php  
session_start();
include("conexao.php");
$_SESSION['logged'] = false;

$login = $_POST['usuario'];
$senhaUser = md5($_POST['senha']);
$btn = $_POST['btn'];

    if (isset($btn)) {
      $verifica = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '$login' AND senha = '$senhaUser'") or die("erro ao selecionar");
        if(mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos<?php echo $login, $senhaUser; ?>');window.location.href='loginadm.php';</script>";
          die();
        } else {
          setcookie("usuario", $login);
		  


$_SESSION['usuario'] = $login;
$_SESSION['senha'] = $senhaUser;
$_SESSION['logged'] = true;






        header('Location:adm.php?usuario='.$login);
        }
    }
?>
<?php  
$servidor = "localhost";
$usuario = "root";
$senha = "iec@123";
$dbname = "intranet";

//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);


if(!$conn){
    die("Conexão falhou: ".msqli_connect_error());
}
// echo "Conectado";


?>
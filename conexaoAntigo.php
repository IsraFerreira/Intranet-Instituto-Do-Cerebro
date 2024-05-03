<?php  
$servidor2 = "172.16.3.38";
$usuario2 = "root";
$senha2 = "9L@d@$9";
$dbname2 = "estoque";

//criar a conexão
$conn2 = mysqli_connect($servidor2, $usuario2, $senha2, $dbname2);


if(!$conn2){
    die("Conexão falhou: ".msqli_connect_error());
}else{
    echo "";
}
?>
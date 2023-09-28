<?php
include("conexao.php");

$msg = false;

$strcon = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ('Erro ao conectar ao banco de dados');

if(isset($_FILES['arquivo'])){
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "uploads/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    $sql_code = "INSERT INTO slider (arquivo, data) VALUES('$novo_nome', NOW())";

    $enviar = mysqli_query($conn, $sql_code);
}

?>

<h1>Upload de Imagens</h1>
<?php if($msg != false) echo "<p> $msg </p>" ?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Arquivo: <input type="file" required name="arquivo">
    <input type="submit" value="Salvar">
</form>
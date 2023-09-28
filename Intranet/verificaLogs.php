<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="styles/EditVeLog.css">
   <title>Verificação de login</title>
</head>
<body>

<?php
include("conexao.php");
session_start();
$logged = $_SESSION['logged'];
$login = $_SESSION['usuario'];
$verificar = mysqli_query($conn, "SELECT SuperADM FROM usuarios WHERE usuario = '$login' AND SuperADM = 'sim'");
if(mysqli_num_rows($verificar)<=0){
    $superADM = 'nao';
}
else {
    $superADM = 'sim';
}


if($logged != true){ 
    echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='loginadm.php';</script>";  
}
else {
    include("session.php");
}

?>

<div class="container">
    <div class="header">
        <div class="back">
             <a href="adm.php" class="icon"><i class="fa-solid fa-circle-arrow-left"></i></a>
        </div>
        <div class="for">
            <h1>Central de alterações </h1> 
            <p>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="parametro" placeholder="Filtrar" class="filtro" />
                <input type="submit" value="Ordenar" class="botaoFiltro" />
                </form>
            </p>
        </div>

        <div class="logout">
        </div>
    </div>



    <div class="tabela">
    <?php

        $pagina = filter_input(INPUT_GET, "pagina"); 
        
        
        if (!$pagina) {
            $paginamarcada = "1";
        } else {
            $paginamarcada = $pagina;
        }
        
    
        $parametro = filter_input(INPUT_GET, "parametro"); 

        $strcon = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ('Erro ao conectar ao banco de dados');
        
   
        if($parametro){
            $sql = "SELECT * from logs where usuario like '%$parametro%' or acao like '%$parametro%' order by ID desc";
            $total_registros = "5000"; 
            
            echo "<table class='tabelaAltera'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>usuários</th>";
            echo "<th>IP</th>";
            echo "<th>Ações</th>";
            echo "<th>Data e hora</th>";
            echo "</tr>";
            
        }
            else{
                $sql = "SELECT * FROM logs order by ID desc";
                $total_registros = "30";
                    echo "<table class='tabelaAltera'>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>usuários</th>";
                    echo "<th>IP</th>";
                    echo "<th>Ações</th>";
                    echo "<th>Data e hora</th>";
                    echo "</tr>";
                    
            }



                $inicio = $paginamarcada - 1;
                $inicio = $inicio * $total_registros;


                $todos = mysqli_query($conn, "$sql");
                $todos2 = mysqli_query($strcon, "$sql");
                $totalregistros = mysqli_num_rows($todos2);

                $resultado = mysqli_query($strcon, "$sql LIMIT $inicio,$total_registros") or die ("Erro ao tentar cadastrar registro");

                $totalpaginas = $totalregistros / $total_registros;	
                $numero = 1;
                $usuario = [];

                while ($registro = mysqli_fetch_array($resultado)) {
                    $id = $registro['id']; 
                    $usuario = $registro['usuario'];
                    $IP = $registro['ip'];
                    $acao = $registro['acao'];
                    $dh = $registro['datahora'];
                    echo "<tr>";
                    echo "<td>".$id."</td>";
                    echo "<td> ".$usuario."</td>";
                    echo "<td> ".$IP."</td>";
                    echo "<td> ".$acao."</td>";
                    echo "<td> ".$dh."</td>";
                
                    $numero += 1;
            }
                        
                $anterior = $paginamarcada -1;

                $proximo = $paginamarcada +1;
    
                echo "<div class='marcador'>";
                if ($totalpaginas >= $paginamarcada){
                echo "<h3>Pagina $paginamarcada </h3>";
                if ($paginamarcada>1) {
                echo "<a href='?pagina=$anterior'><- Anterior</a> ";}
                echo "<a href='?pagina=$proximo'>| Próxima -></a>";
                }
                elseif ($parametro){
                echo "<h3>Pagina Unica - Filtrada </h3>";
                echo "<input type='button' value='Voltar' onClick='history.go(-1)' class='botao'>"; 
                }
                else{	
                echo "<h3>Pagina $paginamarcada </h3>";	
                echo "<a href='?pagina=$anterior'><- Anterior</a>";
                }
                
            mysqli_close($conn);
            echo "</table>";
          ?>
        
    </div>

</div>

</body> 

</html>
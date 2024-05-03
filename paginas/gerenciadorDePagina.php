<?php
include("../conexao.php");

$pagina = $_GET['nomedaPag'];
$queryPagina = mysqli_query($conn, "SELECT conteudoPag from paginas WHERE nomedaPag = '$pagina'");


$pagina == "sistemaMV"?$classMV='class="ativo"':$classMV="";
$pagina == "ramais"?$classRamais='class="ativo"':$classRamais="";
$pagina == "cardapio"?$classCardapio='class="ativo"':$classCardapio="";
$pagina == "chamados"?$classChamados='class="ativo"':$classChamados="";
$pagina == "email"?$classEmail='class="ativo"':$classEmail="";


echo '<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <title>Seja bem-vindo ao IEC</title>
   <link rel="stylesheet" href="../styles/stylesPaginas.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/baa307742c.js" crossorigin="anonymous"></script>
</head>
<body>
<script src="https://kit.fontawesome.com/baa307742c.js" crossorigin="anonymous"></script>
<div class="container">
        <nav class="header">
        <section class="logo">
         <img class="logoimg" alt="Logo IEC" src="../img/logoiec.png" >
        </section>
        <section class="browser">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="gerenciadorDePagina.php?nomedaPag=sistemaMV"'.$classMV.'>Sistema MV / Tzion</a></li>
                <li><a href="gerenciadorDePagina.php?nomedaPag=ramais"'.$classRamais.'>Ramais</a></li>
                <li><a href="gerenciadorDePagina.php?nomedaPag=cardapio"'.$classCardapio.' >Cardápio</a></li>
                <li><a href="gerenciadorDePagina.php?nomedaPag=chamados"'.$classChamados.'>Chamados</a></li>
                <li><a href="gerenciadorDePagina.php?nomedaPag=email"'.$classEmail.'>Email</a></li>
                <li><a href="../adm.php" target="_blank">Sou Adm</a></li>
            </ul>
        </nav>
    </section>

    <div class="conteudo">';



while ($row = $queryPagina->fetch_assoc()) {
    echo $row['conteudoPag'];
}



echo '</div>
        <footer>
            <section class="considerations">
                 <p>Feito pela equipe de TI do Instituto Estadual do Cerebro Paulo Niemeyer</p>
            </section>
        <div class="topo">
            <a href="#top" class="btn-top"><i class="fa-solid fa-arrow-up"></i> Voltar ao topo</a>
            <script>
                const botao = document.querySelector(".btn-top");
                window.addEventListener("scroll", function (event){
                    if (window.scrolly == 0){
                    botao.classList.remove("visible"); 
                    } else{
                        botao.classList.add("visible");
                    }
                    });
            </script>
        </div>
        </footer>

      </div>
      </body>
      </html>';

?>



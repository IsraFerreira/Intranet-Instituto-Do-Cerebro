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
</head>
<body>
<script src="https://kit.fontawesome.com/baa307742c.js" crossorigin="anonymous"></script>
<div class="container">
    <div class="header">
        <img class="logoimg" src="../img/logoiec.png" >
        <div class="menu">
         <a href="../index.php">Home</a>
         <a href="gerenciadorDePagina.php?nomedaPag=sistemaMV"'.$classMV.'>Sistema MV</a>
         <a href="gerenciadorDePagina.php?nomedaPag=ramais"'.$classRamais.'>Ramais</a>
         <a href="gerenciadorDePagina.php?nomedaPag=cardapio"'.$classCardapio.'>Cardápio</a>
         <a href="gerenciadorDePagina.php?nomedaPag=chamados"'.$classChamados.'>Chamados</a>
         <a href="gerenciadorDePagina.php?nomedaPag=email"'.$classEmail.'>Email</a>
        </div>
        <div class="menu2">
           <ul>
              <li><a href="../adm.php">Sou Adm</a></li>
              <li><a href="gerenciadorDePagina.php?nomedaPag=QuemSomos">Quem Somos</a></li>
              <li><a href="gerenciadorDePagina.php?nomedaPag=elogios">Elogios</a></li>
              <li><a href="gerenciadorDePagina.php?nomedaPag=tutoriais">Tutoriais</a></li>
              <li><a href="https://ensino.ideas.med.br/login">Treinamento IDEAS</a></li>
         </ul>
        </div>
    </div>
    <div class="conteudo">';



while ($row = $queryPagina->fetch_assoc()) {
    echo $row['conteudoPag'];
}



echo '</div>
        <div class="footer">
        <div class= "opaco">
        </div>
        <div class="textp"> 
          <p>Feito pela equipe de TI do Instituto Estadual do Cerebro Paulo Niemeyer</p>
        </div>
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

        </div>
      </div>
      </body>
      </html>';

?>




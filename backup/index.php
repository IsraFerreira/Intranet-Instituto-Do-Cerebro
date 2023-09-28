<?php
include("conexao.php");


?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <title>Seja bem-vindo ao IEC</title>
   <link rel="stylesheet" href="styles/styles.css">
</head>
<body onLoad="slide1()">
<div class="container">
    <div class="header">
        <img class="logoimg" src="img/logoiec.png" >
        <div class="menu"> 
           <a href="">Sistema MV</a>
           <a href="">Ramais</a>
           <a href="">Cardápio</a>
           <a href="">Chamados</a>
           <a href="">Email</a>
        </div>
        <div class="menu2">
           <ul>
              <li><a href="">Sou Adm</a></li>
              <li><a href="">Elogios</a></li>
              <li><a href="">Outros Tutoriais</a></li>
              <li><a href="">Tutorial Arya</a></li>
              <li><a href="">Tutorial Salux</a></li>
              <li><a href="">Treinamento IDEAS</a></li>
         </ul>
        </div>
    </div>
    <div class="bemVindo">Bem Vindo</div>
    <div class="slider">
      <img id="id">
      <script type="text/javascript">

         function slide1(){
         document.getElementById('id').src="img/imgBI.png";
         setTimeout("slide2()", 5000)
         }
         
         function slide2(){
         document.getElementById('id').src="img/ceu.jpg";
         setTimeout("slide3()", 5000)
         }
         
         function slide3(){
         document.getElementById('id').src="img/imgCIPA.png";
         setTimeout("slide1()", 5000)
         }
         
         </script>
      </div>

    <div class="footer">Footer</div>
</div>
</body>


</html>
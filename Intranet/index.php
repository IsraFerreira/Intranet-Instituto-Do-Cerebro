<?php
include("conexao.php");

$strcon = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ('Erro ao conectar ao banco de dados');
$sql = "SELECT * from slider";
$todos = mysqli_query($strcon, "$sql");
$totalregistros = mysqli_num_rows($todos);

$resultado = mysqli_query($strcon, "$sql") or die ("Erro ao tentar cadastrar registro");

$segundos = $totalregistros * 5;
$numero = 1;
$imagens = [];


while ($registro = mysqli_fetch_array($resultado)) {
     $rid = $registro['id']; 
     $rarquivo = $registro['arquivo'];
     $imagens[$numero] = $rarquivo;
     $numero += 1;
}

$numSlides = $numero - 1;

?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <title>Seja bem-vindo ao IEC</title>
   <link rel="stylesheet" href="styles/stylesSlider.css">

</head>
<body>
<div class="container">
    <div class="header">
        <img class="logoimg" src="img/logoiec.png" >
        <div class="menu"> 
        <a href="index.php" class="ativo">Home</a>
        <a href="paginas/gerenciadorDePagina.php?nomedaPag=sistemaMV">Sistema MV</a>
           <a href="paginas/gerenciadorDePagina.php?nomedaPag=ramais">Ramais</a>
           <a href="paginas/gerenciadorDePagina.php?nomedaPag=cardapio" >Cardápio</a>
           <a href="paginas/gerenciadorDePagina.php?nomedaPag=chamados">Chamados</a>
           <a href="paginas/gerenciadorDePagina.php?nomedaPag=email">Email</a>
        </div>
        <div class="menu2">
           <ul>
              <li><a href="adm.php">Sou Adm</a></li>
              <li><a href="paginas/gerenciadorDePagina.php?nomedaPag=QuemSomos">Quem Somos</a></li>
              <li><a href="paginas/gerenciadorDePagina.php?nomedaPag=elogios">Elogios</a></li>
              <li><a href="paginas/gerenciadorDePagina.php?nomedaPag=tutoriais">Tutoriais</a></li>
              <li><a href="https://ensino.ideas.med.br/login" target="_blank">Treinamento IDEAS</a></li>
         </ul>
        </div>
    </div>
   
   
    <div class="bemVindo">

    </div>

<div class="slider">
    <div class="slides">
        <?php 
        for($i1 = 1; $i1 < $numero; $i1++){
            echo "<input type='radio' name='radion-btn' id='radio".$i1."'>";
        }

        for($i2 = 1; $i2 < $numero; $i2++){
            if($i2 == 1){
            echo "<div class='slide first'>";
            echo "<img src='uploads/$imagens[$i2]' alt='Imagem $i2'>";
            echo "</div>"; }
            else {
            echo "<div class='slide'>";
            echo "<img src='uploads/$imagens[$i2]' alt='Imagem $i2'>";
            echo "</div>";   
            }
        }

        echo "<div class='navegacao-auto'>";
        for($i3 = 1; $i3 < $numero; $i3++){
            echo "<div class='auto-btn0".$i3."'></div>";
        } ?>

        </div>
        
    </div>
    
    
    <div class="manual-navegacao">
    <?php
        for($i4 = 1; $i4 < $numero; $i4++){
            echo "<label for='radio".$i4."' class='manual-btn'></label>";
        } ?>
    </div>
    

</div>

    <script>
        let slides = "<?php echo $numSlides; ?>"

        let count = 1;
            document.getElementById("radio1").checked = true;

        setInterval( function(){
            nextImage();
        }, 5000)

        function nextImage(){
        count++;
            console.log(count);
            console.log(slides);
            if(count > slides){
                count = 1;
            }

        document.getElementById("radio"+count).checked = true;
        }
    </script> 
    
     

<div class="footer">Feito pela equipe de TI do Instituto Estadual do Cerebro Paulo Niemeyer</div>
</div>
</body>


</html>
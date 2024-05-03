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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/baa307742c.js" crossorigin="anonymous"></script>
    </head>

    <body> 
            <nav class="header">
                <section class="logo">
                <img class="logoimg" alt="Logo IEC" src="img/logoiec.png" >
                </section>
                <section class="browser">
                    <ul>
                        <li><a href="index.php" class="ativo">Home</a></li>
                        <li><a href="paginas/gerenciadorDePagina.php?nomedaPag=sistemaMV">Sistema MV / Tzion</a></li>
                        <li><a href="paginas/gerenciadorDePagina.php?nomedaPag=ramais">Ramais</a></li>
                        <li><a href="paginas/gerenciadorDePagina.php?nomedaPag=cardapio" >Cardápio</a></li>
                        <li><a href="paginas/gerenciadorDePagina.php?nomedaPag=chamados">Chamados</a></li>
                        <li><a href="paginas/gerenciadorDePagina.php?nomedaPag=email">Email</a></li>
                        <li><a href="adm.php" target="_blank">Sou Adm</a></li>
                    </ul>
                </nav>
            </section>

            <!-- ************************ Modal ************************* -->
                <div class="modal">
                    <div class="content">
                        <script>
                            const modal = document.querySelector('.modal')
                            document.addEventListener("DOMContentLoaded", function () {
                                setTimeout(() => {
                                    modal.classList.add('enable')
                                    console.log("ativo")
                                }, 1000);
                            })
                        
                            function closeModal () {
                                modal.classList.add('disable')
                                console.log("ativo")
                            }

                            modal.onclick = e => {
                                if (e.target.className.indexOf('modal') !== -1) {
                                    modal.classList.remove('enable')
                                }
                            }

                        </script>

                        <div class="header2">
                        <img class="logoimg2" src="img/logoiec.png" >
                        <h1>Atenção</h1>
                        <div class="nulo">
                        </div>
                        </div>
                        <div class="mensagem">
                            
                        <?php
                            
                            
                        $sql = "SELECT * from avisos order by ordemAparicao asc";
                        $todos = mysqli_query($conn, "$sql");
                        $totalregistros = mysqli_num_rows($todos);

                        $resultado = mysqli_query($conn, "$sql") or die ("Erro ao tentar cadastrar registro");
                        

                        while ($registro = mysqli_fetch_array($resultado)) {
                            $id = $registro['id']; 
                            $nome = $registro['nome'];
                            $conteudo = $registro['conteudo'];
                            $chaveAtivo = $registro['chaveAtivo'];
                            $ordem = $registro['ordemAparicao'];

                            if($chaveAtivo == 'Ativo'){
                            echo '<h2>'.$nome.'</h2>';
                            echo '<p>'.$conteudo.'</p>';
                            }
                        }

                        ?> 
                    

                        </div>
                        <div class="footer2">
                        <button class="fechaM" onclick='closeModal()'> OK </button>
                        </div>
                    </div>  
                </div>
 

            <div class="Modal2"> 
                <div class="content2">
                    <div class="header3">
                        <button  class="closeM2" onClick="window.location.reload()" onclick='closeModal2()'> X </button> 
                        </div>    
                    <?php 
                        echo "<div class='boxes'>";
                                for($i2 = 1; $i2 < $numero; $i2++){
                                echo "<div class='box'><input type='radio' name='btn-nav' onclick='abrirImagem$i2()'><br>Slide $i2</input></div>";

                                ?>
                                <script>
                            function abrirImagem<?php echo $i2;?>(){
                            document.getElementById("imagemFullscreen").src="<?php echo "uploads/$imagens[$i2]" ?>";
                            }
                                </script> <?php
                            }
                            echo "</div>"; 
                            ?>  
                        <div class="conteudo">
                            <?php
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
                            

                                echo "<div class='fullscreen'>";
                                echo "<img src='uploads/$imagens[1]' alt='Imagem 1' id='imagemFullscreen'>";
                                echo "</div>";   

                            ?> 

                        <script>
                                const Modal2 = document.querySelector('.Modal2')
                                function openModal2() {
                                    Modal2.classList.add('enable')
                                }
                                
                                function closeModal2() {
                                    Modal2.classList.add('disable')
                                    console.log('clicou')
                                }
                        </script> 
                    </div>
                    </div>
                </div>

            <main class="slider">
                <div class="caixa">
                    <a href="#" onclick='openModal2()'><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
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
                    
                    ?>
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
                    }, 10000)
                    
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

            </main>
            <section class="control">
                <ul>
                    <li><a class="bloco" href="paginas/gerenciadorDePagina.php?nomedaPag=QuemSomos"><i class="fa-solid fa-people-group"></i> Quem Somos</a></li>
                    <li><a class="bloco" href="paginas/gerenciadorDePagina.php?nomedaPag=elogios"><i class="fa-regular fa-comment"></i> Elogios</a></li>
                    <li><a class="bloco" href="paginas/gerenciadorDePagina.php?nomedaPag=tutoriais"><i class="fa-solid fa-question"></i> Tutoriais</a></li>
                    <li><a class="bloco" href="https://ensino.ideas.med.br/login" target="_blank"><i class="fa-solid fa-lightbulb"></i> Treinamento IDEAS</a></li>
                </ul>
            </section>
            <aside>
                <img src="img/cerebro02.png" alt="">
            </aside>
            <footer>
                <section class="considerations">
                    <p>Feito pela equipe de TI do Instituto Estadual do Cerebro Paulo Niemeyer</p>
                </section>
            </footer>



    </body>

</html>

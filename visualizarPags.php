<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="styles/EditPag.css">
   <link rel="stylesheet" href="dist/ui/trumbowyg.min.css">
   <link rel="stylesheet" href="dist/plugins/table/ui/trumbowyg.table.min.css">
   <link rel="stylesheet" href="dist/plugins/colors/ui/trumbowyg.colors.min.css">
   <link rel="stylesheet" href="dist/plugins/emoji/ui/trumbowyg.emoji.min.css">
   <title>Edição de páginas</title>
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
        <div class="titulo">
            <h1>Gerir páginas</h1><br>

            <form action="acoes/adicionarPagina.php" method="POST">
                <div class="formulario">
                <h2>Adicione uma nova Página</h2><br>
                <input type="text" name="pagina" class="nomep" placeholder="Digite o titulo da página" required> <br>
                    <textarea type="textarea" name="conteudo" id="trumbowyg-editor" placeholder="Digite o conteúdo da página" required></textarea> <br>
                    <button type="submit" class="btnpag">Adicionar</button>
            </form>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
            <script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/0.35/dist/jquery-resizable.min.js"></script>
            <script src="dist/trumbowyg.min.js"></script>

            <script type="text/javascript" src="dist/langs/pt_br.min.js"></script>
            <script src="dist/plugins/table/trumbowyg.table.min.js"></script>
            <script src="dist/plugins/upload/trumbowyg.upload.min.js"></script>
            <script src="dist/plugins/resizimg/trumbowyg.resizimg.min.js"></script>
            <script src="dist/plugins/fontsize/trumbowyg.fontsize.min.js"></script>
            <script src="dist/plugins/fontfamily/trumbowyg.fontfamily.min.js"></script>
            <script src="dist/plugins/colors/trumbowyg.colors.min.js"></script>
            <script src="dist/plugins/emoji/trumbowyg.emoji.min.js"></script>

            <script>
               $('#trumbowyg-editor').trumbowyg({
                lang: 'pt_br',
                btns: [ ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['fontsize'],
                ['fontfamily'],
                ['foreColor', 'backColor'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['upload'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['table'],
                ['tableCellBackgroundColor', 'tableBorderColor'],
                ['emoji'],
                ['fullscreen'],
                ['fullscreen']
            ],
                 plugins: {
                     upload: {
                         serverPath: './acoes/uploadPags.php',
                         fileFieldName: 'image',
                         headers: {
                            'Authorization': 'Client-ID xxxxxxxxxx'
                         },
                         urlPropertyName: 'file'
                 },
                    fontsize: {
                        sizeList: [
                            '1px', '2px', '4px', '6px', '8px', '10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px', '26px', '28px', '30px', '32px', '34px', '36px', '38px', '40px', '42px', '44px', '46px', '48px', '50px', '52px', '54px', '56px', '58px', '60px', '62px', '64px', '66px', '68px', '70px', '72px', '74px', '76px', '78px', '80px', '82px', '84px', '86px', '88px', '90px', '92px', '94px', '96px', '98px', '100px'
                        ]
                    }
                 },
                autogrow: true
                });
            </script>
        </div>
        </div>

        <div class="logout">

       </div>
    </div>
    <div class="tabela">
        <?php
            echo "<table class='TabPag'>";
            echo "<tr>";
            echo "<th>Página</th>";
            echo "<th>Ações</th>";
            echo "</tr>";


                $sql = "SELECT * from paginas";
                $todos = mysqli_query($conn, "$sql");
                $totalregistros = mysqli_num_rows($todos);

                $resultado = mysqli_query($conn, "$sql") or die ("Erro ao tentar cadastrar registro");

                $numero = 1;
                $usuario = [];

                while ($registro = mysqli_fetch_array($resultado)) {
                    $id = $registro['id']; 
                    $nomep = $registro['nomedaPag'];
                    echo "<tr>";
                    echo "<td> ".$nomep."</td>";
                    echo "<td><a href='acoes/VerificacaoExcluirPag.php?id=".$id."'><i class='fa-solid fa-trash' id='icone'></i></a><a href='acoes/editarPagina.php?id=".$id."'><i class='fa-solid fa-file-pen' id='icone2'></i></a></td>";
                    echo "</tr>";
                    $numero += 1;
            }

            mysqli_close($conn);
            echo "</table>";
          ?>
     </div>


    </div>

</body> 

</html>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="../styles/info.css">
   <link rel="stylesheet" href="../dist/ui/trumbowyg.min.css">
   <link rel="stylesheet" href="../dist/plugins/table/ui/trumbowyg.table.min.css">
   <link rel="stylesheet" href="../dist/plugins/colors/ui/trumbowyg.colors.min.css">
   <link rel="stylesheet" href="../dist/plugins/emoji/ui/trumbowyg.emoji.min.css">
   <title>Edição de informação</title>
   </head>
<body>
    <?php
    include("../conexao.php");
    session_start();
    $logged = $_SESSION['logged'];

    if($logged != true){ 
        echo"<script language='javascript' type='text/javascript'>alert('É necessário fazer o login primeiro');window.location.href='loginadm.php';</script>";  
    }
    else {
        include("../session.php");
    }


    $id = $_GET['id'];


    $sql = "SELECT * from avisos WHERE id=$id";
    $todos = mysqli_query($conn, "$sql");
    $totalregistros = mysqli_num_rows($todos);

    $resultado = mysqli_query($conn, "$sql") or die ("Erro ao tentar cadastrar registro");

    while ($registro = mysqli_fetch_array($resultado)) {
        $id = $registro['id']; 
        $nome = $registro['nome'];
        $conteudo = $registro['conteudo'];
        $ordem = $registro['ordemAparicao']; 
    }

    ?>

    <div class="container">
    <div class="header">
        <div class="back">
             <a href="../info.php" class="icon"><i class="fa-solid fa-circle-arrow-left"></i></a>
        </div>
        <div class="titulo">
            <h1>Edição de Informação</h1><br>
                <form action="atualizarInfo.php" method="POST">
                <input type="text" name="id" class="nome" value="<?php echo $id; ?>" readonly> <br><br>
                <input type="text" name="nome" class="nome" value="<?php echo $nome; ?>" required> <br><br>
                <input type="number" name="ordem" value="<?php echo $ordem; ?>" required><br><br>
                <textarea type="textarea" id="trumbowyg-editor"  name="conteudo"  required><?php echo $conteudo; ?></textarea> 
            </div>
         
        <div class="logout">
            
            </div>
        </div>
        
        <div class="tabela">
        <button type="submit" class="btncad">Atualizar</button> 
        <a href="../info.php" class="btncan">Cancelar</a>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
            <script src="//rawcdn.githack.com/RickStrahl/jquery-resizable/0.35/dist/jquery-resizable.min.js"></script>
            <script src="../dist/trumbowyg.min.js"></script>

            <script type="text/javascript" src="../dist/langs/pt_br.min.js"></script>
            <script src="../dist/plugins/table/trumbowyg.table.min.js"></script>
            <script src="../dist/plugins/upload/trumbowyg.upload.min.js"></script>
            <script src="../dist/plugins/resizimg/trumbowyg.resizimg.min.js"></script>
            <script src="../dist/plugins/fontsize/trumbowyg.fontsize.min.js"></script>
            <script src="../dist/plugins/fontfamily/trumbowyg.fontfamily.min.js"></script>
            <script src="../dist/plugins/colors/trumbowyg.colors.min.js"></script>
            <script src="../dist/plugins/emoji/trumbowyg.emoji.min.js"></script>

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

</body> 

</html>


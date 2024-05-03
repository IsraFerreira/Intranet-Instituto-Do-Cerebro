<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="styles/EditPag.css">
   <link rel="stylesheet" href="dist/ui/trumbowyg.min.css">
   <link rel="stylesheet" href="dist/plugins/table/ui/trumbowyg.table.min.css">
   <link rel="stylesheet" href="dist/plugins/colors/ui/trumbowyg.colors.min.css">
   <link rel="stylesheet" href="dist/plugins/emoji/ui/trumbowyg.emoji.min.css">
   <link rel="stylesheet" href="styles/info.css">
   <title>Banco de informações</title>
</head>
<body>

<?php
include("conexao.php");
session_start();
$logged = $_SESSION['logged'];

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
      <div class="upload">
            <h1>Adicione uma nova informação</h1>
            <form action="acoes/adicionarInfo.php" method="POST">
                <input type="text" name="nome" class="nome" placeholder="Digite o tema da informação" required> <br><br>
                <label class="selecione"> Determine a ordem de aparição:</label>
                <input type="number" class="btn-order" name="ordem" required><br><br>
                <label class="selecione"> Escolha o Status de sua informação:</label>
                <select name="chaveAtivo" id="Chave">
	            <option value="Ativo">Ativada</option>
	             <option value="Desativo">Desativada</option>
                 </select><br><br>
                <textarea id="trumbowyg-editor" name="conteudo"placeholder="Digite o conteúdo da informação" required></textarea>
                 <button type="submit" class="btncad">Cadastrar</button>
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
        <div class="logout">      
        </div>
    </div>

    <div class="tabela">

        <?php
        $verifica = mysqli_query($conn, "SELECT chaveAtivo FROM avisos WHERE chaveAtivo = 'Ativo'");
        if(mysqli_num_rows($verifica)<=0){
            $chaveAtivo = 'Desativo';
        }
        else {
            $chaveAtivo = 'Ativo';
        }
       
        echo "<table class='tabelaInformações'>";
        echo "<tr>";
        echo "<th>informação</th>";
        echo "<th>Ações</th>";
        echo "<th>Status</th>";
        echo "</tr>";


            $sql = "SELECT * from avisos";
            $todos = mysqli_query($conn, "$sql");
            $totalregistros = mysqli_num_rows($todos);

            $resultado = mysqli_query($conn, "$sql") or die ("Erro ao tentar cadastrar registro");

            $numero = 1;
            $usuario = [];

            while ($registro = mysqli_fetch_array($resultado)) {
                $id = $registro['id']; 
                $nome = $registro['nome'];
                $chaveAtivo = $registro['chaveAtivo'];
                echo "<tr>";
                echo "<td>".$nome."</td>";
                echo "<td><a href='acoes/verificaApagarInfo.php?id=".$id."'><i class='fa-solid fa-trash' id='icone'></i></a><a href='acoes/editarInfo.php?id=".$id."'><i class='fa-solid fa-file-pen' id='icone2'></i></a></td>";
                        if($chaveAtivo == 'Ativo'){
                         echo "<td><a href='acoes/tornarInfoDesativo.php?id=".$id."'>Desativar</a></td>";
                        }
                        else {
                        echo "<td><a href='acoes/tornarInfoAtivo.php?id=".$id."'>Ativar</a></td>";
                        }
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
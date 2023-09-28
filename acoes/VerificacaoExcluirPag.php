<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="../styles/excluipg.css">
   <link rel="stylesheet" href="../dist/ui/trumbowyg.min.css">
   <link rel="stylesheet" href="../dist/plugins/table/ui/trumbowyg.table.min.css">
   <link rel="stylesheet" href="../dist/plugins/colors/ui/trumbowyg.colors.min.css">
   <link rel="stylesheet" href="../dist/plugins/emoji/ui/trumbowyg.emoji.min.css">
   <title>Excluir página</title>
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
// $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

$query = "SELECT * from paginas WHERE id=$id";
$todos = mysqli_query($conn, "$query");
$totalregistros = mysqli_num_rows($todos);

$resultado = mysqli_query($conn, "$query") or die ("Erro ao tentar excluir registro");

while ($registro = mysqli_fetch_array($resultado)) {
    $id = $registro['id']; 
    $nomep = $registro['nomedaPag'];
    $conteudoPag = $registro['conteudoPag'];
}


?>
  <div class="back">
             <a href="../visualizarPags.php" class="icon"><i class="fa-solid fa-circle-arrow-left"></i></a>
        </div>
   <div class="container">
   <h1>Você tem certeza que deseja excluir está página?</h1>
    <div class="bloco">

      <P>Nome da página:<input type="text" name="pagina" class="nomep" value="<?php echo $nomep; ?>" readonly> <br>
      <p>Conteúdo da página</p>
      <textarea type="textarea" name="conteudo" rows="15" class="conteudo" id="trumbowyg-editor" readonly><?php echo $conteudoPag; ?></textarea> <br>
      
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
                         serverPath: './uploadPags.php',
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
      <div class="conteudo">
      
      <h2> após ser excluída, a página não poderá ser resgatada<h2>
        <h3>Deseja continuar?</h3>
        
      <?php
              echo "<a href='apagarPagina.php?id=".$id."' class='excluir'>Sim, excluir página</a>";
              echo "<a href='../visualizarPags.php?id=".$id."' class='cancelar'>Não, cancelar</a>";
        ?>
        </div>
  
  </div>
</body>
</html>
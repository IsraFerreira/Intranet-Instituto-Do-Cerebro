<?php
echo "<div class='sessao'>";
echo "<script src='https://kit.fontawesome.com/959cbca264.js' crossorigin='anonymous'></script>";
echo "<h4>Usuário: ".$_SESSION['usuario']."</h4>";
echo "<a href='logout.php' class='sair'><i class='fa-solid fa-door-open'></i></a>";
echo "</div>";
?>
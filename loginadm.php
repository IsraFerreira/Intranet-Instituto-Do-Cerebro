<!DOCTYPE HTML>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="styles/cadlog.css">
   <title>Login</title>
</head>
<body>
   <div class="container">
      <img class="logoimg" src="img/logoiec.png" >
      <div class="formulario">
         <form action="loginadmBackend.php" method="POST">
            <h1>Seja bem-vindo de volta Administrador</h1>
            <input type="text" name="usuario" class="caixa1" placeholder="Digite seu usuario" required> 
            <input type="password" name="senha" class="caixa2"  placeholder="Digite sua senha" required>
            <button type="submit" class="btn" name="btn">Entrar</button>
         </form>
      </div>
    </div>
</body>
</html>
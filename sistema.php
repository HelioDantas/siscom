<?php
session_start();
require_once('session.php');


if (obterSessao('usuario_matricula') === null) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="css/bootstrap.css" />

    <title>Sistema</title>
</head>
<body>
    <nav class = "navbar navbar-dark bg-dark">
     <b class = "nav-item">Sistema, página protegida.</b>
     <p class = "nav-item">  Seja bem vindo<strong> <?php echo $_SESSION["nome"] ?></strong></p>
     <a class = "nav-link" href="sair.php">Sair</a>
    </nav>

    
    

    
</body>
</html>
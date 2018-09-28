<?php
require_once('session.php');

if (obterSessao('usuario_matricula') === null)
{
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema</title>
</head>
<body>
    <b>Sistema, página protegida.</b>
    <a href="sair.php">Sair</a>
</body>
</html>
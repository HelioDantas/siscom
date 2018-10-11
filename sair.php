<?php
require_once('session.php');

excluirSessao('usuario_matricula');
setcookie("usuario_logado");
header('Location: index.php');
?>
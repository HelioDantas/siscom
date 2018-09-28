<?php
require_once('session.php');

excluirSessao('usuario_matricula');

header('Location: index.php');
?>
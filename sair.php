<?php
require_once('session.php');

excluirSessao('usuario_email');

header('Location: index.php');
?>
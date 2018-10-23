<?php

use classes\Usuario;
if (isset($_POST['matricula'], $_POST['senha'])) {
    require_once ("session.php");
    require_once ("../classes/Usuario.php");

    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    if (Usuario::ehUsuarioValido($matricula, $senha)) {
        $usuario = Usuario::obterUsuario($matricula);
        echo $usuario->matricula;
        session_start();
        $_SESSION ["nome"]= $usuario["nome"];

        criarSessao('usuario_matricula', $usuario['matricula']);
        setcookie("usuario_logado", $usuario["nome"], time() + 60 *60);

        header("Location: ../sistema.php");
    }

    header("Location: ../index.php?login=0");
} else {
    header("Location: ../index.php?login=0");
}

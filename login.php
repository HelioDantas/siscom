<?php
if (isset($_POST['matricula'], $_POST['senha'])) {
    require_once ("session.php");
    require_once ("database.php");

    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    if (ehUsuarioValido($matricula, $senha)) {
        $usuario = obterUsuario($matricula);

        criarSessao('usuario_matricula', $usuario['matricula']);

        header("Location: sistema.php");
    }

    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>
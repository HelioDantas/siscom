<?php
if (isset($_POST['matricula'], $_POST['senha'])) {
    require_once ("session.php");
    require_once ("database.php");

    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

    if (ehUsuarioValido($matricula, $senha)) {
        $usuario = obterUsuario($matricula);
        session_start();
        $_SESSION ["nome"]= $usuario["nome"];

        criarSessao('usuario_matricula', $usuario['matricula']);
        setcookie("usuario_logado", $usuario["nome"], time() + 60);

        header("Location: sistema.php");
    }

    header("Location: index.php?login=0");
} else {
    header("Location: index.php?login=0");
}
?>
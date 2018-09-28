<?php
if (isset($_POST['email'], $_POST['password'])) {
    require_once ("session.php");
    require_once ("database.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (ehUsuarioValido($email, $password)) {
        $usuario = obterUsuario($email);

        criarSessao('usuario_email', $usuario['email']);

        header("Location: sistema.php");
    }

    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>
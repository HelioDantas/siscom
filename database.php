<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'login');

function obterConexao()
{
    return new PDO(sprintf("mysql:host=%s;dbname=%s", DB_HOST, DB_NAME), DB_USER, DB_PASS);
}

function ehUsuarioValido(string $email, string $password)
{
    $db = obterConexao();

    $statement = $db->prepare("SELECT * FROM usuario WHERE email = ?");
    $statement->execute([$email]);

    $resultado = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$resultado) {
        return false;
    }

    return password_verify($password, $resultado['senha']);
}

function obterUsuario($email) {
    $db = obterConexao();

    $statement = $db->prepare("SELECT * FROM usuario WHERE email = ?");
    $statement->execute([$email]);

    return $statement->fetch(PDO::FETCH_ASSOC);
}
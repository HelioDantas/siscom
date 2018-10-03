<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'login');

function obterConexao()
{
    return new PDO(sprintf("mysql:host=%s;dbname=%s", DB_HOST, DB_NAME), DB_USER, DB_PASS);
}

function ehUsuarioValido(string $matricula, string $password)
{
    $db = obterConexao();

    $statement = $db->prepare("SELECT * FROM usuario WHERE matricula = ?");
    $statement->execute([$matricula]);

    $resultado = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$resultado) {
        return false;
    }

    return password_verify($password, $resultado['senha']);
}

function obterUsuario($matricula) {
    $db = obterConexao();

    $statement = $db->prepare("SELECT * FROM usuario WHERE matricula = ?");
    $statement->execute([$matricula]);

    return $statement->fetch(PDO::FETCH_ASSOC);
}
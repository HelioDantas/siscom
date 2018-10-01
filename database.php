<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'hl2468hl');
define('DB_NAME', 'login');

function obterConexao()
{
    return new PDO("mysql:host=127.0.0.1;dbname=login", "root", "hl2468hl");
    
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
<?php
define('DB_HOST', 'wmysdes01v');
define('DB_USER', 'tresta');
define('DB_PASS', 'Mass55');
define('DB_NAME', 'tresta');

function obterConexao()
{

    return new PDO(sprintf("mysql:host=%s;dbname=%s", DB_HOST, DB_NAME), DB_USER, DB_PASS);
   //return new PDO("mysql:host=wmysdes01v;dbname=tresta,tresta,Mass55");
}

function ehUsuarioValido(string $matricula, string $password)
{
    $db = obterConexao();

    $statement = $db->prepare("SELECT * FROM raf_login WHERE matricula = ?");
    $statement->execute([$matricula]);

    $resultado = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$resultado) {
        return false;
    }

    return password_verify($password, $resultado['senha']);
}

function obterUsuario($matricula) {
    $db = obterConexao();

    $statement = $db->prepare("SELECT * FROM raf_login WHERE matricula = ?");
    $statement->execute([$matricula]);

    return $statement->fetch(PDO::FETCH_ASSOC);
}

function updateSenha($senha,$id)
{
$db = obterConexao();

$statement =$db->prepare("UPDATE raf_login senha = ? WHERE id_user = ?");
$statement ->execute([$senha],[$id]);
}
<?php
if (empty(session_id()))
{
    session_start();
}

define('SESSION_PREFIX', 'login');

function obterSessao($chave)
{
    return $_SESSION[sprintf("%s_%s", SESSION_PREFIX, $chave)] ?? null;
}

function criarSessao($chave, $valor)
{
    session_id();
    $chave = sprintf("%s_%s", SESSION_PREFIX, $chave);

    $_SESSION[$chave] = $valor;

    return obterSessao($chave);
}

function excluirSessao($chave)
{
    unset($_SESSION[sprintf('%s_%s', SESSION_PREFIX, $chave)]);
}
?>
<?php

include 'database.php';
require_once('classes/usuario.php');
require_once('EnviaEmail.php');
require_once('teste.php');
require_once( 'gerarSenha.php');

$U = new Usuario;


if  (isset($_POST['rep_mail']))
{
    $email = $_POST['rep_email'];
    $user = $U->getUsuarioForEmail($email);
    if(!empty($user))
    {
        $senha = fncGera_Senha(4, 1, 1, 0, 0);
        enviar($email,"Recuperação de Senha","olá ".$user['nome']." Sua nova senha é ".$senha."");
        $novaSenha = password_hash($senha,1);

        updateSenha($novaSenha,$user['id']);
    }



    // mandar email com confirmação de senha .

    // mandar mensagem que foi enviado com sucesso.
}

header('location: index.php');
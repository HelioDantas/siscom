<?php

require_once('database.php');
require_once('usuario');
require_once('EnviaEmail');
require_once('teste.php');



if  (isset($_POST['rep_mail']))
{
    $email = $_POST['rep_email'];
    $user =  Usuario->getUsuarioForEmail($email);
    if(!empty($user))
    {
        $senha =gerarsenha01();
        EnviaEmail0->mail($email,"Recuperação de Senha","olá ".$user['nome']." Sua nova senha é ".$senha."");
    }



    // mandar email com confirmação de senha .

    // mandar mensagem que foi enviado com sucesso.
}
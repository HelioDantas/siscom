<?php


require_once('../classes/usuario.php');
require_once('../EnviaEmail.php');
require_once('../teste.php');
require_once( '../gerarSenha.php');

$U = new Usuario;


if  (isset($_POST['rep_email']))
{
    $email = $_POST['rep_email'];
    $user = $U->getUsuarioForEmail($email);
    var_dump($email);
    if(!empty($user))
    {
        $senha = fncGera_Senha(4, 1, 1, 0, 0);
     //   $senha = "123456";
        enviar($email ,$user['nome'],$senha);
        $novaSenha = password_hash($senha,1);

       $U->updateSenha($novaSenha, $user['id_user']);
    }



    // mandar email com confirmação de senha .

    // mandar mensagem que foi enviado com sucesso.
}

header('location: ../index.php');
<?php

use classes\Usuario;
require_once('../classes/Usuario.php');


$user = new Usuario;

$user->setNome($_POST['nome']);
$user->setSis_funcionario_matricula($_POST['matricula']);
$user->setSenha($_POST['senha']);

if ($user->inserir()){
header("location:../index.php");
die();

}else{

header("location:../cadastro/cadastro-form.php?usuarioCadastrado=true");

}
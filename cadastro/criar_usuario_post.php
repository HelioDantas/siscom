<?php
require_once('../classes/usuario.php');

$user = new Usuario;

$user->setNome($_POST['nome']);
$user->setMatricula($_POST['matricula']);
$user->setSenha($_POST['senha']);

$user->inserir();

header("location: ../index.php");

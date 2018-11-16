<?php
require_once'classes/cliente.php';
$paciente = new Paciente();
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$paciente->create_Paciente($nome, $cpf);

header("Location: cadastrar_cliente.php");
die();

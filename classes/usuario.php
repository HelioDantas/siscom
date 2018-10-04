<?php
require_once('../database.php');

Class Usuario
{

private $nome;
private $matricula;
private $senha;


public function inserir(){

    $mycon = obterConexao();

    $query = "INSERT INTO  raf_login (nome,matricula,senha) VALUES('".$this->nome."','".$this->matricula."','".$this->senha."')";
    $mycon->exec($query);
}

public function setNome($nome){
    $this->nome = $nome;
}

public function getNome(){
    return $this->nome;
}


public function setMatricula($matricula){
    $this->matricula = $matricula;
}

public function getMatricula(){
    return $this->matricula;
}

public function setSenha($senha){
    $this->senha = password_hash($senha,1);
}

public function getSenha(){
    return $this->senha;
}









}
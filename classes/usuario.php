<?php

namespace classes;
use database\database;
use PDO;
require_once "../database/database.php";
use Exception;


Class Usuario
{

    private $nome;
    private $Sis_funcionario_matricula;
    private $senha;
    private $email;
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }


    public function setSis_funcionario_matricula($matricula){
        $this->Sis_funcionario_matricula = $matricula;
    }

    public function getSis_funcionario_matricula(){
        return $this->Sis_funcionario_matricula;
    }

    public function setSenha($senha){
        $this->senha = password_hash($senha,1);
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }


    public function inserir(){

        $db = database::obterConexao();
        $statement  = $db->prepare("Select Sis_funcionario_matricula from sis_usuario where Sis_funcionario_matricula = ?");
        $statement->execute([$this->Sis_funcionario_matricula]);
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$resultado) {
            $query = "INSERT INTO  sis_usuario (nome,Sis_funcionario_matricula,senha) VALUES('".$this->nome."','".$this->Sis_funcionario_matricula."','".$this->senha."')";
            $db->exec($query);
            return true;
        }else{
            return false;

        }

    }

    public function getUsuarioForEmail($email) {
        $db = database::obterConexao();

        $statement = $db->prepare("SELECT * FROM sis_usuario WHERE email = ?");
        $statement->execute([$email]);
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            return new Exception("Error! usuario não e valido", 1);
            
        }
        return $resultado;
    }

    function updateSenha($senha,$id){

        $db = database::obterConexao();

        $statement =$db->prepare("UPDATE sis_usuario senha = ? WHERE idusuario = ?");
        $statement ->execute([$senha],[$id]);

    }


   public  function  obterUsuario($matricula){
        $db = database::obterConexao();

        $statement = $db->prepare("SELECT * FROM sis_usuario WHERE Sis_funcionario_matricula = ?");
        $statement->execute([$matricula]);
                
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

   public function  ehUsuarioValido(string $matricula, string $password){
        $db = database::obterConexao();

        $statement = $db->prepare("SELECT * FROM sis_usuario WHERE Sis_funcionario_matricula = ?");
        $statement->execute([$matricula]);

        $resultado = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            return false;
        }

        return password_verify($password, $resultado['senha']);
    }







}
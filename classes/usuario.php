<?php

namespace classes;
use database\database;
use PDO;
require_once "../database/database.php";
use Exception;


Class Usuario
{

    private $nome;
    private $matricula;
    private $senha;
    private $email;
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
        $statement  = $db->prepare("Select matricula from raf_login where matricula = ?");
        $statement->execute([$this->matricula]);
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$resultado) {
            $query = "INSERT INTO  raf_login (nome,matricula,senha) VALUES('".$this->nome."','".$this->matricula."','".$this->senha."')";
            $db->exec($query);
            return true;
        }else{
            return false;

        }

    }

    public function getUsuarioForEmail($email) {
        $db = obterConexao();

        $statement = $db->prepare("SELECT * FROM raf_login WHERE email = ?");
        $statement->execute([$email]);
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            return new Exception("Error! usuario não e valido", 1);
            
        }
        return $resultado;
    }

    function updateSenha($senha,$id){

        $db = obterConexao();

        $statement =$db->prepare("UPDATE raf_login senha = ? WHERE id_user = ?");
        $statement ->execute([$senha],[$id]);

    }


    static function  obterUsuario($matricula){
        $db = database::obterConexao();

        $statement = $db->prepare("SELECT * FROM raf_login WHERE matricula = ?");
        $statement->execute([$matricula]);
                
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

   static function  ehUsuarioValido(string $matricula, string $password){
        $db = database::obterConexao();

        $statement = $db->prepare("SELECT * FROM raf_login WHERE matricula = ?");
        $statement->execute([$matricula]);

        $resultado = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) {
            return false;
        }

        return password_verify($password, $resultado['senha']);
    }







}
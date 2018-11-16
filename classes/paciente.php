<?php

class Paciente{
    public   $nome;
    public    $cpf;
    

        function create_Paciente($nome, $cpf){
            $conexao = new PDO('mysql:host=127.0.0.1;dbname=clinicas', 'root', '');
            $query = "INSERT INTO sis_paciente (nome, cpf) values ('". $nome ."', '" . $cpf ."')";
            $conexao->exec($query);
        


        }

         function reader_Paciente($nome, $cpf){
            $query = "SELECT nome, cpf from sis_paciente";
            $resultado = $conexao->query($query);
            $lista = $resultado->fetAll();
            return $lista;


        }

        function reader_Paciente_nome($nome){
            $query = "SELECT nome, cpf from sis_paciente  where nome like '". $nome ."'";
            $resultado = $conexao->query($query);
            $lista  = $resultado->fetAll();
            return $lista;

        }

        function reader_Paciente_cpf($cpf){
            $query = "SELECT nome, cpf from sis_paciente  where cpf like '". $cpf ."'";
            $resultado = $conexao->query($query);
            $lista  = $resultado->fetAll();
            return $lista;

        }






}
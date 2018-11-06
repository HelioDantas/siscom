@extends("app")

@section ("estilos")
        <links href="" rel="">

            <style>

                html,body   {

                    background-color: ;
                    color: ;
                    font-family: ;
                    font-weight: ;
                    height: ;
                    margin: ;
                }
            .full-height{
                height: ;
            }
        </style> 
    @endsection

@section('tela')


      <title>Convênios</title>

    </div>
        <div class="conttab">
            <div class="Nomes dos Convênios">
    </div>
   
  <tbody>
   <table class="table table-striped">

  <thead class="table-dark">
  
  </thead>
<?php
7
/* substitua as variáveis abaixo pelas que se adequam ao seu caso */
8
$dbhost = 'localhost:8000'; // endereco do servidor de banco de dados
9
$dbuser = 'root'; // login do banco de dados
10
$dbpass = 'minhasenha'; // senha
11
$dbname = 'tresta'; // nome do banco de dados a ser usado
12
$conecta = mysql_connect($dbhost, $dbuser, $dbpass, $dbname);
13
$seleciona = mysql_select_db($dbname);
14
$sqlcriatabela = "CREATE TABLE contatos (nome VARCHAR(50), telefone VARCHAR(25));";
15
$criatabela = mysql_query( $sqlcriatabela, $conecta );
16
 
17
// inicia a conexao ao servidor de banco de dados
18
if(! $conecta )
19
{
20
  die("<br />Nao foi possivel conectar: " . mysql_error());
21
}
22
echo "<br />Conexao realizada!";
23
 
24
// seleciona o banco de dados no qual a tabela vai ser criada
25
if (! $seleciona)
26
{
27
  die("<br />Nao foi possivel selecionar o banco de dados $dbname");
28
}
29
echo "<br />selecionado o banco de dados $dbname";
30
 
31
// finalmente, cria a tabela 
32
if(! $criatabela )
33
{
34
  die("<br />Nao foi possivel criar a tabela: " . mysql_error());
35
}
36
echo "<br />A tabela foi criada!";
37
 
38
// encerra a conexão
39
mysql_close($conecta);
40
?>

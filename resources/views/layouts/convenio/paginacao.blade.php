@extends('layout.appPacienteListar')

@section('estilos')
<style>
        span{
            text-align: center;
        }
    </style>
@endsection



@section('conteudo')
<div class="jumbotron">
TESTANDO: <span style="color:red;">Lista de Convênios</span>
</div>
@endsection


@section('navegação')

    <div class="col-2">
    <label for="filtrar-tabela">Pesquisar</label>
    <input type="text" name="filtro" id="filtrar-tabela">    
    </div>    
@endsection


@section('tela')
    

<div class="container">
        <div class="card text-center">
        <div class="card-header">
            <h3 class="titulopacientes">Pacientes Cadastrados</h3>
        </div>
                
    <div class="card-body">
      <h5 class="card-title" id="cardtitle"></h5>
      <table class="table table-hover" id="tabelaPacientes">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Nome do Convênio</th>
            <th scope="col">Adesão</th>
            <th scope="col">Banco</th>
            <th scope="col">Agência</th>
            <th scope="col">Conta</th>
            <th scope="col">Status</th>

          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="card-footer">

      <nav id="paginationNav">
        <ul class="pagination">
        </ul>
      </nav>
      
    </div>
  </div>

</div>
@endsection
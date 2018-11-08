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
TESTANDO: <span style="color:red;">visualização e paginação do dados do paciente</span>
</div>
@endsection


@section('navegação')

    <div class="col-2">
    <label for="filtrar-tabela">Buscar</label>
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
                <th s>prontuario      </th>
                <th >nome            </th>
                <th >cpf             </th>
                <th >identidade      </th>
                <th >dataDeNascimento</th>
                <th >sexo            </th>
                <th >etnia           </th>
                <th >nacionalidade   </th>
                <th >naturalidade    </th>
                <th >escolaridade    </th>
                <th scope="col">opções</th>
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

<!--
      <nav id="paginationNav">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
-->
      
    </div>
  </div>

</div>
@endsection


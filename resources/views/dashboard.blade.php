@extends('layout.app')
@section('estilos')
<style>
    .dashboard{
        margin-top: 2rem;
        
       

    }
    #containerLogoDataHoraH3{
          padding-top:0.5rem;
        }
        .card{
            /*color: #3490dc;*/
            color:black;
            padding: 1rem;
             background-color: transparent;
            background-image: none;
            border-color: #3490dc;
            text-decoration-color: black;
        }
        .card-body{
          margin:1.25rem;
        }
        #adm{
          float:inherit;
        }

</style>
@endsection


@section('tela')
<div class="container dashboard">
  <div id="adm">
    <a href="#" class="btn btn-outline-primary">Administrador</a>
  </div>
<div class="row ">
    <div class="col-sm-4">
            <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Agendamentos</h5>
                      <p class="card-text">Consulte os horarios disponiveis e Agende uma nova conuslta </p>
                      <a href="#" class="btn btn-primary">Agendar</a>
                    </div>
                  </div>
    </div>
    <div class="col-sm-4">
        <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Registros Clinicos</h5>
                  <p class="card-text">Cofira os regisros cadastrados no sistema </p>
                  <a href="#" class="btn btn-primary">Consultar</a>
                </div>
              </div>
</div>
<div class="col-sm-4">
                <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Agenda</h5>
                          <p class="card-text">historico de Agendamentos passados , e agendamentos do dia </p>
                          <a href="#" class="btn btn-primary">Consultar</a>
                        </div>
                      </div>
        </div>
  
      

</div>
<hr>
<div class="container dashboard ">
        <div class="row ">
                        <div class="col-sm-4">
                                        <div class="card text-center" style="width: 18rem;">
                                                <div class="card-body">
                                                  <h5 class="card-title">Pacientes</h5>
                                                  <p class="card-text">Cadastre , vizualize , E atualize dados Dos paciente cadastrados </p>
                                                  <a href="{{route('paciente.listar')}}"class="btn btn-primary">Pacientes</a>
                                                </div>
                                              </div>
                                </div>
                                <div class="col-sm-4">
                                                <div class="card text-center" style="width: 18rem;">
                                                        <div class="card-body">
                                                          <h5 class="card-title">Convenios</h5>
                                                          <p class="card-text">Cadastre , vizualize , E atualize Convenios cadastrados </p>
                                                          <a href="{{route('convenio.listar')}}" class="btn btn-primary">Convenios</a>
                                                        </div>
                                                      </div>
                                        </div>
                                        <div class="col-sm-4">
                                                        <div class="card text-center" style="width: 18rem;">
                                                                <div class="card-body">
                                                                  <h5 class="card-title">Funcionarios</h5>
                                                                  <p class="card-text">Cadastre , vizualize , E atualize Funcionarios cadastrados </p>
                                                                  <a href="{{route('funcionario.listar')}}"class="btn btn-primary">Funcionarios</a>
                                                                </div>
                                                              </div>
                                                </div>
                   
                                                    
                                     
        
        </div>
    
@endsection

@section('scripts')
  
<script type="text/javascript" src="{{ asset('js/carousel.js') }}"></script>

@endsection

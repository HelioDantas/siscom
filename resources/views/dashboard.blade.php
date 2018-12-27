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
<div class="container-fluid dashboard">

<div class="row ">
<div class="col-sm-3">
                <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Agenda</h5>
                          <p class="card-text">histórico de agendamentos e agendamentos do dia </p>
                          <a href="{{ route('agenda.index') }}" class="btn btn-primary">Consultar</a>
                        </div>
                      </div>
        </div>

    <div class="col-sm-3">
        <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Registros Clinicos</h5>
                  <p class="card-text">Confira os registros no sistema .</p>
                  <span class="card-text"><strong>Em desenvolvimento </strong></span>
                  

                  <a href="#" class="btn btn-primary">Consultar</a>
                </div>
              </div>
</div>
<div class="col-sm-3">
  <div class="card text-center" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Pacientes</h5>

            <p class="card-text">Cadastre, vizualize e atualize os pacientes cadastrados </p>

            <a href="{{route('paciente.listar')}}"class="btn btn-primary">Pacientes</a>
          </div>
        </div>
</div>
<div class="col-sm-3">
    <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Médico</h5>
                <p  type="hidden"class="card-text">Agenda  </p>
                <a href="{{route('medico.agenda')}}"class="btn btn-primary">Médico</a>
            </div>
          </div>
</div>
      

</div>
<hr>
<div class="container-fluid dashboard ">
        <div class="row ">
                       
                                <div class="col-sm-3">
                                                <div class="card text-center" style="width: 18rem;">
                                                        <div class="card-body">
                                                          <h5 class="card-title">Convenios</h5>
                                                          <p class="card-text">Cadastre, vizualize e atualize os convenios cadastrados </p>

                                                          <a href="{{route('convenio.listar')}}" class="btn btn-primary">Convenios</a>
                                                        </div>
                                                      </div>
                                        </div>
                                        <div class="col-sm-3">
                                                        <div class="card text-center" style="width: 18rem;">
                                                                <div class="card-body">
                                                                  <h5 class="card-title">Funcionarios</h5>
                                                                  <p class="card-text">Cadastre, vizualize e atualize funcionarios cadastrados </p>

                                                                  <a href="{{route('funcionario.listar')}}"class="btn btn-primary">Funcionarios</a>
                                                                </div>
                                                              </div>
                                            </div>
                                            <div class="col-sm-3">
                                              <div class="card text-center" style="width: 18rem;">
                                                      <div class="card-body">
                                                          <h5 class="card-title">Financeiro</h5>
                                                          <p  type="hidden"class="card-text"> </p>
                                                          <div class="">
                                                                  <p class="card-text"><strong> Em desenvolvimento<strong> </p>
                                                                    </div>

                                                             <a href="#"class="btn btn-primary">Financeiro</a> 

                                                            <!-- <a href="{{route('medico.agenda')}}"class="btn btn-primary">Médico</a> -->
                                                      </div>
                                                    </div>
                                      </div>
                   
                                                    
                                     
        
        </div>
    
@endsection

@section('scripts')
  
<script type="text/javascript" src="{{ asset('js/carousel.js') }}"></script>

@endsection

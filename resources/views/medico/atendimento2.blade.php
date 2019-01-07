@extends('layout.app')
  @section('links')
        <link rel="stylesheet" href="{{ URL::to('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css') }}">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    @endsection
 @section('estilos')
<style>

  .aside{
      margin-top: 5%;
      padding: 3%;
  }
  .btnTop{
      margin-top: 1rem;
      margin-left: 0.5rem;
  }
  .top {
    margin-top: 5rem;
  }
  .nav-tabs{

	background-color: #fafafa !important;
  }
  .cardImg{
    color: white !important;
  }

  label{
    color:#1b5e20;
  }
  .nav-link{
      color: black;
  }
  .navReg{
      margin-top: 2rem;
      background-color:blue;
  }
  .nav-tabs{background-color:#f4f6f9!important;}
.modal-content {width: 700px !important; margin-left:-20%;}
    .modal-body {  width:100%; }


</style>

@endsection

@section('telaListarPaciente')
    <hr>
        <div class = 'container-fluid corpo-paciente .d-flex'>
                <div class="row ">
                        <div class="col-2 align-self-start top ">

                            <form class = 'form-group ' action="{{ route('novo.registro') }}" name="form" method= 'POST'>
                                @csrf
                                @method('POST')
                                <div class = 'opcoesDeNavegacao '>

                                       <div class="form-group align-self-end" >
                                        <input type="hidden" name="dataAgendamento" value="{{ $agenda->data }}">
                                          <input class = 'form-control'type="text" name="tempo_atendimento" onload="setInterval('tempo()',983);return false" value="00:00:00" />



                                          <button class="btn btn-outline-danger  btnTop" type="submit" >Finalizar</button>
                                      </div>
                              </div>


                            </div>

                    <section class="col-10 align-self-end corpo-paciente-clinico-infos">
                            <div class="d-flex justify-content-end">

                                    <a class="btn btn-outline-secondary"  href="{{route('dashboard')}}" data-toggle="tooltip" title="Voltar"><i class="fas fa-share"></i></a>
                            </div>
                            <div class=" text-black ">
                                      @if (isset($paciente) && !empty($paciente))

                                      <h5 class="card-title d-flex justify-content-center"><p class="card-text" style="color:#004d40 ;"> {{ $paciente->nome }}</p></h5>
                                      <div class="card-body ">

                                          <div class=" container-fluid infosPaciente">
                                              <div class="row">
                                              <div class="col">
                                                <label for="">Idade:</label>
                                                <span class=""> {{ $paciente->age($paciente->dataDeNascimento) }}</span>
                                              </div>
                                              <div class="col">
                                                  <label for="">Cpf:</label>
                                                  <span class=""> {{ $paciente->cpf }}</span>
                                              </div>
                                              <div class="col">
                                                <label for="">Celular:</label>
                                                <span class=""> {{ $paciente->celular }}</span>
                                            </div>
                                            <div class="col">
                                                    <label for="">Email:</label>
                                              <span class=""> {{ $paciente->email }}</span>
                                          </div>
                                              <div class="col">
                                                <label for="">Planos:</label>
                                                <div>
                                                @foreach ($paciente->planos()->where('situacao','ATIVO')->get() as $value)
                                                <span class=""> {{ $value->nome }} | </span>
                                                @endforeach
                                              </div>
                                              </div>
                                            </div><!-- row -->
                                            <hr>
                                            <div class="row">
                                              <div class="col-3">
                                                <label for="">Cidade:</label>
                                                <span class=""> {{ $paciente->cidade }}</span>
                                              </div>
                                              <div class="col-2">
                                                <label for="">Bairro:</label>
                                                <span class=""> {{ $paciente->bairro }}</span>
                                              </div>
                                            </div><!-- row -->
                                          </div>
                                          <p class="card-text" style="color:#2200ff;">Infos do paciente</p>
                                        </div><!-- card-body -->
                                      </div><!-- card -->
                                      @endif



                        </section>
                </div><!-- row-->

                    <section>


                            <nav class="navReg">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sinais vitais e dados antropométricos</a>
                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Atendimento</a>
                                      <a class="nav-item nav-link  " id="nav-contact-tab"   onClick="colapseRegistroClinico('{{ $paciente->id }}')" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Registro Clinico</a>
                                    </div>
                                  </nav>

                                  <div class="tab-content" id="nav-tabContent">

                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="container-fluid">
                                              <div class="row">

                                                    <div class="col-md-1 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="tipo">Bebe</label>
                                                            <select class="form-control" name="bebe" id="bebe" required>

                                                                <option>S</option>
                                                                <option>N</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="tipo">Fuma</label>
                                                            <select class="form-control" name="fuma" id="fuma" required>
                                                                <option>S</option>
                                                                <option>N</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-10">
                                                        <div class="form-group">
                                                            <label for="tipo">Com qual frequencia realizar execicios fisicos?</label>
                                                            <select class="form-control" name="fisico" id="fisico" required>
                                                                <option>nenhuma</option>
                                                                <option>1 vez por semana</option>
                                                                <option>3 vez por semana</option>
                                                                <option>mais de 3 vez por semana</option>
                                                            </select>
                                                        </div>

                                                    </div>


                                                    <div class="col-md-1 col-sm-6">
                                                        <div class="form-group">

                                                            <label for="peso">Peso</label >
                                                            <input type="text" class="form-control name" maxlength="3" placeholder="" name="peso" id ='peso' required >

                                                        </div>
                                                    </div>

                                                        <div class=" col-sm-6 col-md-1">
                                                        <div class="form-group">

                                                            <label for="peso">Altura</label >
                                                            <input type="text" class="form-control name" maxlength="3" placeholder="" name="altura" id ='altura' required >

                                                        </div>
                                                    </div>

                                                    <div class=" col-sm-5 col-md-1">
                                                        <div class="form-group">

                                                            <label for="peso">Pressâo</label >
                                                            <input type="text" class="form-control name" maxlength="3" placeholder="" name="pressao" id ='pressao' required >

                                                        </div>
                                                    </div>

                                                        <div class="col-md-1 col-sm-6">
                                                            <div class="form-group">

                                                                <label for="peso">Pulso</label >
                                                                <input type="text" class="form-control name" maxlength="3" placeholder="" name="pulso" id ='pulso' required >

                                                            </div>
                                                      </div>

                                                        <div class="col-md-1 col-sm-6">
                                                            <div class="form-group">

                                                                <label for="peso">Temperatura</label >
                                                                <input type="text" class="form-control name" maxlength=3 placeholder="" name="temperatura" id ='temperatura' required >

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <label for="nome">Obs Pessoal</label>
                                                                <input type="text" class="form-control "  maxlength="100" name="obsPessoal" id ="ObsPessoal" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="exampleFormControlTextarea1">Historico familiar</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = 'historicoFamiliar'placeholder="Historico familiar"></textarea>
                                                        </div>

                                                     </div>

                                            </div>

                                        </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="container-fluid">
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label for="nome">Queixa principal</label>
                                                <input type="text" class="form-control"  maxlength="100" name="QueixaPrincipal" id ="QueixaPrincipal" >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleFormControlTextarea1">História</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="historia" rows="3" placeholder="História"></textarea>
                                        </div>
                                         <div class="form-group col-md-6">
                                            <label for="exampleFormControlTextarea1">Problemas</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"name="problemas" rows="3" placeholder="Problemas"></textarea>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="exampleFormControlTextarea1">Prognóstico</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="prognostico" rows="3" placeholder="Prognóstico"></textarea>
                                        </div>


                                       <div class="form-group col-md-6">
                                            <label for="exampleFormControlTextarea1">Orientação</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="orientacao" rows="3" placeholder="Orientação"></textarea>
                                        </div>
                                         <div class="form-group col-md-6">
                                            <label for="exampleFormControlTextarea1">Medicamentos</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1"name="medicamento" rows="3" placeholder="Medicamentos"></textarea>
                                        </div>

                                              <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1">Observações:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="observacoes"rows="3" placeholder="Medicamentos"></textarea>
                                        </div>

                                    </div>
                                </div>
                                    </div>

                                    <div class="tab-pane fade " id="nav-contact"   role="tabpanel" aria-labelledby="nav-contact-tab">

                                      <!-- fazer um foreach com as infos dos registros e de algum jeio mandar pro colapse -->


                                </div><!-- nav bar lateral -->
                            </div><!-- corpo da navbar lateral -->
                    </section>
                </form>
                </div>
        </div>






@endsection

    @section('scripts')
    <script>
		setInterval(function() {
			tempo();
		}, 1000);


        var segundo = 0+"0";
        var minuto = 0+"0";
        var hora = 0+"0";

        function tempo(){
        if (segundo < 59){
            segundo++
            if(segundo < 10){segundo = "0"+segundo}
        }else
            if(segundo == 59 && minuto < 59){
                segundo = 0+"0";
            minuto++;
            if(minuto < 10){minuto = "0"+minuto}
            }
        if(minuto == 59 && segundo == 59 && hora < 23){
            segundo = 0+"0";
            minuto = 0+"0";
            hora++;
            if(hora < 10){hora = "0"+hora}
        }else
            if(minuto == 59 && segundo == 59 && hora == 23){
                segundo = 0+"0";
            minuto = 0+"0";
            hora = 0+"0";
            }
        form.tempo_atendimento.value = hora +":"+ minuto +":"+ segundo
        }




  </script>



 <script type="text/javascript" language="JavaScript">
var segundo = 0+"0";
var minuto = 0+"0";
var hora = 0+"0";

function tempo(){
   if (segundo < 59){
      segundo++
      if(segundo < 10){segundo = "0"+segundo}
   }else
      if(segundo == 59 && minuto < 59){
         segundo = 0+"0";
	minuto++;
	if(minuto < 10){minuto = "0"+minuto}
      }
   if(minuto == 59 && segundo == 59 && hora < 23){
      segundo = 0+"0";
      minuto = 0+"0";
      hora++;
      if(hora < 10){hora = "0"+hora}
   }else
      if(minuto == 59 && segundo == 59 && hora == 23){
         segundo = 0+"0";
	minuto = 0+"0";
	hora = 0+"0";
      }
   form.tempo_atendimento.value = hora +":"+ minuto +":"+ segundo
}


</script>



</script>

    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    @endsection



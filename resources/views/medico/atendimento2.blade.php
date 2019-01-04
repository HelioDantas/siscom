@extends('layout.app')
  @section('links')   
        <link rel="stylesheet" href="{{ URL::to('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css') }}">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
    @endsection
 @section('estilos')
<style>
 
  aside{
      margin-top: 5%;
      padding: 3%;
  }
  .btnTop{
      margin-top: 1rem;
      margin-left: 0.5rem;
  }
  .top {
    margin-top: -1.1%;
  }
  .nav-tabs{
    
	background-color: #fafafa !important; 
  }
  .cardImg{
    color: white !important;
  }
.modal-content {width: 700px !important; margin-left:-20%;}
    .modal-body {  width:100%; } 
 

</style>

@endsection

@section('telaListarPaciente')
    <hr>
        <div class = 'container-fluid corpo-paciente .d-flex'>
                <div class="row top">
                        <aside class="col-2 d-flex justify-content-center">
                            
                            <form class = 'form-group 'name="form" method= 'get'>
                                <input class = 'form-control 'type="text" name="cronometro" value="00:00:00" />
                                <button class="btn btn-outline-secondary btnTop" type="button" onclick="setInterval('tempo()',983);return false;">Iniciar</button>
                                <button class="btn btn-outline-danger btnTop  " type="submit" >Finalizar</button>
                            </form>
                        
                        </aside>
        
                    <section class="col-10">
                            <div class="d-flex justify-content-end">
                        
                                    <a class="btn btn-outline-secondary"  href="{{route('dashboard')}}" data-toggle="tooltip" title="Voltar"><i class="fas fa-share"></i></a>
                            </div>
                            <div class="card  text-white">
                                    <svg class="bd-placeholder-img bd-placeholder-img-lg card-img" width="100%" height="270" xmlns="http://www.w3.org/2000/svg"
                                     preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Card image"><title>Placeholder</title><rect fill="#00BFFF" width="100%" height="100%"></rect><text fill="#dee2e6" dy=".3em" x="50%" y="50%"></text></svg>
                                   <!-- <img src="..." class="card-img" alt="..."> -->
                                   
                                    <div class="card-img-overlay">
                                      <div class="d-flex justify-content-start">
                                        
                                      </div>
                                      @if (isset($paciente) && !empty($paciente))
                                          
                                     
                                      <h5 class="card-title d-flex justify-content-center"><p class="card-text">{{ $paciente->nome }}</p></h5>
                                      <div class="card-body">
                                      
                                          <div class=" container-fluid row">
                                              <div class="col-3">
                                                <label for="">Idade:</label>
                                                <span class="">{{ $paciente->age($paciente->dataDeNascimento) }}</span>
                                              </div>
                                              <div class="col-2">
                                                  <label for="">Cpf:</label>
                                                  <span class="">{{ $paciente->cpf }}</span>
                                              </div>
                                              <div class="col-2">
                                                <label for="">Celular:</label>
                                                <span class="">{{ $paciente->celular }}</span>
                                            </div>
                                            <div class="col-2">
                                              <label for="">Email:</label>
                                              <span class="">{{ $paciente->email }}</span>
                                          </div>
                                              <div class="col-2">
                                                <label for="">Planos:</label>
                                                <div>
                                                @foreach ($paciente->planos()->where('situacao','ATIVO')->get() as $value)
                                                <span class="">{{ $value->nome }} | </span>  
                                                @endforeach
                                              </div>
                                              </div>
                                              <div class="col-3">
                                                <label for="">Cidade:</label>
                                                <span class="">{{ $paciente->cidade }}</span>
                                              </div>
                                              <div class="col-3">
                                                <label for="">Bairro:</label>
                                                <span class="">{{ $paciente->bairro }}</span>
                                              </div>
                                            </div>
                                           
                                      </div>
                                      @endif
                                      <p class="card-text">Last updated 3 mins ago</p>
                                    </div>
                                  </div>
                                </section>
                </div>
                    <section>

                        
                            <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sinais vitais e dados antropométricos</a>
                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Atendimento</a>
                                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Registro Clinico</a>
                                    </div>
                                  </nav>
                                  <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="container-fluid">
                                              <div class="row">

        
                                                <div class="col-1">
                                                    <div class="form-group">
                                                        <label for="tipo">Bebe</label>
                                                        <select class="form-control" name="Bebe" id="Bebe" required>
                                                        
                                                            <option>S</option>
                                                            <option>N</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="form-group">
                                                        <label for="tipo">Fuma</label>
                                                        <select class="form-control" name="Fuma" id="Fuma" required>
                                                            <option>S</option>
                                                            <option>N</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="tipo">Com qual frequencia realizar exames fisicos?</label>
                                                        <select class="form-control" name="fisico" id="fisico" required>
                                                            <option>nenhuma</option>
                                                            <option>1 vez por semana</option>
                                                            <option>3 vez por semana</option>
                                                            <option>mais de 3 vez por semana</option>
                                                        </select>
                                                    </div>
                                               
                                                </div>
                                            </div> 
                                            <div class="row">
                                
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                
                                                        <label for="peso">Peso</label >
                                                        <input type="text" class="form-control name" maxlength="3" placeholder="" name="peso" id ='peso' required >
                                
                                                    </div>
                                                </div>
                                
                                                    <div class="col-md-1">
                                                    <div class="form-group">
                                
                                                        <label for="peso">Altura</label >
                                                        <input type="text" class="form-control name" maxlength="3" placeholder="" name="Altura" id ='Altura' required >
                                
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                
                                                        <label for="peso">Pressâo</label >
                                                        <input type="text" class="form-control name" maxlength="3" placeholder="" name="Pressao" id ='Pressao' required >
                                
                                                    </div>
                                                </div>
                                
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                
                                                            <label for="peso">Pulso</label >
                                                            <input type="text" class="form-control name" maxlength="3" placeholder="" name="Pulso" id ='Pulso' required >
                                
                                                        </div>
                                                  </div>
                                
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                
                                                            <label for="peso">Temperatura</label >
                                                            <input type="text" class="form-control name" maxlength=3 placeholder="" name="Temperatura" id ='Temperatura' required >
                                
                                                        </div>
                                                    </div>
                                
                                                </div>
                                                <div class="row"> 
                                                            
                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label for="nome">Obs Pessoais</label>
                                                            <input type="text" class="form-control "  maxlength="100" name="QueixaPrincipal" id ="Obs Pessoais" required>
                                                        </div>
                                                    </div>
                                
                                                    <div class="form-group col-md-12">
                                                        <label for="exampleFormControlTextarea1">Historico familiar</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Historico familiar"></textarea>
                                                    </div>          
                                                  </div>
                                            </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                      <div class="row"> 
                
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="nome">Queixa principal</label>
                                                <input type="text" class="form-control "  maxlength="100" name="QueixaPrincipal" id ="QueixaPrincipal" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1">História</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="História"></textarea>
                                        </div>
                                         <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1">Problemas</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Problemas"></textarea>
                                        </div> 
                        
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1">Prognóstico</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Prognóstico"></textarea>
                                        </div>                       
                                    
                                    
                                       <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1">Orientação</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Orientação"></textarea>
                                        </div>     
                                         <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1">Medicamentos</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Medicamentos"></textarea>
                                        </div>   
                        
                                              <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1">Observações:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Medicamentos"></textarea>
                                        </div>   
                                          
                                    </div>
                        
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                                      <!-- fazer um foreach com as infos dos registros e de algum jeio mandar pro colapse -->
                                    
                                      <a data-toggle="collapse" id="registroCollapse" value= {{ 2 }}><p>Ordenado por data .</p></a>
                                     

                                               <!-- corpo do colapse -->
                                    <div id="Registro" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <div class=" container row">
                                            <div class="col-3">
                                              <label for="">Nome:</label>
                                              <span id="Rnome">fadfafaf</span>
                                            </div>
                                            <div class="col-3">
                                              <label for="">Idade:</label>
                                              <span  id="Ridade">dfadfafda</span>
                                            </div>
                                            <div class="col-2">
                                                <label for="">peso:</label>
                                                <span  id="Rpeso">fafdafafd</span>
                                            </div>
                                            <div class="col-2">
                                              <label for="">Altura:</label>
                                              <span c id="Raltura">fadfadfdf</span>
                                            </div>
                                            <div class="col-3">
                                              <label for="">Sintoma:</label>
                                              <span  id="Rsistoma">fgfdafafd</span>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div><!-- nav bar lateral -->
                            </div><!-- corpo da navbar lateral -->
                    </section>
                        
                </div>
        </div>
           
    
            
     
  

@endsection

    @section('scripts')
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
   form.cronometro.value = hora +":"+ minuto +":"+ segundo
}


</script>
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    @endsection



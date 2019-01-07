@extends('layout.app')
  @section('links')   
        <link rel="stylesheet" href="{{ URL::to('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css') }}">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
    @endsection
 @section('estilos')
<style>
  
    .tdEspaco { display: table; float:left; margin-right:10px }
  
    .save{
        margin-top: 2rem;
        float:right;
        
    }
    .back{
        margin-top: 2rem;
        float:right;
        padding-left: 1rem;
    }
    .ctt{
      
   -ms-flex-align: center;
     
     }
     .lista{
         margin-top: 1rem;
         text-align: center;
     }
   
     #detalheTop{
        margin-top: 5%;
     }
   .center{
     margin: auto;
    width: 50%;
    padding: 10px;
   
    text-align: center;
 

   }
  
.fixed_header {
  display:block;
  overflow:auto;
 
  height:33rem;

  
 
}
.ui-front {
    z-index: 9999;
}

.contentBusca{
    margin-top: 1rem;
}

.opcoesDeNavegacao{
 
   display: inline-block;
    
}
 
 .yyyyy{

      
  
    
     margin: auto;

 }
  .infosPaciente{
      border-radius: 20px ;
  }
 .right {
 
   margin-left: 7%;
  display: inline-block;
    width: 80%;

}
  .btnTop{
      margin-top: 1rem;
      margin-left: 0.5rem;
  }
.modal-content {width: 700px !important; margin-left:-20%;}
    .modal-body {  width:100%; } 
 

</style>

@endsection

@section('telaListarPaciente')
<hr>
<div class = 'container-fluid col-lg-12 corpo-paciente'>
    <div class ="yyyyy">

        <div class = 'opcoesDeNavegacao '>
            
              {!! Form::open(['route' => 'medico.registro','method ' => 'post','name'=>'form']) !!} @csrf
                 <div class="form-group align-self-end" >
                  
                    <input class = 'form-control'type="text" name="tempo_atendimento" onload="setInterval('tempo()',983);return false" value="00:00:00" />
                
                 
                 
                    <button class="btn btn-outline-danger  btnTop" type="submit" >Finalizar</button>          
                </div>
        </div>

        <div class= 'right'>
            
            <a class="btn btn-outline-secondary ladoDireito"  href="{{route('dashboard')}}" data-toggle="tooltip" title="Voltar"><i class="fas fa-share"></i></a>
      
 
            <div class="jumbotron jumbotron-fluid  ">
                    <div class="container ">
                        
                        <p class="lead d-flex justify-content-center"> Paciente em atendimento.</p>
                        @if (isset($paciente) && !empty($paciente))
                                          
                                     
                             <h5 class="card-title d-flex justify-content-center"><p class="card-text">{{ $paciente->nome }}</p></h5>
                                      <div class="card-body ">
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
                                                    @foreach ($paciente->planos()->where('situacao','ATIVO')->get() as $value)
                                                    <span class=""> {{ $value->nome }} | </span>  
                                                    @endforeach
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
                                            </div>
                                    </div>
                               
                                    
                            @endif
                    </div>
            </div>

        </div>

    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Sinais vitais e dados antropométricos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Atendimento</a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Registros Clinicos</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
       
        <div class="tab-pane fade show active   " id="contact" role="tabpanel" aria-labelledby="contact-tab">

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
                <div class="col-md-3 col-sm-10">
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
    
         <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">

            @if(isset($agenda) && isset($paciente))
                <input type="hidden" value="{{$agenda->id}}" name="agenda_id">
                <input type="hidden" value="{{$paciente->id}}" name="paciente_id">
            @endif
            <div class="row"> 
                
                <div class="col-md-12">
                    <div class="form-group ">
                        <label for="nome">Queixa principal</label>
                        <input type="text" class="form-control "  maxlength="100" name="queixaPrincipal" id ="QueixaPrincipal" value = "{{ old('queixaPrincipal') }}" required>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">História</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="historia" rows="3" required placeholder="História"></textarea>
                </div>
                 <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">Problemas</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"name="problemas" required placeholder="Problemas"value = "{{ old('problemas') }}"></textarea>
                </div> 

                <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">Prognóstico</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="prognostico" required placeholder="Prognóstico" ></textarea>
                </div>                       
            
            
               <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">Orientação</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="orientacao"placeholder="Orientação"></textarea>
                </div>     
                 <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">Medicamentos</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="medicamento" required placeholder="Medicamentos"></textarea>
                </div>   

                      <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">Observações:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observacoes" placeholder="Observações"></textarea>
                </div>   
                  
            </div>

        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Nulla est ullamco ut irure incididunt nulla Lorem Lorem minim irure officia enim reprehenderit. Magna duis labore cillum sint adipisicing exercitation ipsum. Nostrud ut anim non exercitation velit laboris fugiat cupidatat. Commodo esse dolore fugiat sint velit ullamco magna consequat voluptate minim amet aliquip ipsum aute laboris nisi. Labore labore veniam irure irure ipsum pariatur mollit magna in cupidatat dolore magna irure esse tempor ad mollit. Dolore commodo nulla minim amet ipsum officia consectetur amet ullamco voluptate nisi commodo ea sit eu.</div>

          {!! Form::close() !!}  
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

    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    @endsection



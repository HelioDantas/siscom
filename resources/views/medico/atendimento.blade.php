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
 .right {
 
   margin-left: 7%;
  display: inline-block;
    width: 80%;

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
                        
                            <form class = ''name="form" method= 'get'>
                                <input class = 'form-control'type="text" name="cronometro" onload='setInterval('tempo()',983);return false' value="00:00:00" />
                            
                                <button class="btn btn-outline-secondary  " type="button" onclick="setInterval('tempo()',983);return false;">Iniciar</button>
                                <button class="btn btn-outline-danger  " type="submit" >Finalizar</button>
                            </form>
                        
                    </div>

                    <div class= 'right'>
                        
                        <a class="btn btn-outline-secondary ladoDireito"  href="{{route('dashboard')}}" data-toggle="tooltip" title="Voltar"><i class="fas fa-share"></i></a>
                        <a class="btn btn-outline-success ladoDireito" data-toggle="modal" data-target=".bd-example-modal-x" title="Agendar"> <i class="fas fa-plus-circle"></i></a>
                    
                        
                        <div class="jumbotron jumbotron-fluid  ">
                                <div class="container ">
                                    <h1 class="display-4">Fluid jumbotron</h1>
                                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                                </div>
                        </div>
            
                    </div>
           
            </div>
        
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Atendimento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Registros Clinicos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <form>
                    <div class="row"> 
                       
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="nome">Queixa principal</label>
                                <input type="text" class="form-control "  maxlength="50" name="QueixaPrincipal" id ="QueixaPrincipal" required>
                            </div>
                        </div>
                         <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">História</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="História"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">Prognóstico</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Prognóstico"></textarea>
                        </div>                       
                    </div>
                    </form>   

                </div>
                
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Nulla est ullamco ut irure incididunt nulla Lorem Lorem minim irure officia enim reprehenderit. Magna duis labore cillum sint adipisicing exercitation ipsum. Nostrud ut anim non exercitation velit laboris fugiat cupidatat. Commodo esse dolore fugiat sint velit ullamco magna consequat voluptate minim amet aliquip ipsum aute laboris nisi. Labore labore veniam irure irure ipsum pariatur mollit magna in cupidatat dolore magna irure esse tempor ad mollit. Dolore commodo nulla minim amet ipsum officia consectetur amet ullamco voluptate nisi commodo ea sit eu.</div>

                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Nulla est ullamco ut irure incididunt nulla Lorem Lorem minim irure officia enim reprehenderit. Magna duis labore cillum sint adipisicing exercitation ipsum. Nostrud ut anim non exercitation velit laboris fugiat cupidatat. Commodo esse dolore fugiat sint velit ullamco magna consequat voluptate minim amet aliquip ipsum aute laboris nisi. Labore labore veniam irure irure ipsum pariatur mollit magna in cupidatat dolore magna irure esse tempor ad mollit. Dolore commodo nulla minim amet ipsum officia consectetur amet ullamco voluptate nisi commodo ea sit eu.</div>
                
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



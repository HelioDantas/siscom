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
  .nav-tabs{
    
	background-color: #fafafa !important; 
  }
  
.modal-content {width: 700px !important; margin-left:-20%;}
    .modal-body {  width:100%; } 
 

</style>

@endsection

@section('telaListarPaciente')
    <hr>
        <div class = 'container-fluid corpo-paciente .d-flex'>
                <div class="row">
                        <aside class="col-2 d-flex justify-content-center">
                            
                            <form class = 'form-group 'name="form" method= 'get'>
                                <input class = 'form-control 'type="text" name="cronometro" value="00:00:00" />
                                <button class="btn btn-outline-secondary btnTop" type="button" onclick="setInterval('tempo()',983);return false;">Iniciar</button>
                                <button class="btn btn-outline-danger btnTop  " type="submit" >Finalizar</button>
                            </form>
                        
                        </aside>
        
                    <section class="col-10">
                            <div class="d-flex justify-content-end">
                        
                                    <a class="btn btn-outline-secondary ladoDireito"  href="{{route('dashboard')}}" data-toggle="tooltip" title="Voltar"><i class="fas fa-share"></i></a>
                                    <a class="btn btn-outline-success ladoDireito" data-toggle="modal" data-target=".bd-example-modal-x" title="Agendar"> <i class="fas fa-plus-circle"></i></a>
                            </div>
                            <div class="card  text-white">
                                    <svg class="bd-placeholder-img bd-placeholder-img-lg card-img" width="100%" height="270" xmlns="http://www.w3.org/2000/svg"
                                     preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Card image"><title>Placeholder</title><rect fill="#05a7ff" width="100%" height="100%"></rect><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Card image</text></svg>
                                   <!-- <img src="..." class="card-img" alt="..."> -->
                                    <div class="card-img-overlay">
                                      <h5 class="card-title">Card title</h5>
                                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                      <p class="card-text">Last updated 3 mins ago</p>
                                    </div>
                                  </div>
                                </section>
                </div>
                    <section>

                        
                            <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                                    </div>
                                  </nav>
                                  <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="container-fluid">
                                                <form action="" method="post">
                                                    <div class="row">
                                                        <div class="col-12 form-group">
                                                            <div class="form-group">
                                                                    <label for="queixa">Queixa Principal</label>
                                                                    <input type="text" class="form-control" id="queixa">
                                                            </div>
                                                        </div>
                                                        <div class="col-6 ">
                                                           <div class="form-group">
                                                                <span for="historia">historia</span>
                                                                <textarea name="historia" id="historia" cols="60" rows="10" class="form-control"></textarea>
                                                           </div>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="card-deck">
                                                    <div class="card">
                                                      <img class="card-img-top" src=".../100px200/" alt="Card image cap">
                                                      <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                      </div>
                                                    </div>
                                                    <div class="card">
                                                      <img class="card-img-top" src=".../100px200/" alt="Card image cap">
                                                      <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                      </div>
                                                    </div>
                                                    <div class="card">
                                                      <img class="card-img-top" src=".../100px200/" alt="Card image cap">
                                                      <div class="card-body">
                                                        <h5 class="card-title">Card title</h5>
                                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                      </div>
                                                    </div>
                                                  </div>

                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                                            <div class="row">
                                                    <div class="col-sm-6">
                                                      <div class="card">
                                                        <div class="card-body">
                                                          <h5 class="card-title">Special title treatment</h5>
                                                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                          <a href="#" class="btn btn-primary">Go somewhere</a>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                      <div class="card">
                                                        <div class="card-body">
                                                          <h5 class="card-title">Special title treatment</h5>
                                                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                          <a href="#" class="btn btn-primary">Go somewhere</a>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                    </div>
                                  </div>
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



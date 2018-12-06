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
            color: #3490dc;
             background-color: transparent;
            background-image: none;
            border-color: #3490dc;
        }

</style>
@endsection


@section('tela')
<div class="container dashboard">
<div class="row ">
    <div class="col-sm-4">
            <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
    </div>
    <div class="col-sm-4">
            <div class="card col-mb-3 " style="max-width: 18rem;">
                    <div class="card-header  text-white bg-primary  text-center">Registros Clinicos</div>
                    <div class="card-body">
                      <h5 class="card-title">Primary card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
    
                </div>
        </div>
           
        <div class="col-sm-4">
                <div class="card col-mb-3 " style="max-width: 18rem;">
                        <div class="card-header  text-white bg-primary  text-center">Consultas Agendadas</div>
                        <div class="card-body">
                          <h5 class="card-title">Primary card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
        
                    </div>
            </div>                                      
                             
</div>

</div>
<hr>
<div class="container dashboard ">
        <div class="row ">
            <div class="col-sm-4">
                <div class="card col-mb-3 " style="max-width: 18rem;">
                        <div class="card-header  text-white bg-primary  text-center">Pacientes</div>
                        <div class="card-body">
                          <h5 class="card-title">Primary card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
        
                    </div>
            </div>
            <div class="col-sm-4">
                    <div class="card col-mb-3 " style="max-width: 18rem;">
                            <div class="card-header  text-white bg-primary  text-center">Convenios</div>
                            <div class="card-body">
                              <h5 class="card-title">Primary card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
            
                        </div>
                </div>
                   
                <div class="col-sm-4">
                        <div class="card col-mb-3 " style="max-width: 18rem;">
                                <div class="card-header  text-white bg-primary  text-center">Funcionarios</div>
                                <div class="card-body">
                                  <h5 class="card-title">Primary card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                
                            </div>
                    </div>                                      
                                     
        </div>
        
        </div>
@endsection

@section('scripts')
  
<script type="text/javascript" src="{{ asset('js/carousel.js') }}"></script>

@endsection

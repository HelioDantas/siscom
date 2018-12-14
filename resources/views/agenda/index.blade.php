@extends('layout.app')
 @section('estilos')
<style>
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
         margin-top: 2rem;
         text-align: center;
     }
     form{
         margin-left: 15%;
     }
     .h2{
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
   .row{

      text-align: center; 
   }

.fixed_header {
  display:block;
  overflow:auto;
 
  height:20rem;

  
 
}
.fixed_header header {


 
}



}</style>
@endsection

@section('tela')
    <hr>
        <div class = 'container-fluid col-lg-12 corpo-paciente'>
           <h4 class="center textocenter">Agenda</h4>

            <div class = '  '>
          
                        <div class="col-md-4 mb-3 center">
                            <div class="">

                                <label for="selectbasic">Medicos </label>

                                <select id="medico" class = "form-control">
                                 <option value="">selecione</option>    
                                @foreach($especialidade as $e)
                                    <optgroup label="{{$e->nome}}">
                                        @foreach($e->Medico as $medico)
                                             <option value={{$medico->funcionario->matricula}}>{{$medico->funcionario->nome}}</option>
                                        @endforeach
                                    </optgroup>
                                 @endforeach
                                 </select>
                            </div>
                        </div>
               

               
                        <div class="  col-md-3 mb-3 center">
                            <label for="nome">Data</label>
                            <input type="date" name="nome" id="nome"   value = document.querySelector('input[type="date"]') maxlength="49" class="form-control {{$errors->has('nome') ? 'is-invalid': '' }}" placeholder="nome" required
                            @if(!empty($p)) value = "{{$p->nome}}" @else value = {{old('nome')}} @endif>

                        </div>
                    

                    </div>

                    <div class="table-responsive  fixed_header" style="overflow-x:auto, overflow-y:auto;">  

                        <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">horario      </th>
                            <th scope="col">paciente           </th>   
                            <th scope="col">procedimeno             </th>
                            <th scope="col">opções</th>
                        </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>

        


        </div>
      

        </div>
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="container-fluid">
                    <form>
                       <div class="row">
                           <div class="col">

                            <input type="text" class="form-control">
                           </div>
                           <div class="col"></div>
                           <div class="col"></div>
                           <div class="col"></div>
                           <div class="col"></div>
                           <div class="col"></div>
                       </div>
                       
                    </form>
                </div>
              </div>
            </div>
          </div>

@endsection

    @section('scripts')
    
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>

<script>

 

</script>
    @endsection



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

                                <select class = "form-control">
                                @foreach($especialidade as $e)
                                    <optgroup label="{{$e->nome}}">
                                        @foreach($e->Medico as $medico)
                                             <option value="volvo">{{$medico->funcionario->nome}}</option>
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
                        <table class="table table-hover ">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">hora     </th>
                                    <th scope="col">paciente          </th>   
                                    <th scope="col">cpf            </th>
                                    <th scope="col">nascimento      </th>
                                    <th scope="col">sexo            </th>                                
                                </tr>
                            </thead>
                            <tbody>
                           
                                  
                                    
                                    <tr >
                                        <th scope="row">     $cont  </th>
                        
                                        <td scope="col" class="info-nome">  aaa </td>
                                        <td scope="col">        aaaa                </td>
                                    
                                        <td scope="col">          aaaa           </td>
                                        <td scope="col">           aaa        </td>
                              
                                    </tr>
                           
                        </tbody>
                   
                      </table> 
                 </div>
                 <ol>
  
                </ol>
        <button id="btn2">Prepend list item</button>
        </div>

@endsection

    @section('scripts')
    
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>

<script>
$(document).ready(function(){
 

</script>
    @endsection



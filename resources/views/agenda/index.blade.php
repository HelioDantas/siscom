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
 
  height:30rem;

  
 
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
                     <!--        <th scope="col">nascimento      </th>
                            <th scope="col">sexo            </th>
                            <th scope="col">telefone        </th>
                            <th scope="col">naturalidade    </th>
                       <th scope="col">rua             </th>
                            <th scope="col">numero          </th>
                            <th scope="col">bairro          </th>
                            <th scope="col">cep             </th>
                            <th scope="col">cidade          </th>
                            <th scope="col">estado          </th>
                            <th scope="col">telefone        </th>
                            <th scope="col">celular         </th>
                            <th scope="col">email           </th>-->
                           
                            <th scope="col">opções</th>
                        </tr>
                        </thead>
                        <tbody>
                                @php $countt= 0; @endphp
                          @if (isset($horarios))
                          @php $count=0; @endphp
                              @foreach ($horarios as $h)
                                  <tr>
                                      <td>{{ $h }}</td>
                                    @if (!empty($agendamentos[$count]) && $h ==  $agendamentos[$count]->hora)
                                    <td>{{ $agendamentos[$count]->paciente }}</td>
                                    <td>{{ $agendamentos[$count]->cpf }}</td>
                                
                                    @else
                                    <td></td>
                                    <td></td>
                                  
                                    @php $count++; @endphp
                                    @endif
                                    @php $countt++; @endphp
                                      <td id="btnCad"><a class="btn btn-outline-success" data-toggle="modal" data-target=".bd-example-modal-x{{ $countt }}" title="cadastrar">
                                            <i class="fas fa-plus-circle"></i></a>
                                         </td>
                                  

                                   
                                  <div class="modal fade bd-example-modal-x{{ $countt }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-x{{ $countt }}">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                <form>
                                                    <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                        <label for="inputEmail4">primeiro Nome</label>
                                                        <input type="text" class="form-control" id="inputEmail4" placeholder="nome">
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                        <label for="inputPassword4">cpf</label>
                                                        <input type="text" class="form-control" id="inputPassword4" placeholder="cpf">
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="inputAddress">horario</label>
                                                      <input type="text" class="form-control" id="inputAddress" value="{{ $h }}" >
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="inputAddress2">procedimento</label>
                                                      <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                                    </div>
                                                    <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                        <label for="inputCity">Medico</label>
                                                        <input type="text" class="form-control" id="inputCity"  @if(isset($med)) value="{{$med->funcionario->nome}}" @else value ="n tem" @endif>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                        <label for="inputState">State</label>
                                                        <select id="inputState" class="form-control">
                                                          <option selected>Choose...</option>
                                                          <option>...</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group col-md-2">
                                                        <label for="inputZip">Zip</label>
                                                        <input type="text" class="form-control" id="inputZip">
                                                      </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                                        <label class="form-check-label" for="gridCheck">
                                                          Check me out
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                                  </form>
                                            </div>
                                            </div>
                                            </div>
                                          </div>
                                        </div>
                                    </tr>
                              @endforeach
                        
                              
                          @endif
                        </tbody>


        </div>
      

        </div>
       

@endsection

    @section('scripts')
    
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>
<script>
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}
</script>
    @endsection



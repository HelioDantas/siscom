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
                    <a class="btn btn-outline-success ladoDireito" data-toggle="modal" data-target=".bd-example-modal-x" title="cadastrar">
                                            <i class="fas fa-plus-circle"></i></a>
                    <div class="table-responsive  fixed_header" style="overflow-x:auto, overflow-y:auto;">  

                        <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">horario      </th>
                            <th scope="col">paciente     </th>   
                        
                            <th scope="col">cpf          </th>
                            <th scope="col">opções       </th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (isset($agendamentos))
                        
                              @foreach ($agendamentos as $h)
                                  <tr>
                                      <td>{{ $h->hora }}</td>
                                      <td>{{ $h->paciente }}</td>
                                      <td>{{ $h->cpf }}</td>
                                     
                               
                                  
                                   
                                 <td>  
                                               
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter" title="desmarcar"><i class="fas fa-times"></i></button>
                                    <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Exclusão</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                        </div>
                                                        <div class="modal-body">
                                                             Desmarcar consulta do paciente {{$h->paciente}}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => 'agenda.desmarcar','method ' => 'post',]) !!} @csrf
                                                            
                                                            <input type = "hidden" id = "id" name = "id" valeu = {{ $h->id }} >
                                                            <button id="excluir"name = "excluir" class="btn btn-outline-danger" type="submit"  data-toggle="tooltip" data-placement="top" title="excluir">excluir</button>
                                                                  {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>  
                                               <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>

                                 </td>
                              </tr>
                              @endforeach
                        
                              
                          @endif
                        </tbody>
                        </table>
                        </div>

                         <div class="modal fade bd-example-modal-x" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-x">
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
                                                      <input type="text" class="form-control" id="inputAddress" value="" >
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
      

        </div>
       

@endsection

    @section('scripts')
    
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>

<script>

 

</script>
    @endsection



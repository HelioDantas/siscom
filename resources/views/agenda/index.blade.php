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
         margin-top: 1rem;
         text-align: center;
     }
     form{
         margin-left: 15%;
     }
     input{

            text-align: center;
     }
   
     #detalheTop{
        margin-top: 5%;
     }
   .center{
     margin: auto;
    width: 50%;
    padding: 10px;
    padding-top: 0;
    text-align: center;
    padding-bottom: 0;

   }
   .row{

      text-align: center; 
   }

.fixed_header {
  display:block;
  overflow:auto;
 
  height:33rem;

  
 
}
.fixed_header header {


 
}


.modal-content{width: 800px !important; margin-left: -30%;}
    .modal-body {  width:100%; } 
 

</style>
@endsection

@section('tela')
    <hr>
        <div class = 'container-fluid col-lg-12 corpo-paciente'>
           <h4 class="center textocenter">Agenda</h4>
            <a class="btn btn-outline-success ladoDireito" data-toggle="modal" data-target=".bd-example-modal-x" title="Agendar"> <i class="fas fa-plus-circle"></i></a>
           
            <div class = ' lista '>
            
                        <div class="col-md-4 mb-3 center">
                           {{old('medico') }}

                                <label for="selectbasic">Medicos </label>

                                <select id="medico" name = 'medico' class = "form-control" value = {{old('medico')}}>  
                                    @if(empty($medicoId))
                                    <option value="">selecione</option>  
                                  @endif
                                @foreach($especialidade as $e)
                                    <optgroup label="{{$e->nome}}">
                                        @foreach($e->Medico as $medico)
                                          @if($medicoId == $medico->funcionario->matricula)
                                             <option selected value={{$medico->funcionario->matricula}}>{{$medico->funcionario->nome}}</option>
                                             @else
                                                 <option value={{$medico->funcionario->matricula}}>{{$medico->funcionario->nome}}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                 @endforeach
                                 </select>
                           
                        </div>
             

               
                        <div class="  col-md-3 mb-3 center">
                            <label for="data">Data</label>
                            <input type="date" name="data" id="data"    maxlength="20" class="form-control {{$errors->has('data') ? 'is-invalid': '' }}"   
                             @if(empty($date) && $date == "" ) value= '<?php echo date("Y-m-d"); ?>' @else value = {{ $date}}@endif>

                        </div>
                    

                    </div>
                    

                    <div class="table-responsive  fixed_header" style="overflow-x:auto, overflow-y:auto;">  

                        <table class="table table-striped">
                        <thead class="thead-light">
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
                                               
                                                <button type="button" class="btn btn-outline-danger" data-catid = {{ $h->id }} data-toggle="modal" data-target='#delete' title="desmarcar"><i class="fas fa-times"></i></button>
                                    <!-- Modal -->
                                    
                                               <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Remarcar"><i class="fas fa-redo"></i></a>

                                 </td>
                              </tr>
                              @endforeach
                        
                              
                          @endif
                        </tbody>
                        </table>
                        </div>

                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Exclusão</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                        </div>
                                                        <div class="modal-body">
                                                             Desmarcar consulta do paciente ?
                                                               {!! Form::open(['route' => 'agenda.desmarcar','method ' => 'post',]) !!} 
                                                            <input type = "hidden" id = "id" name = "id" value = "" >
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                              
                                                             
                                                            <button id="excluir"name = "excluir" class="btn btn-outline-danger" type="submit"   data-toggle="tooltip" data-placement="top" title="excluir">Desmarcar</button>
                                                                  {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>  


                        
                  {{--     <!--  <div class="modal fade bd-example-modal-x" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-x">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                               @component('components.formAgenda')
                                                   
                                               @endcomponent

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


        </div> -->--}}

        <form>
            <div class="modal fade bd-example-modal-x" id="create">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                            <!--<button type="button" class="close" data-dismiss="modal">
                               
                            </button> -->
                            <h4 text-center>Novo Agendamento</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="preco">Cpf</label>
                                          <input type="text" class="form-control" placeholder="" name="cpf" required>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="preco">Data de Nascimento</label>
                                          <input type="text" class="form-control" placeholder="" name="cpf" required>
                                      </div>
                                  </div>
                                </div>
                              <div class="row">
                                  <div class="col-md-8">
                                <div class="form-group">
                                    <label for="descricao">Nome Paciente</label>
                                    <input type="text" class="form-control" placeholder="" name="nome" required>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="descricao">telefone</label>
                                    <input type="text" class="form-control" placeholder="" name="nome" required>
                                </div>
                                </div>
                              </div>
                                   <div class="row">
                                     
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="qtdQuartos">Medico</label>
                                                <input type="text" class="form-control" value="{{$medico->funcionario->nome}}" name="medico">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="qtdQuartos">Atendente</label>
                                                <input type="text" class="form-control" value="{{ Auth::User()->funcionario->nome }}" name="medico">
                                            </div>
                                        </div>
                                    </div>
          
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tipo">procedimento</label>
                                                <select class="form-control" name="procedimento" required>
                                                    <option>selecione</option>
                                                  @foreach ($medico as $item)
                                                  <option>proced 2</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      <!--  <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="qtdQuartos">Finalidade do imóvel</label>
                                                <select class="form-control" name="finalidade" required>
                                                    <option>Venda</option>
                                                    <option>Locação</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>Endereço</h4> -->
                                </div>
                               
                                    <hr>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="numero">Data</label>
                                            <input type="date" class="form-control" placeholder="Número" required name="numeroEndereco">
                                        </div>
                                    </div>
                                     
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="bairroEndereco">horario</label>
                                                  <input type="time" class="form-control" placeholder="Bairro" required name="bairroEndereco">
                                              </div>
                                          </div>

                                          <!--
                                          <div class="col-md-2">
                                              <div class="form-group">
                                                  <label for="numero">Número</label>
                                                  <input type="number" class="form-control" placeholder="Número" required name="numeroEndereco">
                                              </div>
                                          </div>
                                      </div>
                                    -->
          
                          </div>
                          <div class="modal-footer">
                              <input type="submit" class="btn btn-primary" value="Salvar">
                          </div>
                      </div>
                  </div>
              </div>
          
            </form>
      


       

@endsection

    @section('scripts')
    
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>


    @endsection



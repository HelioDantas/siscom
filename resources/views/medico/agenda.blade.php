@extends('layout.app')

    @section('links')   
        <link rel="stylesheet" href="{{ URL::to('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css') }}">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    @endsection
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
.ui-front {
    z-index: 9999;
}


.fixed_header header {


 
}


.modal-content{width: 800px !important; margin-left: -30%;}
    .modal-body {  width:100%; } 
 

</style>
@endsection

@section('telaListarPaciente')
    <hr>
        <div class = 'container-fluid col-lg-12 corpo-paciente'>
           <h4 class="center textocenter">Agenda</h4>
            <a class="btn btn-outline-success ladoDireito" data-toggle="modal" data-target=".bd-example-modal-x" title="Agendar"> <i class="fas fa-plus-circle"></i></a>
           
            <div class = ' lista '>
            
                    

               
                        <div class="  col-md-3 mb-3 center">
                            <label for="data">Data</label>
                            <input type="date" name="data" id="data"    maxlength="20" class="form-control {{$errors->has('data') ? 'is-invalid': '' }}"   
                             @if(empty($date) && $date == "" ) value= '<?php echo date("Y-m-d"); ?>' @else value = {{ $date}}@endif>

                        </div>
                    

                    </div>
                    

                    <div class="table-responsive  fixed_header" style="overflow-x:auto, overflow-y:auto;">  

                        <table class="table table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">horario      </th>
                            <th scope="col">paciente     </th>   
                        
                            <th scope="col">cpf          </th>
                             <th scope="col">telefone     </th> 
                              <th scope="col">celular     </th>     
                         
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
                                      <td>{{ $h->telefone }}</td>
                                       <td>{{ $h->celular }}</td>
                                      
                                  
                                   
                                 <td>   
                                               
                                                <button type="button" class="btn btn-outline-danger ui-front" data-catid = {{ $h->id }} data-toggle="modal" data-target='#delete' title="desmarcar"><i class="fas fa-times"></i></button>
                                    <!-- Modal -->
                                    
                                            <!--   <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Remarcar"><i class="fas fa-redo"></i></a>-->

                                 </td>
                              </tr>
                              @endforeach
                        
                              
                          @endif
                        </tbody>
                        </table>
                        </div>

                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered " role="document">
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


                                 </td>
                              </tr>
                             
                        
                              
                        
                        </tbody>
                    </table>


                        
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

        <form action="{{ route('agenda.agendar') }}" method="POST">
             @method('POST')
              @csrf
              {{-- input atendente --}}
              <input type="hidden"value="{{ Auth::User()->funcionario->nome }}" name="atendente">

              {{-- input medico
              <input type="hidden"value="{{$medico->funcionario->nome}}" name="medico"> --}}

              <input id="espec" type="hidden"  name="espec">
            <div class="modal fade bd-example-modal-x"  data-target = '#auto'   id="create">
                  <div class="modal-dialog  ui-front">

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

                                          <label for="preco">Cpf</label >
                                          <input type="text" class="form-control" placeholder="" name="cpf" id = 'cpf' required autofocus>

                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="dataNascimento">Data de Nascimento</label>
                                          <input type="date" class="form-control" id="data" placeholder="" name="dataDeNascimento" >
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pv">Primeira Vez ?</label>
                                        <input type="checkbox" name="primeiraVez" id="pv">
                                    </div>
                                  </div>
                            </div>
                              <div class="row"> 
                                  <div class="col-md-12">

                                <div class="form-group ">
                                    <label for="nome">Nome Paciente</label>
                                    <input type="text" class="form-control" placeholder="" name="nome" id ="nome" required>
                                </div>
                                </div>
                              </div>
                                   <div class="row">
                                     

                                      
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="telefone">telefone</label>
                                            <input type="text" class="form-control" id="telefone" placeholder="" name="telefone" >

                                        </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="telefone">celular</label>
                                                <input type="text" class="form-control" id="celular" placeholder="" name="telefone" >
                                            </div>
                                        </div>
                                   </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="tipo">procedimento</label>
                                                <select class="form-control" name="procedimento" required>
                                                    <option>selecione</option>
                                                
                                            
                                             
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
                                            <label for="data">Data</label>
                                            <input type="date" class="form-control" placeholder="Número" required name="data">
                                        </div>
                                    </div>
                                     
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="horario">horario</label>
                                                  <input type="time" class="form-control" placeholder="Bairro" required name="horario">
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
                              <input type="submit" class="btn btn-primary" value="Agendar">
                          </div>
                      </div>
                  </div>
              </div>
          
            </form>
      


       

@endsection

    @section('scripts')
    
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/medicoAgenda.js') }}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

   




    @endsection



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
   
    text-align: center;
 

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

.contentBusca{
    margin-top: 1rem;
}


.modal-content{width: 800px !important; margin-left: -30%;}
    .modal-body {  width:100%; } 
 

</style>
@endsection

@section('telaListarPaciente')
    <hr>
        <div class = 'container-fluid col-lg-12 corpo-paciente'>
           <h4 class="center textocenter">Agenda</h4>
           <a class="btn btn-outline-secondary ladoDireito"  href="{{route('dashboard')}}" data-toggle="tooltip" title="Voltar"><i class="fas fa-share"></i></a>
            <a class="btn btn-outline-success ladoDireito" data-toggle="modal" data-target=".bd-example-modal-x" title="Agendar"> <i class="fas fa-plus-circle"></i></a>
            <div class = 'row contentBusca'>
            
                        <div class="col-4 center">
                            
                                <label for="">Medicos</label>
                                <select name="medico" id="medico" class="form-control">
                                    @if (isset($med) && !empty($med))
                                    <option value="{{ $med->funcionario->matricula }}" selected>{{ $med->funcionario->nome }}</option>  
                                    @else
                                        @if (!isset($med))
                                        
                                        <option value="">Selecione</option>

                                        
                                        @endif

                                    @endif
                                    @if (!empty($medicos))
                                        @foreach ($medicos as $meds)
                                            <option value="{{ $meds->funcionario->matricula }}">{{ $meds->funcionario->nome }}</option>     
                                        @endforeach
                                    @endif
                                </select>
                        </div>
                        
                        <div class="col-4 center">                                                
                                <label for="">especialidades</label>
                                <select name="especialidade" id="especialidade" class="form-control">
                                    @if(!empty($esp))
                                        <option value="{{ $esp->id }}" selected>{{ $esp->nome }}</option>  
                                    @endif

                              {{--      @if (!empty($esp))
                                            @foreach($esp->Medico as $medico)
                                                @if ($med->funcionario->matricula === $medico->funcionario->matricula)
                                                    @continue
                                                @else

                                                    <option value={{$medico->funcionario->matricula}}>{{$medico->funcionario->nome}}</option>
                                                @endif
                                            @endforeach
                                    @else
                                      
                                    @endif
                                --}} 
                                 </select>                 
                        </div>
                                  
                        <div class="col-3 center">
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
                            <th scope="col">idade     </th>     
                            <th scope="col">Ult.Consulta     </th>     
                            <th scope="col">primeiraVez     </th>   

                            <th scope="col">compareceu     </th>  
                            <th scope="col">pago     </th>     
                                        
                        

                            <th scope="col">opções       </th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (isset($agendamentos))
                            @php $count=0; @endphp
                              @foreach ($agendamentos as $h)
                                  <tr class = "id{{$h->id}}">
                                      <td>{{ $h->hora }}</td>
                                      <td>{{ $h->paciente }}</td>
                                      <td>{{ $h->cpf }}</td>
                                      <td>{{ $h->telefone }}</td>
                                      <td>{{ $h->celular }}</td>
                                      <td>{{ $h->dataDeNascimento}}</td>
                                      <td>{{ $h->ultimaConsulta }}</td>
                                      <td>{{ $h->primeiraVez }}</td>
                                      <td>{{ $h->compareceu }}</td>
                                      <td>{{ $h->pago }}</td>
                                      <td style="display:none">{{ $h->obs }}</td>
                                      
                                  

                                 <td>  
                                               
                                                  <button type="button" class="btn btn-outline-danger" data-catid = {{ $h->id }} data-toggle="modal" data-target='#delete' title="desmarcar"><i class="fas fa-times"></i></button>
                                    
                                    
                                             <!--<a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Remarcar"><i class="fas fa-redo"></i></a> -->
                                               @if ($h->primeiraVez != 'N' )
                                               <a  class="btn btn-outline-primary"  href="{{ route('agenda.editarPaciente',['id' => $h->paciente_id  ]) }}" data-toggle="tooltip" data-placement="top" title="completar cadastro"><i class="fas fa-clipboard-list"></i></a>
                                               @endif

                                               
                                               @if ($h->obs != null)
                                               @php $count++ @endphp
                                               <a  class="btn btn-outline-primary" data-toggle="modal"  data-catid ="{{ $h->obs }}" data-target="#obs" title="observações"><i class="fas fa-align-left"></i></a>
                                                <!-- Button trigger modal -->
                                               @endif


                                               <button class="btn btn-outline-primary btn-edit" value = "{{$h->id}}" data-target="#update" title="editar"><i class="fas fa-edit"></i></button>

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


                                  <!-- Modal -->
                                  <div class="modal fade" id="obs" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <h5 class="modal-title">Observação da Reserva</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                            <div class="modal-body">
                
                                                <div class="container-fluid" id="obss">
                                                
                                                        <p id="p" value></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                               <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="modelTitleId2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <h5 class="modal-title">Editar Agendamento </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                            <div class="modal-body">
                                                {!! Form::open(['route' => 'agenda.update','method ' => 'post',]) !!} 
                                                   @csrf
                                                {{ method_field('PUT') }}

                                                <div class="container-fluid" id="obss">
                                                <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="horario">horario</label>
                                                  <input type="time" class="form-control" placeholder="hora" required id="hora" name="hora">
                                              </div>
                                          </div>
                                                
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="tipo">primeiraVez</label>
                                                                <select class="form-control" name="primeiraVez" id="primeiraVez" required>
                                                              
                                                                    <option>S</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </div>
                                                      </div>
                                                       <div class="col">
                                                            <div class="form-group">
                                                                <label for="tipo">compareceu</label>
                                                                <select class="form-control" name="compareceu" id="" required>
                                                                    <option>S</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </div>
                                                      </div>
                                                       <div class="col">
                                                            <div class="form-group">
                                                                <label for="tipo">pago</label>
                                                                <select class="form-control" name="pago" id="" required>
                                                                    <option>S</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </div>
                                                      </div>
                                                       <div class="form-group ">
                                                        <label for="inputPassword4">Obs</label>
                                                        <textarea  type="text" class="form-control" rows="5" name="obs" placeholder="obs"></textarea>
                                                      </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button id="excluir"name = "Salvar" class="btn btn-primary" type="submit"   data-toggle="tooltip" data-placement="top" title="excluir">Salvar</button>
                                               
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

       <form action="{{ route('agenda.agendar') }}" method="POST">
             @method('POST')
              @csrf
              {{-- input atendente --}}
              <input type="hidden"value="{{ Auth::User()->funcionario->nome }}" name="atendente">
              <input type="hidden"  value="{{ $date }}" name="data">

              {{-- input medico --}}
              @if (!empty($med))
              <input type="hidden" value="{{$med->funcionario->matricula}}" name="idMedico">
              <input type="hidden" value="{{$med->funcionario->nome}}" name="medico">

              @endif

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
                                        <input type="checkbox" value = 'S' name="primeiraVez" id="pv">
                                    </div>
                                  </div>
                            </div>
                              <div class="row"> 
                                  <div class="col-md-12">

                                <div class="form-group ">
                                    <label for="nome">Nome Paciente</label>
                                    <input type="text" class="form-control" placeholder="" name="paciente" id ="paciente" required>
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
                                                <input type="text" class="form-control" id="celular" placeholder="" name="celular" >
                                            </div>
                                        </div>
                                   </div>
                                    <div class="row">
                                            <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="telefone">plano</label>
                                                        <select class="form-control" name="plano" id="plano">
                                                        @if (isset($medPlanos) && !empty($medPlanos))
                                                        <option value="" selected>Selecione</option>
                                                        @foreach ($medPlanos as $p)
                                                               {{-- <optgroup label="{{  $p->convenio->nome}}"> --}}
                                                                   
                                                                    <option value="{{ $p->id }}">{{ $p->nome }}</option>
                                                               
                                                             <!--   <optgroup> -->
                                                            @endforeach

                                                        @endif
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                           

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="tipo">procedimento</label>
                                                <select class="form-control" name="procedimento_id" id="procedimentoMed" required>
                                                   <option value=""></option>
                                             
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
                                                  <label for="horario">horario</label>
                                                  <input type="time" class="form-control"  required name="hora">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="data">Valor</label>
                                                <input type="text" class="form-control"  name="valor" id="valor">
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
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>



    @endsection



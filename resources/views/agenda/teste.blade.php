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


 
.modal-content {width: 700px !important; margin-left:-20%;}
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
                                 @if(isset($userMedico))
                                    @include('components.VisaoDoMedicoNaAgenda')
                                    
                                @else
                                     
                                    @include('components.VisaoDaAtendenteNaAgenda')
                                @endif
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
                            <th scope="col" style="display:none" >Ult.Consulta     </th>     
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
                                    @if( $h->compareceu  == 'N') 
                                         <tr class = "id{{$h->id}} alert alert-danger">
                                    @elseif($h->atendido == 'S')
                                        <tr class = "id{{$h->id}} alert alert-success">
                                    @else
                                        <tr class = "id{{$h->id}}">
                                    @endif
                                    <td>{{ $h->hora }}</td>
                                    <td>{{ $h->paciente }}</td>
                                    <td>{{ $h->cpf }}</td>
                                    <td>{{ $h->telefone }}</td>
                                    <td>{{ $h->celular }}</td>
                                    <td>{{ $h->age($h->dataDeNascimento)}}</td>
                                    <td style="display:none">{{ $h->ultimaConsulta }}</td>
                                    <td>{{ $h->primeiraVez }}</td>
                                    <td>{{ $h->compareceu }}</td>
                                    <td>{{ $h->pago }}</td>
                                    <td style="display:none">{{ $h->obs }}</td>
                                    
                                
                                    <td>
    
                                               
                                                <button type="button" class="btn btn-outline-danger" data-catid = "{{ $h->id }}" data-toggle="modal" data-target='#delete' title="excluir"><i class="fas fa-trash"></i></button>
                                             @if( $h->compareceu  == 'S')
                                                <button type="button" id = "des" class="btn btn-outline-danger" value = "{{ $h->id }}" data-catid = "{{ $h->id }}" data-toggle="modal" data-target="#exampleModalCenter" title="desmarcar"><i class="fas fa-times"></i></button>
                                            @endif 
                                    
                                            @if ($h->primeiraVez != 'N' )
                                                <a  class="btn btn-outline-primary"  href="{{ route('agenda.editarPaciente',['id' => $h->paciente_id  ]) }}" data-toggle="tooltip" data-placement="top" title="completar cadastro"><i class="fas fa-clipboard-list"></i></a>
                                            @endif

                                            
                                            {{--   @if ($h->obs != null)
                                            @php $count++ @endphp
                                                <a  class="btn btn-outline-primary" data-toggle="modal"  data-catid ="{{ $h->obs }}" data-target="#obs" title="observações"><i class="fas fa-align-left"></i></a>
                                                <!-- Button trigger modal -->
                                            @endif
                                                --}}

                                            <button class="btn btn-outline-primary btn-edit " value = "{{$h->id}}" data-target="#update" title="editar"><i class="fas fa-edit"></i></button>

                                            <button class="btn btn-outline-primary" id =  "historico" value = "{{$h->paciente_id}}" data-target = ""  title="historico"><i class="fas fa-align-left"></i></button>
                                             @if((isset($userMedico) && $h->atendido == 'N') && $h->compareceu  != 'N'  )
                                                 <a class="btn btn-outline-success" href="{{ route('medico.atendimento', ['id' => $h->id]) }}"  title="atender"><i class="fab fa-adn"></i></a>
                                            @endif 

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
                                                        Você deseja excluir o agendamento ?
                                                        Não é possivel desfazer a operação. 
                                                             
                                                               {!! Form::open(['route' => 'agenda.destroy','method ' => 'post',]) !!} 
                                                            <input type = "hidden" id = "id" name = "id" value = "" >
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                              
                                                             
                                                            <button id="excluir"name = "excluir" class="btn btn-outline-danger" type="submit"   data-toggle="tooltip" data-placement="top" title="excluir">Excluir</button>
                                                                  {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>  

                                               <div class="modal fade" id="desmarcar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenter1">Desmarcar</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        Você deseja desmarcar o agendamento ?
                                                        
                                                             
                                                               {!! Form::open(['route' => 'agenda.desmarcar','method ' => 'post',]) !!} 
                                                            <input type = "hidden" id = "id" name = "id" value = "" >
                                                              <div class="form-group ">
                                                                <label for="inputPassword4">Obs</label>
                                                                <textarea  type="text" class="form-control" rows="5" name="obs" placeholder="obs"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                              
                                                             
                                                            <button id="excluir"name = "excluir" class="btn btn-outline-danger" type="submit"   data-toggle="tooltip" data-placement="top" title="Desmarcar">Desmarcar</button>
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
                             
                               <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="update" aria-hidden="true">
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
                                                <input type="hidden" name="paciente_id" id="paciente_id">
                                                <div class="container-fluid" id="obss">
                                                    <div class="row">
                                                        <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="telefone">plano</label>
                                                                    <select class="form-control" name="plano" id="planoModalEditar">
                                                                        <option id='optjs' selected  value=""></option>
                                                                    @if (isset($medPlanos) && !empty($medPlanos))
                                                                    @foreach ($convenios as $c)
                                                                            <optgroup label="{{  $c->nome}}">
                                                                                @foreach ($medPlanos as $value)
                                                                                    @if ($c->id == $value->convenio_id)
                                                                                        <option value="{{ $value->id }}">{{ $value->nome }}</option>
                                                                                        @continue

                                                                                    @endif
                                                                                @endforeach 
                                                                           <optgroup> 
                                                                    @endforeach
            
                                                                    @endif
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                <div class="col-md-4">
                                              <div class="form-group">
                                                  <label for="horario">horario</label>
                                                  <input type="time" class="form-control" placeholder="hora" required id="hora" name="hora">
                                              </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                                
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="tipo">primeiraVez</label>
                                                                <select class="form-control" name="primeiraVez" id="primeiraVez" required>
                                                              
                                                                    <option>S</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </div>
                                                      </div>
                                                       <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="tipo">compareceu</label>
                                                                <select class="form-control" name="compareceu" id="" required>
                                                                    <option>S</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </div>
                                                      </div>
                                                       <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="tipo">pago</label>
                                                                <select class="form-control" name="pago" id="" required>
                                                                    <option>S</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </div>
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
                                                  <button id="excluir"name = "Salvar" class="btn btn-primary" type="submit"   data-toggle="tooltip" data-placement="top" title="Salvar">Salvar</button>
                                               
                                                 {!! Form::close() !!}
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                              <div class="modal fade" id="historicoPaciente" tabindex="-1" role="dialog" aria-labelledby="historicoPaciente" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style = 'width: 300% !important; margin-left:-25rem;'>
                                                <div class="modal-header">
                                                        <h5 class="modal-title NomeDoPacienteParaOHistorico" >Histórico</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                </div>
                                            <div class="modal-body" style = ' height:100% !important; ' >
                
                                                <div class="table-responsive  fixed_header" style="overflow-x:auto, overflow-y:auto;">  
                                              
                                                 <table class="table  table-hover">
                                                                              
                                                                             <thead>
                                                                                 <tr>
                                                                               
                                                                                 <th>    Data     </th>
                                                                                 <th>Hora</th>
                                                                                 <th>Medico</th>
                                                            
                                                                                 <th>compareceu </th>
                                                                                 <th>pago </th>
                                                                                  <th>status </th>
                                                                                 <th>Observação </th>
                                                    
                                                                                </tr>
                                                                             </thead>
                                                                             <tbody class = 'js-historico'>
                                                                                <tr  >
                                                                                    
                                                                                </tr>
                                                                             </tbody>
                                                                         </table>
                                                       
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
                                            </div>
                                        </div>
                                    </div>
                                
                                 </div>

                                @if (session('metodos'))


                        <div class="modal fade" id="modal-mail" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger ">
                                    {{ session('metodos') }}
                                </div>

                            </div>
                            <div class="modal-footer">

                            </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                        </div>
                    @endif
                                        
                        
                 
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
                                          <input type="text" class="form-control name" placeholder="" name="cpf" id ='cpf' required autofocus>

                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="dataNascimento">Data de Nascimento</label>
                                          <input type="date" class="form-control name" id="data" placeholder="" name="dataDeNascimento" >
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="pv">Primeira Vez ?</label>
                                        <input type="checkbox" value = 'S' name="primeiraVez" id="pv" class="name">
                                    </div>
                                  </div>
                            </div>
                              <div class="row"> 
                                  <div class="col-md-12">

                                <div class="form-group ">
                                    <label for="nome">Nome Paciente</label>
                                    <input type="text" class="form-control name" placeholder="" maxlength="50" name="paciente" id ="paciente" required>
                                </div>
                                </div>
                              </div>
                                   <div class="row">
                                     

                                      
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="telefone">telefone</label>
                                            <input type="text" class="form-control name" id="telefone" placeholder="" name="telefone" >

                                        </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="telefone">celular</label>
                                                <input type="text" class="form-control name" id="celular" placeholder="" name="celular" >
                                            </div>
                                        </div>
                                   </div>
                                    <div class="row">
                                            <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="telefone">plano</label>
                                                        <select class="form-control" name="plano" id="plano">
                                                        
                                                        @if (isset($medPlanos) && !empty($medPlanos))
                                                        <option value=""></option>
                                                        @foreach ($convenios as $c)
                                                                <optgroup label="{{  $c->nome}}">
                                                                    @foreach ($medPlanos as $value)
                                                                        @if ($c->id == $value->convenio_id)
                                                                            <option value="{{ $value->id }}">{{ $value->nome }}</option> 
                                                                            @endif
                                                                    @endforeach 
                                                               <optgroup> 
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
                                                <input type="text" class="form-control" maxlength="8" name="valor" id="valor">
                                            </div>
                                        </div>

                        
          
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
    @if(isset($userMedico))
        <script type="text/javascript" src="{{ asset('js/RotasMedico.js') }}"></script>
    @else
        <script type="text/javascript" src="{{ asset('js/RotasAtendente.js') }}"></script>
    @endif
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    @endsection



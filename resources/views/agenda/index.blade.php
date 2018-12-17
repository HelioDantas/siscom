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


.modal-content{width: 800px !important; margin-left: -30%;}
    .modal-body {  width:100%; } 
 

</style>
@endsection

@section('tela')
    <hr>
        <div class = 'container-fluid col-lg-12 corpo-paciente'>
           <h4 class="center textocenter">Agenda</h4>

            <div class = '  '>
          
                        <div class="col-md-4 mb-3 center">
                            <div class="">

                                <label for="selectbasic">Medicos </label>

                                <select id="medico" class = "form-control">  {{old('nome')}}
                                 <option value="">selecione</option>  

                                 <option value={{old('medico->funcionario->matricula')}}>{{old('medico->funcionario->nome')}}</option>
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
                            <label for="data">Data</label>
                            <input type="date" name="data" id="data"  v value = {{old('data')}} maxlength="20" class="form-control {{$errors->has('data') ? 'is-invalid': '' }}" placeholder="data">

                        </div>
                    

                    </div>
                    <a class="btn btn-outline-success ladoDireito" data-toggle="modal" data-target=".bd-example-modal-x" title="cadastrar">
                                            <i class="fas fa-plus-circle"></i></a>
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
                            @if (isset($agendamentos))
                        
                              @foreach ($agendamentos as $h)
                                  <tr>
                                      <td>{{ $h->paciente }}</td>
                                      <td>{{ $h->cpf }}</td>
                                      <td>{{ $h->data }}</td>
                                      <td id="btnCad">  </td>
                                  
                                   
                                 
                                    </tr>
                              @endforeach
                        
                              
                          @endif
                        </tbody>
                        </table>
                        
                       <!--  <div class="modal fade bd-example-modal-x" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-x">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                               @component('components.formAgenda')
                                                   
                                               @endcomponent
                                            </div>
                                            </div>
                                          </div>


        </div> -->

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

<script>

 

</script>
    @endsection



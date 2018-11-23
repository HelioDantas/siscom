@extends('layout.app')

@section('estilos')
<style>
   .btn{
        
    }
    .pesquisar{
        margin-top:1.7rem;
    }
    .seletorSexo{
        margin-top: 2rem;
        padding-right: 1.5rem;
        margin-top:1.7rem; 
    }
    .endCentralizado > label{
        color:blue;
        text-aling:center;
        
    }
    .form-control{
        border-radius:10px 10px; 
    }
    .titulocadastro{
        margin:0 auto;
        margin-top:2rem;
        width:80rem;
    }
    .naveg{
        float: left;
    }
    .navegacao{
        text-align:right ;
        float: right;
       
    }
    a{
        color: white;
    }
    .titulocadastro{
        text-align: center;
        margin-top: 1.5rem;
        width: 80%;
    }
    .dadosForm{
        margin-top: 1rem;
    }

    legend{
        margin-top: 1rem;
    }

</style>
@endsection




@section('tela')
 <hr>
<div class="container-fluid col-lg-10 corpo-paciente">
    <h3 class="titulocadastro">Cadastro <strong>| Funcionario  </strong></h3>
    {!! Form::open(['route' => 'funcionario.create','method ' => 'post',]) !!} @csrf

  <div class="form-group navegacao">
                <div class="col">
                   <button id="Salvar"  class="btn btn-outline-primary" type="Submit"  data-toggle="tooltip" data-placement="top" title="Salvar"><i class="far fa-save"></i></button> 
                  <a  class="btn btn-outline-secondary"   href="{{route('funcionario.listar')}}"   data-toggle="tooltip" data-placement="top" title="pesquisar"><i class="fas fa-search"></i></a>
                 <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>

                  <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
                </div>
            </div>

            <fieldset class="form-group">
                    <legend aling="center">Dados Pessoais</legend>
    <div class="row">

    <div class="col-5">
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="" class="form-control" placeholder="nome"   maxlength="40">

    </div>
    </div><!--col nome -->

    <div class="col-2">
    <div class="form-group">
      <label for="cpf">CPF</label>
      <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Cpf" aria-describedby="helpId" maxlength="14">

    </div>
    </div><!--col cpf -->

    <div class="col-2">
            <div class="form-group">
              <label for="cpf">RG</label>
              <input type="text" name="identidade" id="RG" class="form-control" placeholder="identidade" aria-describedby="identidade" maxlength="13">
 
            </div>
            </div><!--col cpf -->

    <div class="col-2">
    <div class="form-group">
      <label for="data">Data Nascimento</label>
      <input type="date" name="dataDeNascimento" id="dtNascimento" class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">
    </div>
    </div><!--col dt Nascimento-->

    <div class="col-2">
            <div class="form-group">

                <label for="selectbasic">Sexo </label>
                  <select required id="sexo" name="sexo" class="form-control">
                  <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="N">Não declarado</option>
                    <option value="I">Indefinido</option>
                  </select>

            </div>
    </div><!--col genero-->

    <div class="col-2">
            <div class="form-group">

                <label for="selectbasic">Etnia</label>
                  <select required id="etnia" name="etnia" class="form-control">
                  <option value="B">Branco</option>
                    <option value="P">Pardo</option>
                    <option value="N">Negro</option>
                    <option value="I">Indigenas</option>
                  </select>

            </div>
        </div><!--  etinia-->

        <div class="col-2">
                <div class="form-group">

                    <label for="selectbasic">Escolaridade </label>


                      <select required id="escolaridade" name="escolaridade" class="form-control">
                     
                        <option value="Superior Completo">Superior Completo</option>
                    <option value="Superior Incompleto">Superior Incompleto</option>
                    <option value="Médio Incompleto">Médio Incompleto</option>
                    <option value="Médio Completo">Médio Completo</option>
                    <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                    <option value="Fundamental Completo">Fundamental Completo</option>
                      </select>

                </div>
            </div>

            <div class="col-2">
                    <div class="form-group">
                      <label for="">Nacionalidade</label>
                      <input type="text" name="nacionalidade" id="" class="form-control" placeholder="nacionalidade" value="Brasileiro"   maxlength="50">
                
                    </div>
            </div><!--col nacionalidade -->

            <div class="col-2">
                    <div class="form-group">
                      <label for="">Naturalidade</label>
                      <input type="text" name="naturalidade" id="" class="form-control" placeholder="naturalidade" value=""   maxlength="50">
                    </div>
            </div><!--col naturalidade -->

            <div class="col-2">
                    <div class="form-group">
                      <label for="profissao">Profissão</label>
                      <select required id="prof" name="profissao"  class="form-control">
                      <option value="M">Medico</option>
                      <option selected value="A">Atendente</option>
                     
                      </select>
                    </div>
            </div><!--col nacionalidade -->

            <div class="col-2">
                    <div class="form-group">

                        <label for="selectbasic">Status </label>
                          <select required id="status_2" name="status" class="form-control">
                          <option value="A">Ativo</option>
                            <option value="I">Inativo</option>
                          </select>

                    </div>
                </div><!--  etinia-->


                   <div class="col-3">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                        <input id="telefone" name="telefone" class="form-control" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                       >
                </div>
            </div>  <!-- col Telefone-->

            <div class="col-3">
                    <div class="form-group">
                        <label for="celular">Celular</label>
                            <input id="celular" name="celular" class="form-control"  required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                                >
                    </div>
                </div>  <!-- col Telefone-->


            <div class="col-3">
                <div class="form-group">
                       <label for="email">Email address</label>
                       <input type="email" class="form-control" id="email"name = "email" placeholder="name@example.com">
                </div>


                </div> <!-- col Email -->
                <div class="col-3 Fill invisivel">
                <div class="form-group">
                <label for="crm">CRM</label>
                <input type="text" name="crm" id="" class="form-control " placeholder="crm"  maxlength="15">
                <small id="crm" class="text-muted">CRM</small>
                </div>
                </div><!--col nome -->


                <div class="col-3 Fill invisivel">
                    <div class="form-group">
                      <label for="especialidade" >Especialidade 1</label>
                      <select  id="especialidade" name="especialidade1" id="" class="form-control" >
                          <option value=""></option>
                          @foreach($especi as $e)
                                <option value="{{$e->id}}">{{$e->nome}}</option>
                         @endforeach
                      </select>
                    </div>
             </div>


                   <div class="col-3 Fill invisivel">
                    <div class="form-group teste">
                      <label for="especialidade2">Especialidade 2</label>
                      <select  id="especialidade2" name="especialidade2" id="" class="form-control" >
                          <option value=""></option>
                          @foreach($especi as $e)
                                <option value="{{$e->id}}">{{$e->nome}}</option>
                         @endforeach
                      </select>
                    </div>
            </div>
    </div><!-- row -->
    </fieldset><!--Dados pessoas-->
    <hr>


             <fieldset class="form-group">
        <legend aling="center">Endereço</legend>
         
   
      
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                               <label for="cep">Cep</label>
                               <input type="text" class="form-control input-md" name="cep" id="cep" placeholder="Apenas numeros" maxlength="15"  > 
                            </div>
                        </div><!-- col cep -->

                          <div class="col-2">
                               <button type="button" class="btn btn-outline-success pesquisar"  onclick="pesquisacep(cep.value)">
                                <strong>pesquisar</strong></button>
                          </div><!-- col CEP -->


                     <div class="col-3">
                      <span>Rua</span>
                          <div class="input-group">
                              <input type="text" name="rua" class="form-control" id="rua" maxlength="50">
                      </div>
                  </div><!-- col rua-->

                   <div class="col-2">
                    <span >Nº</span>
                    <div class="input-group">
                      <input id="numero" name="numero" class="form-control"placeholder="" required=""  type="text" maxlength="10">
                    </div>

                  </div> <!-- col bumero-->


                  <div class="col-3">

                   <span>Bairro</span>
                    <div class="input-group">
                      <input id="bairro" name="bairro" placeholder="" required=""  class="form-control"type="text"maxlength="50">
                    </div>

                    </div><!-- col bairro-->

                <div class="col-4">
                   <span>Cidade</span>
                    <div class="input-group">

                      <input id="cidade" name="cidade"  placeholder="" required=""  class="form-control" type="text"maxlength="50">
                    </div>
                </div><!-- col cidade -->

                    <div class="col-2">
                    <span>Estado</span>
                    <div class="input-group">
                        <input id="uf" name="estado"  required maxlength="2" placeholder=""  class="form-control" type="text">

                    </div>
                    </div>


        </div><!-- row endereco -->
  
    </fieldset><!--endereço-->
  
    <hr>

    
  
      {!! Form::close() !!}
    </div><!-- container -->

    @endsection
    @section('scripts')
<script type="text/javascript" src="{{ asset('js/validaEmail.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cep.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/medi.js') }}"></script>
    @endsection
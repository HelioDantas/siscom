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
    
        {!! Form::open(['route' => 'paciente.create','method ' => 'post',]) !!}
        @csrf
        <div class="form-group navegacao">
                <div class="col">
                  <button id="Cadastrar"  class="btn btn-outline-success" type="Submit"  data-toggle="tooltip" data-placement="top" title="cadastrar"><i class="fas fa-plus-circle"></i></button>
                  <a  class="btn btn-outline-secondary"   href="{{route('paciente.listar')}}"   data-toggle="tooltip" data-placement="top" title="pesquisar"><i class="fas fa-search"></i></a>
                  <a  class="btn btn-outline-danger"  href="{{route('paciente.novo')}}"   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>

                  <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
                </div>
            </div>

           
            <h3 class="titulocadastro">Cadastro <strong>| Paciente  </strong></h3>
      
      
<fieldset class="form-group dadosForm">
    <legend aling="center">Dados Pessoais</legend>
        
<div class="row"><!-- dados pessoas -->  



<div class="col-4">
<div class="form-group">
  <label for="nome">Nome*</label>
  <input type="text" name="nome" id="nome"  maxlength="45" class="form-control" placeholder="nome" required>
</div>
</div><!--col nome -->

<div class="col-2">
<div class="form-group">
  <label for="cpf">Cpf*<label>
  <input type="text" name="cpf" id="cpf"   class="form-control" placeholder="Cpf" aria-describedby=""   maxlength="12" required>
  <!--<input type="text" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite um CPF no formato: xxx.xxx.xxx-xx">   pattern="/d{11}"  -->
</div>
</div><!--col cpf -->

<div class="col-2">
        <div class="form-group">
          <label for="cpf">RG</label>
          <input type="text" name="identidade" id="RG"  maxlength="12" required class="form-control" placeholder="identidade" aria-describedby="identidade">
        </div>
        </div><!--col cpf -->
        <div class="col">
            <div class="form-group">
              <label for="cpf">Orgão Emissor</label>
              <input type="text" name="orgEmissor" id="org Emissor" maxlength="15"  required class="form-control" placeholder="ex:Detran" aria-describedby="identidade">
            </div>
            </div><!--col cpf -->
    
<div class="col-2">
<div class="form-group">
  <label for="data">Data Nascimento</label>
  <input type="date" name="dataDeNascimento"  required  id="dtNascimento" class="form-control" placeholder="" >
</div>
</div><!--col dt Nascimento-->

</div><!-- row dados pessoas 1-->



<div class="row">

    <div class="col-2">
        <div class="form-group">
          <label for="">Nacionalidade</label>
          <input type="text" name="nacionalidade" maxlength="15" required id="nacionalidade" class="form-control" placeholder="nacionalidade" value="Brasileiro">
        </div>
</div><!--col nacionalidade -->

<div class="col-2">
        <div class="form-group">
          <label for="">Naturalidade</label>
          <input type="text" name="naturalidade" maxlength="15" required id="naturalidade" class="form-control" placeholder="naturalidade" value="">
        </div>
</div><!--col naturalidade -->

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
          <label for="">Profissão</label>
          <input type="text" name="profissao" id="" class="form-control" placeholder="prof" value="">
       
        </div>
</div><!--col nacionalidade -->

<div class="col">
        <div class="form-group">
        
            <label for="selectbasic">Sexo <h11>*</h11></label>
              <select required id="genero" name="sexo" class="form-control">
              <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="N">Não declarado</option>
                <option value="I">Indefinido</option>
              </select>
           
        </div>
</div><!--col genero-->

<div class="col">
        <div class="form-group">
        
            <label for="selectbasic">Etnia </label>
              <select required id="etnia" name="etnia" class="form-control">
              <option value="B">Branco</option>
                <option value="P">Pardo</option>
                <option value="N">Negro</option>
                <option value="I">Indigenas</option>
              </select>
           
        </div>
    </div><!--  etinia-->

    

        <div class="col">
                <div class="form-group">
                
                    <label for="selectbasic">Status </label>
                      <select required id="status" name="status" class="form-control">
                      <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                      </select>
                   
                </div>
            </div><!--  etinia-->

                
</div><!-- row -->

<div class="row"><!-- contatoi-->
    <div class="col-2">
            <div class="form-group">
                <label for="telefone">Telefone </label>
                    <input id="telefone" name="telefone" class="form-control" required="" type="text" maxlength="13" 
                    >
            </div>
        </div>  <!-- col Telefone-->

        <div class="col-2">
                <div class="form-group">
                    <label for="celular">Celular </label>
                        <input id="celular" name="celular" class="form-control" required="" type="text" maxlength="13" 
                       >
                </div>
            </div>  <!-- col Telefone-->
            
        
        <div class="col-3">
            <div class="form-group">
                   <label for="exampleFormControlInput2">Email address</label>
                   <input type="email"  name="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com">
            </div>
            
            
            </div> <!-- col Email -->

</div>
</fieldset><!--Dados pessoas-->
<hr>


         <fieldset class="form-group">
                    <legend aling="center">Endereço</legend>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                               <label for="cep">Cep</label>
                               <input type="text"  required class="form-control input-md" name="cep" id="cep"
                                placeholder="Apenas numeros" maxlength="15" > 
                            </div>
                        </div><!-- col cep -->

                          <div class="col">
                               <button type="button" class="btn btn-outline-success pesquisar"  onclick="cep.value"> <!--  pesquisacep(cep.value)-->
                                <strong>pesquisar</strong></button>
                          </div><!-- col CEP -->


                     <div class="col-3">
                      <span>Rua</span>
                          <div class="input-group">
                              <input type="text" name="rua" maxlength="40" required class="form-control" id="rua" >
                      </div>
                  </div><!-- col rua-->

                   <div class="col-1">
                    <span >Nº <h11>*</h11></span>
                    <div class="input-group">
                      <input id="numero" name="numero" class="form-control"placeholder="" required=""  type="text">
                    </div>

                  </div> <!-- col bumero-->


                  <div class="col-2">

                   <span>Bairro</span>
                    <div class="input-group">
                      <input id="bairro" name="bairro"  required maxlength="15" placeholder="" required=""  class="form-control"type="text">
                    </div>

                    </div><!-- col bairro-->

                <div class="col-2">
                   <span>Cidade</span>
                    <div class="input-group">

                      <input id="cidade" name="cidade"  required maxlength="30" placeholder="" required=""  class="form-control" type="text">
                    </div>
                </div><!-- col cidade -->

                    <div class="col">
                    <span>Estado</span>
                    <div class="input-group">

                        <input id="uf" name="estado"  required maxlength="2" placeholder=""  class="form-control" type="text">

                    </div>
                </div>


                
             
    </div><!-- row endereco -->
                
</fieldset><!--endereço-->
<hr>

            <fieldset class="form-group">
                <legend aling="center">Convenio</legend>
        <div class="row"><!-- convenio -->

                <div class="col">
                <div class="form-group">
                    <label for="convenio">Convenio</label>
                    <select  id="convenio" name="convenio" id="" class="form-control" >
                        <option value=""></option>
                        @foreach($convenio as $c)
                              <option value="{{$c->cnpj}}">{{$c->nome}}</option>
                              @php $c  @endphp
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="TipoConvenio">Tipo Convenio</label>
                    <select  id="TipoConvenio" name="TipoConvenio" id="" class="form-control" >
                        <option value=""></option>
                        @foreach($tipo as $tc)
                              <option value="{{$tc->convenio_id}}">{{$tc->nome}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-2">
                    <div class="form-group">
                        <label for="plano">Indicação</label>
                            <input id="indicacao" name="indicacao" class="form-control"  require type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                           >
                    </div>
                </div>  <!-- col Plano-->

                <div class="col-2">
                    <div class="form-group">
                        <label for="plano">Carteira<h11>*</h11></label>
                            <input id="carteira" name="carteira" class="form-control"  required type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                           >
                    </div>
                </div>  <!-- col Plano-->

                <div class="col">
                    <div class="form-group">
                    
                        <label for="selectbasic">Status <h11>*</h11></label>
                          <select required id="status" name="situacao" class="form-control">
                          <option value="A">Ativo</option>
                            <option value="I">Inativo</option>
                          </select>
                       
                    </div>
                </div><!--  etinia-->
    

                <!--<div class="col">
                    <div class="form-group">
                        <label for="plano">Validade<h11>*</h11></label>
                            <input id="telefone" name="telefone" class="form-control" required type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                            >
                    </div>
                </div>  col Plano-->

        </fieldset><!--endereço-->

{!! Form::close() !!}

</div><!-- container -->


@endsection

@section('scripts')
   

<script type="text/javascript" src="{{ asset('js/cep.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tolltips.js') }}"></script>

@endsection
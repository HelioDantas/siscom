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

        {!! Form::open(['route' => ['paciente.update', $p->id],'method ' => 'post',]) !!}
         @csrf
        {{ method_field('PUT') }}

        <input type="hidden" name="paciente_id" value="{{$p->id}}">

              <div class="form-group navegacao">
                    <div class="col">
                            <button id="Salvar"  class="btn btn-outline-primary" type="Submit"  data-toggle="tooltip" data-placement="top" title="Salvar"><i class="far fa-save"></i></button>
                             <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>
                            <a  class="btn btn-outline-secondary"   onClick="history.go(-1)"  data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>
                    </div>
                </div>
              
              <h4 class="titulocadastro">Atualizar Dados de <strong>{{$p->nome}}</strong></h4>   
        
        
                <fieldset class="form-group">
                        <legend aling="center">Dados Pessoais</legend>
        
<div class="row"><!-- dados pessoas -->  



<div class="col-4">
<div class="form-group">
  <label for="nome">Nome*</label>
  <input type="text" name="nome" id="nome" class="form-control" placeholder="nome"  @if(!empty($p)) value = "{{$p->nome}}" @else value = "" @endif>
  <small id="nome" >Nome Completo</small>
</div>
</div><!--col nome -->

<div class="col-2">
        <div class="form-group">
          <label for="cpf">Cpf*</label>
          <input type="text" name="cpf" id="" class="form-control" placeholder="Cpf" aria-describedby="helpId"  @if(!empty($p)) value = "{{$p->cpf}}" @else value = "" @endif>
          <small id="cpf" class="text-muted">cpf</small>
        </div>
        </div><!--col cpf -->

        <div class="col-2">
                <div class="form-group">
                  <label for="cpf">RG*</label>
                  <input type="text" name="identidade" id="identidade" class="form-control" placeholder="identidade" aria-describedby="identidade"
                    @if(!empty($p)) value = {{$p->identidade}} @else value = "" @endif>
                  <small id="identidade" class="text-muted">identidade</small>
                </div>
                </div><!--col cpf -->

        <div class="col">
            <div class="form-group">
              <label for="cpf">Orgão Emissor*</label>
              <input type="text" name="org_emissor" id="org Emissor"  required class="form-control" placeholder="ex:Detran" aria-describedby="identidade">
              <small id="orgEmissor" class="text-muted">Org.Emissor</small>
            </div>
            </div><!--col cpf -->
    
<div class="col-2">
<div class="form-group">
  <label for="data">Data Nascimento</label>
  <input type="date" name="dataNascimento" id="dtNascimento"  @if(!empty($p)) value = "{{$p->dataDeNascimento}}" @else value = "" @endif class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">
  <small id="dtNascimento" class="data">Data obrigatoria</small>
</div>
</div><!--col dt Nascimento-->

<div class="col-2">
        <div class="form-group">
        
            <label for="selectbasic">Sexo <h11>*</h11></label>
              <select required id="sexo" name="sexo" class="form-control" >
                 @if(!empty($p->sexo))

                    @switch($p->sexo)
                    @case('M')
                        @php $tipo = 'Masculino' ; @endphp
                        @break
    
                    @case( 'F')
                        @php $tipo = 'Feminino' ; @endphp
                        @break
                    @case( 'N')
                        @php $tipo = 'Não declarado' ; @endphp
                        @break
                    @case( 'I')
                        @php $tipo = 'Indefinido' ; @endphp
                        @break
    
                    @endswitch

                    <option value={{$p->sexo}}>{{$tipo}}</option>
                    @else
                    <option value=""></option>
                @endif  
              <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="N">Não declarado</option>
                <option value="I">Indefinido</option>
              </select>
           
        </div>
</div><!--col genero-->

<div class="col-2">
        <div class="form-group">
        
            <label for="selectbasic">Etnia <h11>*</h11></label>
              <select required id="etnia" name="etnia" class="form-control">
                @if(!empty($p->etnia))
                                        
                @switch($p->etnia)
                @case('B')
                    
                    @php $tipo = 'Branco' ; @endphp
                    @break

                @case( 'P')
                    
                    @php $tipo = 'Pardo' ; @endphp
                    @break
                @case( 'N')
                    
                    @php $tipo = 'Negro' ; @endphp
                    @break

                @case( 'I')
                   
                    @php $tipo = 'Indigenas' ; @endphp
                    @break

                @endswitch
                    <option value= {{$p->etnia}}>{{$tipo}}</option>
                @else
                    <option value=""></option>
                @endif

                <option value="B">Branco</option>
                <option value="P">Pardo</option>
                <option value="N">Negro</option>
                <option value="I">Indigenas</option>
              </select>
           
        </div>
    </div><!--  etinia-->

    <div class="col-3">
            <div class="form-group">
            
                <label for="selectbasic">Escolaridade <h11>*</h11></label>
        
                  <select required id="escolaridade" name="escolaridade" class="form-control">
                        @if(!empty($p->escolaridade))
                        <option value="{{$p->escolaridade}}">{{$p->escolaridade}}</option>
                         @endif
                  <option value=""></option>
                    <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                    <option value="Fundamental Completo">Fundamental Completo</option>
                    <option value="Medio Incompleto">Médio Incompleto</option>
                    <option value="Medio Completo">Médio Completo</option>
                    <option value="Superior Incompleto">Superior Incompleto</option>
                    <option value="Superior Completo">Superior Completo</option>
                  </select>
               
            </div>
        </div>

        <div class="col-2">
                <div class="form-group">
                  <label for="">Nacionalidade*</label>
                  <input type="text" name="nacionalidade" id=""  class="form-control" placeholder="nacionalidade" value="Brasileiro"  @if(!empty($p)) value = {{$p->nacionalidade}} @else value = "" @endif>
                  <small id="nacionalidade" class="text-muted">informe o seu pais de origem</small>
                </div>
        </div><!--col nacionalidade -->

        <div class="col-3">
                <div class="form-group">
                  <label for="">Naturalidade*</label>
                  <input type="text" name="nacionalidade" id=""  class="form-control" placeholder="naturalidade"  @if(!empty($p)) value = {{$p->naturalidade}} @else value = "" @endif>
                  <small id="nacionalidade" class="text-muted">cidade ou estado de nascimento</small>
                </div>
        </div><!--col naturalidade -->

        <div class="col-3">
                <div class="form-group">
                  <label for="">Profissão*</label>
                  <input type="text" name="prof" id="" class="form-control"  placeholder="prof" value="Brasileiro"  @if(!empty($p)) value = {{$p->profissao}} @else value = "" @endif>
                  <small id="prof" class="text-muted">informe o seu pais de origem</small>
                </div>
        </div><!--col nacionalidade -->

        <div class="col-2">
                <div class="form-group">
                
                    <label for="selectbasic">Status <h11>*</h11></label>
                      <select required id="status_2" name="status_id" class="form-control"  @if(!empty($p)) value = {{$p->Status_2}} @else value = "" @endif>
                      <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                      </select>
                   
                </div>
            </div><!--  etinia-->

                



    <div class="col-2">
            <div class="form-group">
                    <label for="telefone">Telefone <h11>*</h11></label>
                        <input id="telefone" name="telefone" class="form-control"  placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                        OnKeyPress="formatar('## #####-####', this)"  @if(!empty($p)) value = {{$p->telefone}} @else value = "" @endif>
                </div>
        </div>  <!-- col Telefone-->

        <div class="col-2">
                <div class="form-group">
                        <label for="celular">Celular <h11>*</h11></label>
                            <input id="celular" name="celular" class="form-control"  placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                            OnKeyPress="formatar('## #####-####', this)"   @if(!empty($p)) value = {{$p->celular}} @else value = "" @endif>
                    </div>
            </div>  <!-- col Telefone-->
            
        
        <div class="col-3">
                <div class="form-group">
                <label for="exampleFormControlInput2">Email address</label>
                <input type="email" class="form-control"  id="exampleFormControlInput2" placeholder="name@example.com"  @if(!empty($p)) value = {{$p->email}} @else value = "" @endif>
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
                                    <input type="search" class="form-control input-md" id="cep"  placeholder="Apenas numeros" maxlength="15"  pattern="\d{5}-\d{3}"  @if(!empty($p)) value = {{$p->cep}} @else value = "" @endif>
                                 </div>
                        </div><!-- col cep -->

                          <div class="col">
                               <button type="button" class="btn btn-outline-success pesquisar"  onclick="cep.value"> <!--  pesquisacep(cep.value)-->
                                <strong>pesquisar</strong></button>
                          </div><!-- col CEP -->


                     <div class="col-3">
                      <span>Rua</span>
                          <div class="input-group">
                                <input type="text" name="rua"  class="form-control" id="rua"  @if(!empty($p)) value = {{$p->rua}} @else value = "" @endif><!--  readonly="readonly" -->
                            </div>
                  </div><!-- col rua-->

                   <div class="col-1">
                    <span >Nº <h11>*</h11></span>
                    <div class="input-group">
                            <input id="numero" name="numero" class="form-control" placeholder="" required=""  type="text"  @if(!empty($p)) value = {{$p->numero}} @else value = "" @endif >
                        </div>

                  </div> <!-- col bumero-->


                  <div class="col-2">

                   <span>Bairro</span>
                    <div class="input-group">
                            <input id="bairro" name="bairro"  placeholder="bairro"  required="" class="form-control"type="text" @if(!empty($p)) value = {{$p->bairro}} @else value = "" @endif ><!--  readonly="readonly" -->
                        </div>

                    </div><!-- col bairro-->

                <div class="col-2">
                   <span>Cidade</span>
                    <div class="input-group">

                            <input id="cidade" name="cidade"  placeholder=""  required=""  class="form-control" type="text"  @if(!empty($p)) value = {{$p->cidade}} @else value = "" @endif><!--  readonly="readonly" -->
                        </div>
                </div><!-- col cidade -->

                    <div class="col">
                    <span>Estado</span>
                    <div class="input-group">

                      <select id="estado" name="estado"  placeholder="" required   class="form-control"type="text">
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="ES">Estrangeiro</option>
                        </select>
                      
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
            @if (! $convenio == null)

            <option value="{{$convenio->cnpj}}" selected >{{$convenio->nome}}</option>
            @endif
            @foreach($convenios as $c)
                  <option value="{{$c->cnpj}}">{{$c->nome}}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
            <div class="col">
                    <div class="form-group">
                     <label for="planos">Planos</label>
                     <select name="plano_id" id="plano_id" class="form-control">
                         @if (! $plano == null) 
                         <option value="{{$plano->id}}" selected > {{$plano->nome}}</option>
                          @endif
        
                     </select>
                    </div>
                  </div>
      </div>
    </div>

    <div class="col-2">
        <div class="form-group">
            <label for="plano">Indicação</label>
                <input id="indicacao" name="indicacao" class="form-control"  require type="text" maxlength="13" @if($phc != null) value = {{$phc->indicacao}} @else value = "" @endif >
        </div>
    </div>  <!-- col Plano-->

    <div class="col-2">
        <div class="form-group">
            <label for="plano">Carteira<h11>*</h11></label>
                <input id="carteira" name="carteira" class="form-control"  required type="text" maxlength="13" @if($phc != null)) value = {{$phc->carteira}} @else value = "" @endif >
        </div>
    </div>  <!-- col Plano-->



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
<script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>

@endsection
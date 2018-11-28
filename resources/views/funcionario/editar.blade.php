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

    .tamanho{

        width: 200%;

    }
    .modal-dialog{
  width: 500000px;
}

</style>
@endsection


@section('conteudo')


@endsection

@section('navegação')


@endsection

@section('tela')
<hr>
<div class="container-fluid col-lg-10 corpo-paciente">
{!! Form::open(['route' => ['funcionario.update', $p->matricula],'method ' => 'post',]) !!}

 @csrf
{{ method_field('PUT') }}

<div class="form-group navegacao">
                    <div class="col">
                            <button id="Salvar"  class="btn btn-outline-primary" type="Submit"  data-toggle="tooltip" data-placement="top" title="Salvar"><i class="far fa-save"></i></button>
                            <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>
                            <a  class="btn btn-outline-secondary"   onClick="history.go(-1)"  data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>
                    </div>
                </div>

      <h4 class="titulocadastro">Atualizar Dados do {{$p->nome}}</h4>


        <fieldset class="form-group">
                <legend aling="center">Dados Pessoais</legend>
<div class="row">



<div class="col-5">
<div class="form-group">
  <label for="nome">Nome</label>
  <input type="text" name="nome" id="nome" class="form-control" placeholder="nome" maxlength="70"  @if(!empty($p)) value = "{{$p->nome}}" @else value = "" @endif>

</div>
</div><!--col nome -->

<div class="col-2">
<div class="form-group">
  <label for="cpf">Cpf</label>
  <input type="text" name="cpf" id="" class="form-control" placeholder="Cpf" aria-describedby="helpId"  @if(!empty($p)) value = "{{$p->cpf}}" @else value = "" @endif>
  <small id="cpf" class="text-muted">cpf</small>
</div>
</div><!--col cpf -->

<div class="col-2">
        <div class="form-group">
          <label for="cpf">RG</label>
          <input type="text" name="identidade" id="identidade" class="form-control" placeholder="identidade" aria-describedby="identidade" maxlength="15"
            @if(!empty($p)) value = "{{$p->identidade}}" @else value = "" @endif>

        </div>
        </div><!--col cpf -->

<div class="col-2">
<div class="form-group">
  <label for="data">Data Nascimento</label>
  <input type="date" name="dataDeNascimento" id="dtNascimento" maxlength="13" @if(!empty($p)) value = "{{$p->dataDeNascimento}}" @else value = "" @endif class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">

</div>
</div><!--col dt Nascimento-->

<div class="col-2">
        <div class="form-group">

            <label for="selectbasic">Sexo </label>
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

            <label for="selectbasic">Etnia </label>
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
                    <option value= "{{$p->etnia}}">{{$tipo}}</option>
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

    <div class="col-2">
            <div class="form-group">

                <label for="selectbasic">Escolaridade</label>

                  <select required id="escolaridade" name="escolaridade" class="form-control">
                        @if(!empty($p->escolaridade))

                        @switch($p->escolaridade)
                        @case('Fundamental Incompleto')

                            @php $tipo = 'Fundamental Incompleto' ; @endphp
                            @break

                        @case( 'Fundamental Completo')

                            @php $tipo = 'Fundamental Completo' ; @endphp
                            @break
                        @case('Medio Incompleto')

                            @php $tipo = 'Medio Incompleto' ; @endphp
                            @break

                        @case('Medio Completo')

                            @php $tipo = 'Medio Completo' ; @endphp
                            @break
                        @case('Superior Incompleto')

                            @php $tipo = 'Superior Incompleto' ; @endphp
                            @break

                        @case('Superior Completo')

                            @php $tipo = 'Superior Completo' ; @endphp
                            @break



                        @endswitch
                        <option value="{{$p->escolaridade}}">{{$tipo}}</option>
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
                  <label for="">Nacionalidade</label>
                  <input type="text" name="nacionalidade" id=""  class="form-control" placeholder="nacionalidade" value="Brasileiro" maxlength="50"  @if(!empty($p)) value = "{{$p->nacionalidade}}" @else value = "" @endif>

                </div>
        </div><!--col nacionalidade -->

        <div class="col-2">
                <div class="form-group">
                  <label for="">Naturalidade</label>
                  <input type="text" name="naturalidade" id=""  class="form-control" placeholder="naturalidade"  maxlength="50"@if(!empty($p)) value = "{{$p->naturalidade}}" @else value = "" @endif>

                </div>
        </div><!--col naturalidade -->

            <div class="col-2">
                    <div class="form-group">
                      <label for="profissao">Profissão</label>
                      <select required id="prof" name="profissao"  class="form-control">

                  @if(!empty($p->profissao))

                        @switch($p->profissao)
                        @case('M')

                            @php $tipo = 'Medico' ; @endphp
                            @break

                        @case( 'A')

                            @php $tipo = 'Atendente' ; @endphp
                            @break


                            @endswitch

                            <option selected value= "{{$p->profissao}}">{{$tipo}}</option>
                              @else

                      @endif

                    </select>


                </div>
        </div><!--col nacionalidade -->

        <div class="col-2">
                <div class="form-group">

                    <label for="selectbasic">Status </label>
                      <select required id="status" name="status" class="form-control"  @if(!empty($p)) value = "{{$p->Status}}" @else value = "" @endif>
                      <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                      </select>

                </div>
            </div><!--  etinia-->

             <div class="col-3 Fill invisivel">
                <div class="form-group">
                <label for="crm">CRM</label>

                <small id="crm" class="text-muted">CRM</small>
                </div>
                </div><!--col nome -->




</div><!-- row -->
</fieldset><!--Dados pessoas-->
<hr>


        <fieldset class="form-group">
                <legend aling="center">Endereço</legend>

            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                           <label for="cep">Cep</label>
                           <input type="search" class="form-control input-md" id="cep"  placeholder="Apenas numeros" maxlength="15"  pattern="\d{5}-\d{3}"  @if(!empty($p)) value = "{{$p->cep}}" @else value = "" @endif>
                        </div>
                    </div><!-- col cep -->

                      <div class="col-2">
                           <button type="button" class="btn btn-outline-success pesquisar"  onclick="pesquisacep(cep.value)">
                            <strong>pesquisar</strong></button>
                      </div><!-- col CEP -->


                 <div class="col">
                  <span>Rua</span>
                      <div class="input-group">

                          <input type="text" name="rua"  class="form-control" id="rua" maxlength="30" @if(!empty($p)) value = "{{$p->rua}}" @else value = "" @endif><!--  readonly="readonly" -->

                  </div>
              </div><!-- col rua-->

               <div class="col-2">
                <span >Nº </span>
                <div class="input-group">

                  <input id="numero" name="numero" class="form-control" placeholder="" required="" maxlength="13" type="text"  @if(!empty($p)) value = "{{$p->numero}}" @else value = "" @endif >
                </div>

              </div> <!-- col bumero-->


              <div class="col-3">

               <span>Bairro</span>
                <div class="input-group">

                  <input id="bairro" name="bairro"  placeholder="bairro"  required="" class="form-control"type="text" maxlength="50" @if(!empty($p)) value = "{{$p->bairro}}" @else value = "" @endif > <!--  readonly="readonly" -->
                </div>

                </div><!-- col bairro-->

            <div class="col-4">
               <span>Cidade</span>
                <div class="input-group">

                  <input id="cidade" name="cidade"  placeholder=""  required=""  class="form-control" type="text" maxlength="30"  @if(!empty($p)) value = "{{$p->cidade}}" @else value = "" @endif><!--  readonly="readonly" -->
                </div>
            </div><!-- col cidade -->

                <div class="col-2">
                <span>Estado</span>
                <div class="input-group">

                  <input id="estado" name="estado"  placeholder=""  required=""  class="form-control"type="text" maxlength="30" @if(!empty($p)) value = "{{$p->estado}}" @else value = "" @endif> <!--  readonly="readonly" -->
                </div>
                </div>


    </div><!-- row endereco -->

</fieldset><!--endereço-->
<hr>

<fieldset class="form-group">
        <legend aling="center">Contato</legend>
<div class="row"><!-- contato -->

       <div class="col-3">
            <div class="form-group">
                <label for="telefone">Telefone </label>
                    <input id="telefone" name="telefone" class="form-control"  placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                    OnKeyPress="formatar('## #####-####', this)"  @if(!empty($p)) value = "{{$p->telefone}}" @else value = "" @endif>
            </div>
        </div>  <!-- col Telefone-->

        <div class="col-3">
                <div class="form-group">
                    <label for="celular">Celular</label>
                        <input id="celular" name="celular" class="form-control"  placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                        OnKeyPress="formatar('## #####-####', this)"   @if(!empty($p)) value = "{{$p->celular}}" @else value = "" @endif>
                </div>
            </div>  <!-- col Telefone-->


        <div class="col-4">
            <div class="form-group">
                   <label for="exampleFormControlInput2">Email address</label>
                   <input type="email" class="form-control"  id="exampleFormControlInput2" placeholder="name@example.com"  @if(!empty($p)) value = "{{$p->email}}" @else value = "" @endif>
            </div>
            </div>

            </fieldset><!--endereço-->
  @if($p->medico)
            <hr>
<div class="col-4">
     <button  class="btn btn-secondary"  data-toggle="collapse" type = "button" data-target="#demo" @if(old('email')) aria-expanded="true" @endif >Planos</button>

 </div>
        <div id="demo" class="collapse">


            <div class="form-group navegacao">
                   <div class="col">
         <a  class="btn btn-outline-success recon"  data-toggle="modal" href="#modal-video"   data-toggle="tooltip" data-placement="top" title="adcionar novo plano"><i class="fas fa-plus-circle"></i></a>


              <div class="modal fade  "id="modal-video" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg "role="document">

                        <div class="modal-content ">
                            <div class="modal-header">
                                <button type="button" class="close"  onClick="history.go(0)"  data-dismiss="modal" aria-hidden="true">close <i class="fa fa-times"></i></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <iframe type="text/html" width="100%" height="100%" src="{{route('medico.planoNovo', ['id'=>$p->matricula])}}" frameborder="0" allowfullscreen=""></iframe>

                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>

             </div>
                <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="row" >Convenio</th>
                    <th scope="col">Plano</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opção</th>

              </tr>
            </thead>
            <tbody>

                @php $cont = 0; @endphp
                @foreach ($p->medico->planos()->where('sis_medico_tem_plano.status', 'ATIVO')->get() as $plano)
                @php $cont = $cont + 1; @endphp

              <tr class="Filter">
              <th scope="row">{{$plano->convenio->nome}}</th>

                 <td class="">{{$plano->nome}} </td>
                 <td class="">{{$plano->pivot->status}}</td>

                <td>

                    <a id="excluir"name = "excluir" class="btn btn-outline-danger" type="button" href="{{route('medico.desativar_plano',['id' => $p->matricula,'plano_id'=>$plano->id ])}}"
                      data-toggle="tooltip" data-placement="top" title="Desativar"><i class="fas fa-trash"></i></a>

                </td>

              </tr>
              @endforeach

            </tbody>

          </table>


    </div>
      @endif
{!! Form::close() !!}
</div><!-- container -->

@endsection

@section('scripts')

@endsection

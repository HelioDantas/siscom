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
        text-align: center;


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
    .ttt{

        margin:0;
    }

</style>
@endsection




@section('tela')
 <hr>
<div class="container-fluid col-lg-10 corpo-paciente">

    {!! Form::open(['route' => 'funcionario.create','method ' => 'post',]) !!} @csrf

    @if (session('cpfJaCadastrdo'))


    <div class="modal fade" id="modal-mail" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Close</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger ">
                {{ session('cpfJaCadastrdo') }}
            </div>

          </div>
          <div class="modal-footer">

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
@endif


     <div class="form-group ">
        <div class="form-group navegacao ttt">
                <div class="col">
                  <button id="Salvar"  class="btn btn-outline-primary" type="Submit"  data-toggle="tooltip" data-placement="top" title="Salvar"><i class="far fa-save"></i></button>
                  <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>
                  <a  class="btn btn-outline-secondary"   href="{{route('funcionario.listar')}}"   data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>

                  <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
                </div>
            </div>


           <h3 class="titulocadastro">Cadastro <strong>| Funcionario  </strong></h3>
        </div>

<fieldset class="form-group dadosForm">
    <legend aling="center">Dados Pessoais</legend>

<div class="row"><!-- dados pessoas -->



    <div class="form-group  col-xl-4 col-md-4  col-lg-5 mb-3">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome"  maxlength="49" class="form-control {{$errors->has('nome') ? 'is-invalid': '' }}" placeholder="nome" required autofocus
        value =   {{old('nome')}} >

        @if($errors->has('nome'))
            <div class="invalid-feedback">
                {$errors->first('nome')}}
            </div>
        @endif
    </div>


    <div class = " col-xl-2  col-md-6 col-lg-4">

        <div class="form-group">

            <label for="cpf">Cpf</label>
            <input type="text" name="cpf" id="cpf"   class="form-control {{$errors->has('cpf') ? 'is-invalid': '' }}" placeholder="Cpf" aria-describedby=""   maxlength="13" required
            value =   {{old('cpf')}}>

                @if($errors->has('cpf'))
                <div class="invalid-feedback">
                    {{$errors->first('cpf')}}
                    </div>
                @endif
        </div>
    </div>


   <div class=" col-xl-2  col-md-6 col-lg-3">
            <div class="form-group">
              <label for="cpf">RG</label>
              <input type="text" name="identidade" id="RG" class="form-control {{$errors->has('identidade') ? 'is-invalid': '' }}" required placeholder="identidade" aria-describedby="identidade" maxlength="13"

               value =   {{old('identidade')}}>

                @if($errors->has('identidade'))
                <div class="invalid-feedback">
                    {{$errors->first('identidade')}}
                    </div>
                @endif


            </div>
            </div><!--col cpf -->


        <div class="form-group  col-xl-2  col-md-6 col-lg-3">
            <label for="orgEmissor">Orgão Emissor</label>

            <input type="text" name="org_emissor" id="org_emissor" maxlength="17"  required class="form-control {{$errors->has('org_emissor') ? 'is-invalid': '' }}" placeholder="ex:Detran" aria-describedby=""
            value =   {{old('org_emissor')}}>
                 @if($errors->has('org_emissor'))
            <div class="invalid-feedback">
                {{$errors->first('org_emissor')}}
            </div>
                @endif



        </div>


    <div class="col-xl-2  col-md-6 col-lg-3">
        <div class="form-group">
            <label for="dataDeNascimento">Data Nascimento</label>
            <input type="date" name="dataDeNascimento"  required  id="dataDeNascimento" class="form-control {{$errors->has('dataDeNascimento') ? 'is-invalid': '' }}"  min="1850-04-01" max= "2020-04-01" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
            value =   {{old('dataDeNascimento')}}>

                @if($errors->has('dataDeNascimento'))
        <div class="invalid-feedback">
            {{$errors->first('dataDeNascimento')}}
            </div>
            @endif


        </div>
    </div><!--col dt Nascimento-->


    <div class=" col-xl-2 col-md-3 mb-3">
        <div class="form-group">
          <label for="nacionalidade">Nacionalidade</label>
          <input type="text" name="nacionalidade" maxlength="15" required id="nacionalidade" class="form-control {{$errors->has('nacionalidade') ? 'is-invalid': '' }}" placeholder="nacionalidade" value="Brasileiro"
          value =   {{old('nacionalidade')}}>
           @if($errors->has('nacionalidade'))
            <div class="invalid-feedback">
                {{$errors->first('nacionalidade')}}
            </div>
          @endif

        </div>
    </div><!--col nacionalidade -->

    <div class="  col-xl-3 col-md-5 mb-3">
            <div class="form-group">

            <label for="naturalidade">Naturalidade</label>
            <input type="text" name="naturalidade" maxlength="30" required id="naturalidade" class="form-control {{$errors->has('naturalidade') ? 'is-invalid': '' }}" placeholder="naturalidade"value =  {{old('naturalidade')}}
            >
            @if($errors->has('naturalidade'))
                <div class="invalid-feedback">
                    {{$errors->first('naturalidade')}}
                 </div>
            @endif

            </div>
    </div><!--col naturalidade -->

    <div class=" col-xl-3 col-md-5 mb-3">
        <div class="form-group">

            <label for="escolaridade">Escolaridade </label>
            <select required id="escolaridade" name="escolaridade" class="form-control {{ $errors->has('escolaridade') ? 'is-invalid': ''  }}"
                    value =   {{old('escolaridade')}}>
                    <option value="Fundamental Incompleto">Fundamental Incompleto</option>
                    <option value="Fundamental Completo">Fundamental Completo</option>
                    <option value="Médio Incompleto">Médio Incompleto</option>
                    <option value="Médio Completo">Médio Completo</option>
                <option value="Superior Incompleto">Superior Incompleto</option>
                    <option selected value="Superior Completo">Superior Completo</option>
                    <option value="Superior Completo">Pós Graduado</option>
            </select>
         @if($errors->has('escolaridade'))
             <div class="invalid-feedback">
              {{$errors->first('escolaridade')}}
            </div>
            @endif

        </div>
    </div>

        <div class=" col-xl-2 col-md-3 mb-3">
                    <div class="form-group">
                      <label for="profissao">Profissão</label>
                      <select required id="prof" name="profissao"  class="form-control {{$errors->has('profissao') ? 'is-invalid': '' }}"  value =   {{old('profissao')}}>
                      <option value="M">Medico</option>
                      <option selected value="A">Atendente</option>

                      </select>
                 @if($errors->has('profissao'))
                <div class="invalid-feedback">
                    {{$errors->first('profissao')}}
                    </div>
                     @endif

                    </div>
            </div><!--col nacionalidade -->



    <div class="col-xl-2 col-md-3 mb-3">
            <div class="form-group">

                <label for="selectbasic">Sexo </label>
                <select required id="genero" name="sexo" class="form-control {{ $errors->has('sexo') ? 'is-invalid': ''  }}"value =   {{old('sexo')}}>
                <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="N">Não declarado</option>
                    <option value="I">Indefinido</option>
                </select>
                        @if($errors->has('sexo'))
        <div class="invalid-feedback">
            {{$errors->first('sexo')}}
            </div>
            @endif

            </div>
    </div><!--col genero-->
   <!--/ </div> row 
    <div class="row">-->

    <div class="col-xl-2 col-md-3 mb-3">
            <div class="form-group">

                <label for="selectbasic">Etnia </label>
                <select required id="etnia" name="etnia" class="form-control {{$errors->has('etnia') ? 'is-invalid': '' }}"
                        value =   {{old('etnia')}}>
                <option value="B">Branco</option>
                    <option value="P">Pardo</option>
                    <option value="N">Negro</option>
                    <option value="I">Indigenas</option>
                </select>
                        @if($errors->has('etnia'))
        <div class="invalid-feedback">
            {{$errors->first('etnia')}}
            </div>
            @endif

            </div>
        </div><!--  etinia-->


        <div class="col-xl-2 col-md-3 mb-3">
                <div class="form-group">

                    <label for="selectbasic">Status </label>
                      <select required id="status" name="status" class="form-control {{$errors->has('status') ? 'is-invalid': '' }}"value =   {{old('status')}}>
                      <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                      </select>
                             @if($errors->has('status'))
     <div class="invalid-feedback">
         {{$errors->first('status')}}
        </div>
        @endif

                </div>
            </div><!--  etinia-->

    <div class="col-xl-2 col-md-4 mb-3">
            <div class="form-group">
                <label for="telefone">Telefone </label>
                    <input id="telefone" name="telefone" class="form-control {{$errors->has('telefone') ? 'is-invalid': '' }}" required="" type="text" maxlength="13"
                    value =   {{old('telefone')}}>

                      @if($errors->has('telefone'))
     <div class="invalid-feedback">
         {{$errors->first('telefone')}}
        </div>
        @endif


            </div>
        </div>  <!-- col Telefone-->

        <div class="col-xl-2 col-md-4 mb-3">
                <div class="form-group">
                    <label for="celular">Celular </label>
                        <input id="celular" name="celular" class="form-control {{$errors->has('celular') ? 'is-invalid': '' }}"  type="text" maxlength="13"
                        value =   {{old('celular')}}>

                          @if($errors->has('celular'))
     <div class="invalid-feedback">
         {{$errors->first('celular')}}
        </div>
        @endif

                </div>
            </div>  <!-- col Telefone-->

            <div class="col-xl-3 col-md-4 mb-3">
                <div class="form-group">
                       <label for="email">Email address</label>
                       <input type="email" maxlength="35" class="form-control {{$errors->has('email') ? 'is-invalid': '' }}" id="email" name = "email" placeholder="name@example.com"
                       value =   {{old('email')}}>

                           @if($errors->has('email'))
     <div class="invalid-feedback">
         {{$errors->first('email')}}
        </div>
        @endif
        <div class="invalid-feedback">
         Email invalido
        </div>
                </div>


            </div> <!-- col Email -->




                <div class="col-xl-3 col-md-5 mb-3 Fill invisivel">
                <div class="form-group">
                <label for="crm">CRM</label>
                <input type="text" name="crm" id="" class="form-control " placeholder="crm"  maxlength="30">

                </div>
                </div><!--col nome -->


                <div class="col-xl-2 col-md-3 mb-3 Fill invisivel">
                    <div class="form-group">
                      <label for="especialidade" >Especialidade 1</label>
                      <select  id="especialidade" name="especialidade1" class="form-control" >
                          <option value="">Não possui</option>
                          @foreach($especi as $e)
                                <option value="{{$e->id}}">{{$e->nome}}</option>
                         @endforeach
                      </select>
                    </div>
             </div>


                   <div class="col-xl-2 col-md-4 mb-3 Fill invisivel">
                    <div class="form-group teste">
                      <label for="especialidade2">Especialidade 2</label>
                      <select  id="especialidade2" name="especialidade2" id="" class="form-control" >
                          <option value="" selected>Não possui</option>

                      </select>
                    </div>
            </div>
    </div><!-- row -->

    </fieldset><!--Dados pessoas-->
    <hr>

   <fieldset class="form-group ">
                    <legend class = "ttt" aling="center">Endereço</legend>

                <div class="row">
                    <div class="col-xl-2 col-md-4 mb-3 ">
                         <div class="form-group">
                               <label for="cep">Cep</label>
                               <input type="text"   class="form-control input-md {{$errors->has('cep') ? 'is-invalid': '' }}" name="cep" id="cep"
                                placeholder="Apenas numeros" maxlength="15" value =   {{old('cep')}}>
                                      @if($errors->has('cep'))
                            <div class="invalid-feedback">
                                {{$errors->first('cep')}}
                                </div>
                                @endif

                            </div>

                        </div><!-- col cep -->

                                <div class="form-group">
                                     <button type="button" class="btn btn-outline-success pesquisar"  onclick="cep.value"> <!--  pesquisacep(cep.value)-->
                                    <strong>pesquisar</strong></button>
                                 </div>




                     <div class="col-xl-3 col-md-4 mb-3">
                      <span>Rua</span>
                          <div class="input-group">
                              <input type="text" name="rua" maxlength="35" required class="form-control {{$errors->has('rua') ? 'is-invalid': '' }}" id="rua"
                              value =   {{old('rua')}}>

                                @if($errors->has('rua'))
                                    <div class="invalid-feedback">
                                    {{$errors->first('rua')}}
                                    </div>
                                @endif

                      </div>
                  </div><!-- col rua-->

                   <div class="col-xl-1 col-md-2 mb-3">
                    <span >Nº </span>
                    <div class="input-group">
                      <input id="numero" name="numero" maxlength = '6' class="form-control {{$errors->has('numero') ? 'is-invalid': '' }}"placeholder=""   type="text"
                      value =   {{old('numero')}}>

                             @if($errors->has('numero'))
     <div class="invalid-feedback">
         {{$errors->first('numero')}}
        </div>
        @endif

                    </div>

                  </div> <!-- col bumero-->


                  <div class="col-xl-3 col-md-4 mb-3">

                   <span>Bairro</span>
                    <div class="input-group">
                      <input id="bairro" name="bairro"  required maxlength="30" placeholder=""   class="form-control {{$errors->has('bairro') ? 'is-invalid': '' }}"type="text"
                      value =   {{old('bairro')}}>

                              @if($errors->has('bairro'))
     <div class="invalid-feedback">
         {{$errors->first('bairro')}}
        </div>
        @endif

                    </div>

                    </div><!-- col bairro-->

                      <div class="col-xl-1 col-md-2 mb-3">
                    <span>Estado</span>
                    <div class="input-group">

                        <input id="uf" name="estado"  required maxlength="2" placeholder=""  class="form-control {{$errors->has('estado') ? 'is-invalid': '' }}" type="text"
                        value =   {{old('estado')}}>
                                       @if($errors->has('estado'))
     <div class="invalid-feedback">
         {{$errors->first('estado')}}
        </div>
        @endif

                    </div>
                </div>

                <div class="col-xl-3 col-md-4 mb-3">
                   <span>Cidade</span>
                    <div class="input-group">

                      <input id="cidade" name="cidade"  required maxlength="30" placeholder="" required=""  class="form-control {{$errors->has('cidade') ? 'is-invalid': '' }}" type="text"
                      value =   {{ old('cidade') }}>

                               @if($errors->has('cidade'))
     <div class="invalid-feedback">
         {{$errors->first('cidade')}}
        </div>
        @endif

                    </div>
                </div><!-- col cidade -->

                  



         </div><!-- row endereco -->

    </fieldset><!--endereço-->


    <hr>
<div class="col-4">
<button  class="btn btn-secondary Fill invisivel"  data-toggle="collapse" type = "button" data-target="#demo" @if(old('email')) aria-expanded="true" @endif >Planos</button>

</div>
<div id="demo" class="collapse">


    <div class="form-group navegacao">
           <div class="col">




    </div>

     </div>
        <table class="table table-hover Fill invisivel">
        <thead class="thead-dark">
        <tr>
            <th scope="row" >Convenio</th>
            <th scope="col">Plano</th>
            <th scope="col">Status</th>
            <th scope="col">Atender</th>

      </tr>
    </thead>
    <tbody>

        @php $cont = 0; @endphp
        @foreach ($planos as $plano)
        @php $cont = $cont + 1; @endphp

      <tr class="Filter">
      <th scope="row">{{$plano->convenio->nome}}</th>

         <td class="">{{$plano->nome}} </td>
         <td class="">{{$plano->status}}</td>

        <td>
            <div class="checkbox">

                    <input name = "$p[]" type="checkbox" value= {{$plano->id }}>
                     </div>


        </td>

      </tr>
      @endforeach

    </tbody>

  </table>


</div>




      {!! Form::close() !!}
    </div><!-- container -->

        @if (session('NaoAutorizado'))


    <div class="modal fade" id="modal-mail" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Clouse</h4>
          </div>
          <div class="modal-body">
           <div class="row">
            <iframe type="text/html" width="5000rem" height="650rem" src="{{route('erro')}}" frameborder="0" allowfullscreen=""></iframe>

            </div>

          </div>
          <div class="modal-footer">

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
@endif


    @endsection
    @section('scripts')
<script type="text/javascript" src="{{ asset('js/validaEmail.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cep.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/medi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/especialidades.js') }}"></script>

    @endsection

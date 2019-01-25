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
{!! Form::open(['route' => ['laboratorio.update', $l->id],'method ' => 'get',]) !!}

 @csrf
{{ method_field('PUT') }}


     <div class="form-group ">
        <div class="form-group navegacao ttt">
                <div class="col">
                  <button id="Salvar"  class="btn btn-outline-primary" type="Submit"  data-toggle="tooltip" data-placement="top" title="Salvar"><i class="far fa-save"></i></button>
              
                  @if(!session()->get("user")->permission()->where('permissao_id', 4)->get()->isEmpty())
                  <a  class="btn btn-outline-secondary"   href="{{ route('user.permissoes',['id'=>$l->id]) }}"data-toggle="tooltip"data-placement="top"title="permissoes"><i class="fab fa-expeditedssl"></i></a>
                  @endif
                  <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>
                  <a  class="btn btn-outline-secondary"   href="{{ route('laboratorio.listar')}}" data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>

                  <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
                </div>
            </div>

      <h4 class="titulocadastro">{{$l->nome}}</h4>


        <fieldset class="form-group dadosForm">
                <legend aling="center">Dados do Laboratório</legend>
<div class="row"><!-- dados pessoas -->
    <div class = "col-md-2 mb-3">

        <div class="form-group">

            <label for="id">id</label>
            <input type="number" name="id" id="id"   class="form-control {{$errors->has('id') ? 'is-invalid': '' }}" placeholder="id" aria-describedby=""   maxlength="5" required
            @if(!empty($p)) value = "{{$l->id}}" @else value = {{old('id')}} @endif>

                @if($errors->has('id'))
                <div class="invalid-feedback">
                    {{$errors->first('id')}}
                    </div>
                @endif
        </div>

        <div class="form-group col-md-4 mb-3">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome"  maxlength="50" class="form-control {{$errors->has('nome') ? 'is-invalid': '' }}" placeholder="nome" required
                @if(!empty($p)) value = "{{$p->nome}}" @else value = {{old('nome')}} @endif>

                @if($errors->has('nome'))
                    <div class="invalid-feedback">
                        {{$errors->first('nome')}}
                        </div>
                @endif
            </div>

             <div class="form-group col-md-4 mb-3">
                <label for="preco">Preço</label>
                <input type="text" name="nome" id="preco" class="form-control {{$errors->has('preco') ? 'is-invalid': '' }}" placeholder="preco" required
                @if(!empty($p)) value = "{{$p->preco}}" @else value = {{old('preco')}} @endif>

                @if($errors->has('preco'))
                    <div class="invalid-feedback">
                        {{$errors->first('preco')}}
                        </div>
                @endif
            </div>

   <div class="col-md-2 mb-3">
            <div class="form-group">
              <label for="id">Código do Laboratório</label>
              <input type="text" name="id_lab" id="id_lab" class="form-control {{$errors->has('id_procedimento') ? 'is-invalid': '' }}" placeholder="id_lab" aria-describedby="identidade" maxlength="11"
               @if(!empty($p)) value = "{{$p->id_lab}}" @else value = {{old('id_lab')}} @endif>

                @if($errors->has('id_procedimento'))
                <div class="invalid-feedback">
                    {{$errors->first('id_procedimento')}}
                    </div>
                @endif


</div><!-- row dados pessoas 1-->

            <hr>
<div class="col-4">
     <button  class="btn btn-secondary"  data-toggle="collapse" type = "button" data-target="#demo" @if(old('id')) aria-expanded="true" @endif >Procedimento</button>

 </div>
        <div id="demo" class="collapse">


            <div class="form-group navegacao">
                   <div class="col">
         <a  class="btn btn-outline-success recon"  data-toggle="modal" href=""   data-toggle="tooltip" data-placement="top" title="id"><i class="fas fa-plus-circle"></i></a>

        </div>
            </div>

             </div>
                <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="row" >Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Código do Procedimento</th>

              </tr>
            </thead>
            <tbody>

              <tr class="Filter">
              <th scope="row">{{$procedimentoclinico->procedimentoclinico->nome}}</th>

                 <td class="">{{$procedimentoclinico->nome}} </td>
                

                <td>

                    <a id="excluir"name = "excluir" class="btn btn-outline-danger" type="button" href="{{route('procedimentoclinico.desativar_procedimento',['id' => $l->id,'procedimentoclinico_id'=>$procedimentoclinico->id ])}}"
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
<!--
<script type="text/javascript" src="{{ asset('js/especialidades.js') }}"></script>


    <script type="text/javascript" src="{{ asset('js/validaEmail.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cep.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/medi.js') }}"></script>

    -->
@endsection

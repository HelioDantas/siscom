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


@section('conteudo')

    <h4 class="titulocadastro">Atualizar Dados do Convênio</h4>   
@endsection

@section('navegação')

        
@endsection

@section('tela')

<div class="container corpo ">
{!! Form::open(['route' => ['convenio.update', $convenio->cnpj],'method ' => 'post',]) !!}
 @csrf
{{ method_field('PUT') }}
     <div class="form-group ">
        <div class="form-group navegacao ttt">
                <div class="col">
                  <button id="Salvar"  class="btn btn-outline-primary" type="Submit"  data-toggle="tooltip" data-placement="top" title="Salvar"><i class="far fa-save"></i></button>
                  <a  class="btn btn-outline-secondary"   href="{{route('convenio.listar')}}"   data-toggle="tooltip" data-placement="top" title="pesquisar"><i class="fas fa-search"></i></a>
                  <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>
                  <a  class="btn btn-outline-secondary"   onClick="history.go(-1)"  data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>

                  <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
                </div>
            </div>


          <h3 class="titulocadastro"> {{$convenio->nome}}</strong></h3>
        </div>

        <fieldset class="form-group dadosForm">
    <legend aling="center">Dados </legend>
      <div class="form-group ">
<div class="row">

<div class="col-2">
<div class="form-group">
  <label for="cnpj">CNPJ</label>
  <input type="text" name="cnpj" id="" class="form-control" placeholder="cnpj" aria-describedby="helpId"  @if(!empty($convenio)) value = "{{$convenio->cnpj}}" @else value = "" @endif>

</div>
</div>


<div class="col-3">
<div class="form-group">
  <label for="nome">Nome do Convênio</label>
  <input type="text" name="nome" id="nome" class="form-control" placeholder="nome"  @if(!empty($convenio)) value = "{{$convenio->nome}}" @else value = "" @endif>

</div>
</div>


<div class="col-2">
<div class="form-group">
  <label for="data">Data de Adesão</label>
  <input type="date" name="adesao" id="dtNascimento"  @if(!empty($convenio)) value = "{{$convenio->adesao}}" @else value = "" @endif class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">
 
</div>
</div>


<div class="col-2">
        <div class="form-group">
          <label for="banco">Banco</label>
          <input type="text" name="identidade" id="banco" class="form-control" placeholder="banco" aria-describedby="banco" @if(!empty($convenio)) value = {{$convenio->banco}} @else value = "" @endif>
         
        </div>
        </div>

        <div class="col-2">
        <div class="form-group">
          <label for="cpf">Agência</label>
          <input type="text" name="agencia" id="agencia" class="form-control" placeholder="agencia" aria-describedby="agencia" @if(!empty($convenio)) value = {{$convenio->agencia}} @else value = "" @endif>
      
        </div>
        </div>

        <div class="col-2">
        <div class="form-group">
          <label for="conta">Conta</label>
          <input type="text" name="conta" id="conta" class="form-control" placeholder="conta" aria-describedby="conta" @if(!empty($convenio)) value = {{$convenio->conta}} @else value = "" @endif>

        </div>
        </div>

    <div class="col-2">
            <div class="form-group">
                
                <label for="selectbasic">Status <h11></h11></label>
                    <select required id="status_2" name="status_id" class="form-control"  @if(!empty($convenio)) value = {{$convenio->status}} @else value = "" @endif>
                      <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                      </select>
                   
                </div>
            </div>
        </div>
          </div>
           {!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
              $(':button').click(function() {
                  location.reload();
              });
        });       
     </script>
@endsection
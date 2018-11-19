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
    }

</style>
@endsection


@section('conteudo')

<h4 class="titulocadastro">Alterar dados, <strong>{{$c->nome}}</strong></h4>   
@endsection

@section('navegação')

        
@endsection

@section('tela')

<div class="container corpo">
{!! Form::open(['route' => ['convenio.update', $c->id],'method ' => 'post',]) !!}
 @csrf
{{ method_field('PUT') }}
<div class="form-group navegacao">
        <div class="col-8">
          <button id="editar" name="editar" class="btn btn-secondary" type="Submit">Salvar</button>

          <a  class="btn btn-primary href="{{route('convenio.editar')}}" role="button">Alterar</a>
        </div>
      </div>

        <fieldset class="form-group">
                <legend aling="center">Lista de Convênios</legend>
<div class="row">

<div class="col-4">
<div class="form-group">
  <label for="nome">CNPJ</label>
  <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ"  @if(!empty($c)) value = "{{$c->cnpj}}" @else value = "" @endif>
  <small id="cnpj" >Inserir número do cnpj</small>
</div>
</div><!--col nome -->

<div class="col-2">
<div class="form-group">
  <label for="nome">Nome do Convênio</label>
  <input type="text" name="cpf" id="" class="form-control" placeholder="nome de convenio" aria-describedby="helpId"  @if(!empty($c)) value = "{{$c->nome}}" @else value = "" @endif>
  <small id="nome" class="text-muted">Inserir nome do Convênio</small>
</div>
</div>

<div class="col-2">
<div class="form-group">
  <label for="data">Adesão</label>
  <input type="date" name="dataNascimento" id="dtNascimento"  @if(!empty($p)) value = "{{$c->adesao}}" @else value = "" @endif class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">
  <small id="dtNascimento" class="data">Inserir data de adesão</small>
</div>
</div>

<<div class="col-2">
<div class="form-group">
  <label for="banco">Banco</label>
  <input type="text" name="cpf" id="" class="form-control" placeholder="nome do banco" aria-describedby="helpId"  @if(!empty($c)) value = "{{$c->banco}}" @else value = "" @endif>
  <small id="banco" class="text-muted">Inserir nome do banco</small>
</div>
</div>

<div class="col-2">
<div class="form-group">
  <label for="agencia">Agência</label>
  <input type="text" name="agencia" id="" class="form-control" placeholder="numero da agencia" aria-describedby="helpId"  @if(!empty($c)) value = "{{$c->agencia}}" @else value = "" @endif>
  <small id="agencia" class="text-muted">Inserir numero da agência</small>
</div>
</div>

<div class="col-2">
<div class="form-group">
  <label for="conta">Conta</label>
  <input type="text" name="conta" id="" class="form-control" placeholder="numero conta" aria-describedby="helpId"  @if(!empty($c)) value = "{{$c->conta}}" @else value = "" @endif>
  <small id="conta" class="text-muted">Inserir número de conta</small>
</div>
</div>

<div class="col-2">
<div class="form-group">
  <label for="nome">Nome do Convênio</label>
  <input type="text" name="cpf" id="" class="form-control" placeholder="nome de convenio" aria-describedby="helpId"  @if(!empty($c)) value = "{{$c->nome}}" @else value = "" @endif>
  <small id="nome" class="text-muted">Inserir nome do Convênio</small>
</div>
</div>

<div class="col-2">
    <div class="form-group">             
        <label for="selectbasic">Status <h11></h11></label>
            <select required id="status" name="status" class="form-control"  @if(!empty($c)) value = "{{$c->status}}" @else value = "" @endif>
                <option value="A">Ativo</option>
                <option value="I">Inativo</option>
            </select>
        </div>
        </div>

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
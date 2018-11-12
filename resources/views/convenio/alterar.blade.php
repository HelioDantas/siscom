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

    <h4 class="titulocadastro">Atualizar Dados do Convênio</h4>   
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
          <button id="alterar" name="alterar" class="btn btn-info" type="Submit">Salvar</button>
        <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>
        </div>
      </div>

        <fieldset class="form-group">
                <legend aling="center">Alterar dados de Convênio</legend>
<div class="row">

<div class="col-2">
<div class="form-group">
  <label for="cnpj">CNPJ</label>
  <input type="text" name="cnpj" id="" class="form-control" placeholder="cnpj" aria-describedby="helpId"  @if(!empty($c)) value = "{{$p->cnpj}}" @else value = "" @endif>
  <small id="cnpj" class="text-muted">cnpj</small>
</div>
</div>


<div class="col-3">
<div class="form-group">
  <label for="nome">Nome do Convênio</label>
  <input type="text" name="nome" id="nome" class="form-control" placeholder="nome"  @if(!empty($p)) value = "{{$p->nome}}" @else value = "" @endif>
  <small id="nome" >insira o nome de convênio</small>
</div>
</div>


<div class="col-2">
<div class="form-group">
  <label for="data">Data de Adesão</label>
  <input type="date" name="adesao" id="dtNascimento"  @if(!empty($c)) value = "{{$c->adesao}}" @else value = "" @endif class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">
  <small id="adesao" class="data">inserir data de adesão</small>
</div>
</div>


<div class="col-2">
        <div class="form-group">
          <label for="banco">Banco</label>
          <input type="text" name="identidade" id="banco" class="form-control" placeholder="banco" aria-describedby="banco" @if(!empty($p)) value = {{$c->banco}} @else value = "" @endif>
          <small id="banco" class="text-muted">insira o nome do banco</small>
        </div>
        </div>

        <div class="col-2">
        <div class="form-group">
          <label for="cpf">Agência</label>
          <input type="text" name="agencia" id="agencia" class="form-control" placeholder="agencia" aria-describedby="agencia" @if(!empty($c)) value = {{$c->agencia}} @else value = "" @endif>
          <small id="agencia" class="text-muted">insira o numero </small>
        </div>
        </div>

        <div class="col-2">
        <div class="form-group">
          <label for="conta">Conta</label>
          <input type="text" name="conta" id="conta" class="form-control" placeholder="conta" aria-describedby="conta" @if(!empty($p)) value = {{$c->conta}} @else value = "" @endif>
          <small id="banco" class="text-muted">insira o número</small>
        </div>
        </div>

    <div class="col-2">
            <div class="form-group">
                
                <label for="selectbasic">Status <h11></h11></label>
                    <select required id="status_2" name="status_id" class="form-control"  @if(!empty($c)) value = {{$c->status}} @else value = "" @endif>
                      <option value="A">Ativo</option>
                        <option value="I">Inativo</option>
                      </select>
                   
                </div>
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
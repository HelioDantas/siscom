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

        <h4 class="titulocadastro">Atualizar Dados do Paciente</h4>   
@endsection

@section('navegação')

        
@endsection

@section('tela')

<div class="container corpo">
{!! Form::open(['route' => ['convenio.update', $p->id],'method ' => 'post',]) !!}
 @csrf
{{ method_field('PUT') }}
<div class="form-group navegacao">
        <div class="col-8">
          <button id="Cadastrar" name="Alterar" class="btn btn-info" type="Submit">Salvar</button>
        <button id="Alterar" name="Alterar" class="btn btn-danger" type="button">Cancelar</button>
        </div>
      </div>

        <fieldset class="form-group">
                <legend aling="center">Nome</legend>
<div class="row">



<div class="col-3">
<div class="form-group">
  <label for="nome">Número do convênio</label>
  <input type="text" name="nome" id="nome" class="form-control" placeholder="nome"  @if(!empty($p)) value = "{{$p->nome}}" @else value = "" @endif>
  <small id="nome" >Inserir o número de convênio</small>
</div>
</div><!--col nome -->

<div class="col-2">
<div class="form-group">
  <label for="cpf">Nome do convênio </label>
  <input type="text" name="cpf" id="" class="form-control" placeholder="Cpf" aria-describedby="helpId"  @if(!empty($p)) value = "{{$p->cpf}}" @else value = "" @endif>
  <small id="cpf" class="text-muted">Inserir nome do convênio</small>
    </div>
   </div>
  </div>              
</fieldset><!--endereço-->
<hr>

<fieldset class="form-group">
        <legend aling="center">Contato</legend>
<div class="row"><!-- contato -->

 
{!! Form::close() !!}
</div><!-- container -->

@endsection

@section('scripts')
    <!-- recarregando a pagina pelo butao cancelar nos modelos de formularios html  o funcao e ativada pelo (type="buttao)-->
    <script type="text/javascript">
        $(document).ready(function() {
              $(':button').click(function() {
                  location.reload();
              });
        });       
     </script>
@endsection
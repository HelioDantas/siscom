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

        <h4 class="titulocadastro">Cadastro Funcionario</h4>
@endsection
@section('navegação')


@endsection

@section('tela')
<div class="container corpo">
    <form action="create" method="post">
    @csrf

        <div class="form-group navegacao">
        <div class="col-8">
          <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
          <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
        </div>
      </div>

            <fieldset class="form-group">
                    <legend aling="center">Cadastro Medico</legend>
    <div class="row">




    <div class="col-3">
    <div class="form-group">
      <label for="crm">CRM</label>
      <input type="text" name="crm" id="" class="form-control" placeholder="crm">
      <small id="crm" class="text-muted">Nome Completo</small>
    </div>
    </div><!--col nome -->
<div class="col-3">
   <div class="form-group">
    @foreach($especialidade as $e)
    <div class="checkbox">
    <label><input type="checkbox" value = {{$e->id}}> {{$e->nome}}</label>
    </div>

    @endforeach
      </div>

   


    </form>
    </div><!-- container -->

    @endsection

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

        <h4 class="titulocadastro">Cadastro de Convênio</h4>
@endsection
@section('navegação')


@endsection

@section('tela')


<div class="container corpo">
    {!! Form::open(['route' => 'convenio.create','method ' => 'post',]) !!}
    @csrf

        <div class="form-group navegacao">
        <div class="col-16">
          <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
        
        </div>
      </div>

            <fieldset class="form-group">
                    <legend aling="center">Lista de Convênios</legend>
    <div class="row">

    <div class="row">

    <div class="col-2">
        <div class="form-group">
        <br><br>
          <label for="nome">CNPJ</label>
             <input type="text" name="cnpj" id="" class="form-control" placeholder="CNPJ">
             <small id="nome" class="text-muted">Inserir número do cnpj</small>
    </div>
    </div>

    <div class="col-4">
    <div class="form-group">
        <br><br>
        <label for="nome">Nome do Convênio</label>
      <input type="text" name="nome" id="" class="form-control" placeholder="nome de convenio">
      <small id="nome" class="text-muted">Inserir nome do Convênio</small>
    </div>
    </div>

     <div class="col-2">
    <div class="form-group">
        <br><br>
        <label for="nome">Adesão</label>
      <input type="date" name="adesao" id="" class="form-control" placeholder="data adesão">
      <small id="nome" class="text-muted">Inserir data de adesão</small>
    </div>
    </div>

     <div class="col-3">
    <div class="form-group">
        <br><br>
        <label for="nome">Banco</label>
      <input type="text" name="banco" id="" class="form-control" placeholder="nome do banco">
      <small id="nome" class="text-muted">Inserir nome do banco</small>
    </div>
    </div>

     <div class="col-2">
    <div class="form-group">
        <br>
        <label for="nome">Agência</label>
      <input type="text" name="agencia" id="" class="form-control" placeholder="numero da agencia">
      <small id="nome" class="text-muted">Inserir número da agência </small>
    </div>
    </div>

    <div class="col-3">
    <div class="form-group">
        <br>
        <label for="nome">Conta</label>
      <input type="text" name="conta" id="" class="form-control" placeholder="numero conta">
      <small id="nome" class="text-muted">Inserir número de conta</small>
    </div>
    </div>

    <div class="col-2">
        <div class="form-group">
            <br>
            <label for="selectbasic">Status <h11></h11></label>
                <select required id="status" name="status" class="form-control">
                    <option value="ATIVO">Ativo</option>
                        <option value="INATIVO">Inativo</option>
                          </select>
                    </div>
                </div>

                

    </div>
    </fieldset>
    <hr>
    </form>
    </div>

    @endsection

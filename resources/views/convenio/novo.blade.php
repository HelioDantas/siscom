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

        <h4 class="titulocadastro">Cadastro de Convênio</h4>
@endsection
@section('navegação')


@endsection

@section('tela')


<div class="container corpo">
{!! Form::open(['route' => 'convenio.create','method ' => 'post',]) !!}
 @csrf

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


          <h3 class="titulocadastro">Cadastro de Convênio</strong></h3>
        </div>

        <fieldset class="form-group dadosForm">
    <legend aling="center">Dados </legend>

    <div class="row">

    <div class="col-2">
        <div class="form-group">
        <br><br>
          <label for="nome">CNPJ</label>
             <input type="text" name="cnpj" id="" class="form-control" placeholder="CNPJ">
      
    </div>
    </div>

    <div class="col-4">
    <div class="form-group">
        <br><br>
        <label for="nome">Nome do Convênio</label>
      <input type="text" name="nome" id="" class="form-control" placeholder="nome de convenio">
     
    </div>
    </div>

     <div class="col-2">
    <div class="form-group">
        <br><br>
        <label for="nome">Adesão</label>
      <input type="date" name="adesao" id="" class="form-control" placeholder="data adesão">

    </div>
    </div>

     <div class="col-3">
    <div class="form-group">
        <br><br>
        <label for="nome">Banco</label>
      <input type="text" name="banco" id="" class="form-control" placeholder="nome do banco">

    </div>
    </div>

     <div class="col-2">
    <div class="form-group">
        <br>
        <label for="nome">Agência</label>
      <input type="text" name="agencia" id="" class="form-control" placeholder="numero da agencia">

    </div>
    </div>

    <div class="col-3">
    <div class="form-group">
        <br>
        <label for="nome">Conta</label>
      <input type="text" name="conta" id="" class="form-control" placeholder="numero conta">

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
       {!! Form::close() !!}
    </div><!-- container -->

    @endsection

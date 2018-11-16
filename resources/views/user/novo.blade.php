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
        margin-top: 1.3rem;
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
   

   .corpo{
       width:50rem;


   }

</style>
@endsection


@section('conteudo')

        
@endsection
@section('navegação')



@endsection

@section('tela')

<div class="container corpo">
       <h3 class="titulocadastro">Cadastro <strong>| Usuario  </strong></h3>
{!! Form::open(['route' => 'user.create','method ' => 'post',]) !!} @csrf
    <div class="form-group navegacao">
        <div class="col">
          <button id="Cadastrar"  class="btn btn-outline-success" type="Submit"  data-toggle="tooltip" data-placement="top" title="cadastrar"><i class="fas fa-plus-circle"></i></button>
          <a  id = "recon"class="btn btn-outline-danger"  href="{{route('user.novo')}}"   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>
        </div>
      </div>

<fieldset class="form-group">
                    <legend aling="center">Dados do Usuario</legend>
    <div class = "row">
    <div  class = "col-3">
        <div class = "form-group">
        <label for="matricula">Matricula</label>
         <input type="text" name="Sis_funcionario_matricula" id="" class="form-control"   @if(isset($func)) value = {{$func->matricula}} @else value = "" @endif>
     <small id="Sis_funcionario_matricula" class="text-muted">Hl</small>
    
        </div>
     </div>
<div class="col-3">
<div class="form-group">
  <label for="cpf">Cpf</label>
  <input type="text" name="cpf" id="" class="form-control" placeholder="Cpf"   @if(isset($func)) value = {{$func->cpf}} @else value = "" @endif>
  <small id="cpf" class="text-muted">Hl</small>
</div>
</div><!--col -->

<div class="col-2">
<div class="form-group">
  <label for="senha">Senha</label>
  <input type="password" name="password" id="" class="form-control" placeholder="senha">
  <small id="senha" class="text-muted">Hl</small>
</div>
</div><!--col -->


<div class="col-2">
<div class="form-group">
  <label for="dicaSenha">Dica</label>
  <input type="text" name="senha" id="" class="form-control" placeholder="dica da senha">
  <small id="dicaSenha" class="text-muted">Hl</small>
</div>
</div><!--col -->
</div>
{!! Form::close() !!}
</div>
@endsection
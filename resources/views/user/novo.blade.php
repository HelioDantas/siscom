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

        <h4 class="titulocadastro">Cadastro Usuario</h4>   
@endsection
@section('navegação')



@endsection

@section('tela')


 {!! Form::open(['route' => 'user.create','method ' => 'post',]) !!} @csrf
    <div class="form-group navegacao">
        <div class="col-8">
          <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
          <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
        </div>
      </div>

    <div class = "row">
    <div  class = "col-3">
        <div class = "form-group">
        <label for="Sis_funcionario_matricula">Matricula</label>
         <input type="text" name="Sis_funcionario_matricula" id="Sis_funcionario_matricula" class="form-control"   @if(isset($func)) value = {{$func->id}} @else value = "" @endif>
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
  <input type="password" name="senha" id = 'senha' class="form-control" placeholder="senha">
  <small id="senha" class="text-muted">Hl</small>
</div>
</div><!--col -->


<div class="col-2">
<div class="form-group">
  <label for="dicaSenha">Dica</label>
  <small id="dicaSenha" class="text-muted">Hl</small>
  <input type="text" name="dicaSenha" id="" class="form-control" placeholder="dica da senha">
  <small id="dicaSenha" class="text-muted">Hl</small>
</div>
</div><!--col -->
</div>


<!--<input type="checkbox" name="vehicle1" value="Bike"> -->
{!! Form::close() !!}

@endsection
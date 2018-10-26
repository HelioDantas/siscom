@extends('app')

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
        color:red;
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

</style>
@endsection


@section('conteudo')


        <h4 class="titulocadastro">Cadastro Paciente</h4>
    
@endsection


@section('tela')

<div class="container">
<form action="" method="post">

    

 <div class="row">

<div class="col-3">
<div class="form-group">
  <label for="">Nome*</label>
  <input type="text" name="nome" id="" class="form-control" placeholder="nome">
  <small id="helpId" class="text-muted">Help text</small>
</div>
</div><!--col -->

<div class="col-2">
<div class="form-group">
  <label for="cpf">Cpf*</label>
  <input type="text" name="cpf" id="" class="form-control" placeholder="Cpf" aria-describedby="helpId">
  <small id="cpf" class="text-muted">Hl</small>
</div>
</div><!--col -->

<div class="col-2">
<div class="form-group">
  <label for="data">Data Nascimento</label>
  <input type="date" name="" id="" class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">
  <small id="data" class="data">Data obrigatoria</small>
</div>
</div><!--col -->

<div class="col-3 seletorSexo">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        <label class="form-check-label" for="inlineRadio1">Masculino</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio2">Feminino</label>
    </div>
</div>
</div><!-- row -->

<div class="row">

<div class="col-3">
    <div class="form-group">
        <label for="prependedtext">Telefone <h11>*</h11></label>
            <input id="prependedtext" name="prependedtext" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
            OnKeyPress="formatar('## #####-####', this)">
    </div>
</div><!--col-->
    

<div class="col-4">
<div class="form-group">
       <label for="exampleFormControlInput2">Email address</label>
       <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com">
</div>


</div><!-- col Email-->

<div class="col-3">
<div class="form-group">
       <label for="cep">Cep</label>
       <input type="search" class="form-control input-md" id="cep" placeholder="Apenas numeros" maxlength="8" pattern="[0-9+$]">
    </div>
</div><!-- col cep -->
  
  <div class="col-2">
       <button type="button" class="btn btn-outline-success pesquisar"  onclick="pesquisacep(cep.value)">
        <strong>pesquisar</strong></button>
  </div><!-- col -->
</div><!-- row-->
 <div class=" endCentralizado">
         <label class=" col-md-2 control-label" for="endereco">Endereço</label>
   </div>
<fieldset class="form-group">
    <legend aling="center">Endereço</legend>

<div class="row">
    
     <div class="col">
      <span>Rua</span>
          <div class="input-group">
              
              <input type="text" name="rua" class="form-control" id="rua" readonly="readonly">
      
      </div>
  </div><!-- col rua-->
   
   <div class="col-2">
    <span >Nº <h11>*</h11></span>
    <div class="input-group">
     
      <input id="numero" name="numero" class="form-control"placeholder="" required=""  type="text">
    </div> 
   
  </div> <!-- col bumero-->
  
  
  <div class="col-3">

   <span>Bairro</span>
    <div class="input-group">
      
      <input id="bairro" name="bairro" placeholder="" required="" readonly="readonly" class="form-control"type="text">
    </div>

    </div><!-- col bairro-->
    
<div class="col-4">
   <span>Cidade</span>
    <div class="input-group">
      
      <input id="cidade" name="cidade"  placeholder="" required=""  readonly="readonly"class="form-control" type="text">
    </div>
</div><!-- col cidade -->

    <div class="col-1">
    <span>Estado</span>
    <div class="input-group">
      
      <input id="estado" name="estado"  placeholder="" required=""  readonly="readonly" class="form-control"type="text">
    </div>
    </div>
    
 
</div><!-- row endereco -->
    
</fieldset><!--endereço-->
   
</form>
</div><!-- container -->
@endsection
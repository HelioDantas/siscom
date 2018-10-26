@extends('app')

@section('tela')

<div class="container">
<form action="" method="post">

 <div class="row">

<div class="col-4">
<div class="form-group">
  <label for="">Nome*</label>
  <input type="text" name="nome" id="" class="form-control" placeholder="nome">
  <small id="helpId" class="text-muted">Help text</small>
</div>
</div><!--col -->

<div class="col-3">
<div class="form-group">
  <label for="cpf">Cpf*</label>
  <input type="text" name="cpf" id="" class="form-control" placeholder="Cpf" aria-describedby="helpId">
  <small id="cpf" class="text-muted">Hl</small>
</div>
</div><!--col -->

<div class="col-3">
<div class="form-group">
  <label for="data">Data Nascimento</label>
  <input type="date" name="" id="" class="form-control" placeholder="" OnKeyPress="formatar('##/##/####', this)">
  <small id="data" class="data">Data obrigatoria</small>
</div>
</div><!--col -->

<div class="col">
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

<div class="col-4">
        <div class="form-group">
                <label for="prependedtext">Telefone <h11>*</h11></label>
                
                <input id="prependedtext" name="prependedtext" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                OnKeyPress="formatar('## #####-####', this)">
            </div>
        </div>
    

<div class="col-6">
<div class="form-group">
       <label for="exampleFormControlInput2">Email address</label>
       <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com">
   </div>


</div>


</div><!-- row -->
</form>
</div>
@endsection
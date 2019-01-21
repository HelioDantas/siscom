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

    <h4 class="titulocadastro">Atualizar Dados do Convênio</h4>   
@endsection

@section('navegação')

        
@endsection

@section('tela')

<div class="container corpo ">
{!! Form::open(['route' => ['laboratorio.update', $laboratorio->id],'method ' => 'post',]) !!}
 @csrf
{{ method_field('PUT') }}
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
                        

        <h3 class="titulocadastro"> {{$laboratorio->nome}}</strong></h3>
    </div>

    <fieldset class="form-group dadosForm">
    <legend aling="center">Laboratório </legend>
    <div class="form-group ">

        <div class="row">

            <div class="col-xl-2 col-lg-4 col-md-4   mb-3">
                <div class="form-group">
            
                    <label for="nome">id</label>
                    <input type="number" name="id" id="id"class =  "form-control {{$errors->has('id') ? 'is-invalid': '' }}" required maxlength="5" @if(!empty($laboratorio)) value = "{{$convenio->cnpj}}" @else  value =   {{old('id')}} @endif>
                    
                    @if($errors->has('id'))
                        <div class="invalid-feedback">
                            {{$errors->first('id')}}
                        </div>
                     @endif
    
                </div>
            </div>
        

            <div class="col-xl-3 col-lg-4 col-md-5  mb-3">
                <div class="form-group">
            
                    <label for="nome">Nome do Laboratório</label>
                    <input type="text"maxlength="50" name="nome" id="" class =  "form-control {{$errors->has('nome') ? 'is-invalid': '' }}"   @if(!empty($laboratorio)) value = "{{$laboratorio->nome}}" @else  value =   {{old('nome')}}@endif>
                 @if($errors->has('nome'))
                        <div class="invalid-feedback">
                            {{$errors->first('nome')}}
                        </div>
                     @endif
                </div>
            </div>                     


            <div class="col-xl-2 col-lg-4 col-md-4  mb-3">
                <div class="form-group">
                
                    <label for="nome">Preco</label>
                    <input type="price" name="preco" id="" class = "form-control {{$errors->has('preco') ? 'is-invalid': '' }}"   @if(!empty($laboratorio)) value = {{$laboratorio->preco}} @else  value =   {{old('preco')}} @endif >
                     @if($errors->has('preco'))
                        <div class="invalid-feedback">
                           {{$errors->first('preco')}}
                        </div>
                     @endif
                </div>
            </div>

                

            <div class="col-xl-3 col-lg-4 col-md-3  mb-3">
                <div class="form-group">
                
                    <label for="nome">Código do Procedimento</label>
                    <input type="number" name="id_procedimento" maxlength="11" id=""class = "form-control {{$errors->has('id_procedimento') ? 'is-invalid': '' }}" @if(!empty($laboratorio)) value = {{$laboratorio->preco}} @else value =   {{old('preco')}} @endif>
                     @if($errors->has('preco'))
                        <div class="invalid-feedback">
                           {{$errors->first('preco')}}
                        </div>
                     @endif
                </div>
            </div>
                    
                 </div>
            </div>
        </div>
           {!! Form::close() !!}
@endsection

@section('scripts')
 
@endsection
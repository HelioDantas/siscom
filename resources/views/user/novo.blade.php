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


@endsection
@section('navegação')



@endsection

@section('tela')
<hr>
<div class="container-fluid col-lg-10 corpo-paciente">


       <h3 class="titulocadastro">Cadastro <strong>| Usuario  </strong></h3>
{!! Form::open(['route' => 'user.create','method ' => 'post', 'onsubmit'=>'return validarSenha();']) !!} @csrf

@if (session('cpfJaCadastrdo'))


<div class="modal fade" id="modal-mail" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Clouse</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger ">
                {{ session('cpfJaCadastrdo') }}
        </div>

      </div>
      <div class="modal-footer">

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
@endif


 <div class="form-group ">
    <div class="form-group navegacao ttt">
            <div class="col">
              <button id="Salvar"  class="btn btn-outline-primary" type="Submit"  data-toggle="tooltip" data-placement="top" title="Salvar"><i class="far fa-save"></i></button>

              <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
            </div>
     </div>



<fieldset class="form-group">
                    <legend aling="center">Dados do Usuario</legend>
    <div class = "row">
        <div  class = "col-md-3 mb-3">
            <div class = "form-group">
            <label for="matricula">Matricula</label>
            <input type="text" name="matricula" id="" readonly class="form-control {{ $errors->has('matricula') ? 'is-invalid': ''  }}"   @if((session('Funcionario')!= null)) value = {{ session('Funcionario')->matricula}} @else value = {{ old("matricula") }} @endif >
            @if($errors->has('matricula'))
            <div class="invalid-feedback">
                {{$errors->first('matricula')}}
             </div>
        @endif


            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="cpf">Cpf</label>
                <input type="text" name="cpf" id="" readonly class="form-control {{ $errors->has('cpf') ? 'is-invalid': ''  }}"placeholder="Cpf"   @if((session('Funcionario')!= null)) value ={{ session('Funcionario')->cpf}} @else value = {{ old("cpf") }} @endif >
                @if($errors->has('cpf'))
                <div class="invalid-feedback">
                    {{$errors->first('cpf')}}
                 </div>
                 @endif
            </div>
        </div><!--col -->

        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="NovaSenha" class="form-control {{ $errors->has('senha') ? 'is-invalid': ''  }}" placeholder="senha"  value = {{ old("senha") }}>
                <div class="invalid-feedback">
                        As senhas não coicidem
                       </div>
                       @if($errors->has('senha'))
                       <div class="invalid-feedback">
                           {{$errors->first('senha')}}
                        </div>
                        @endif
                 </div>

        </div><!--col -->

        <div class="col-md-3 mb-3">
                <div class="form-group">
                    <label for="senha">Confirmar senha</label>
                    <input type="password" name="senha2" id="CNovaSenha" class="form-control {{ $errors->has('senha2') ? 'is-invalid': ''  }}" placeholder="senha"  value = {{ old("senha2") }}>
                    <div class="invalid-feedback">
                           As senhas não conhecidem
                    </div>
                    @if($errors->has('senha2'))
                    <div class="invalid-feedback">
                        {{$errors->first('senha2')}}
                     </div>
                     @endif
                </div>
            </div><!--col -->



        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="dicaSenha">Dica</label>
                <input type="text" name="Dicasenha" id="" class="form-control {{ $errors->has('Dicasenha') ? 'is-invalid': ''  }}" placeholder="dica da senha"  value = {{ old("Dicasenha") }}>
                @if($errors->has('Dicasenha'))
                <div class="invalid-feedback">
                    {{$errors->first('Dicasenha')}}
                 </div>
                 @endif
            </div>
        </div><!--col -->
</div>

<div class="col-4">
        <button  class="btn btn-secondary  "  data-toggle="collapse" type = "button" data-target="#demo">Permissões</button>

        </div>
        <div id="demo" class="collapse">


            <div class="form-group navegacao">
                   <div class="col">




            </div>

             </div>
                <table class="table table-hover ">
                <thead class="thead-dark">
                <tr>


                    <th scope="col">id</th>
                    <th scope="col">nome</th>
                    <th scope="col">click</th>

              </tr>
            </thead>
            <tbody>

                @php $cont = 0; @endphp
                @foreach ($Permissao as $permissao)
                @php $cont = $cont + 1; @endphp

              <tr class="Filter">
              <th scope="row">{{$permissao->id}}</th>

                 <td class="">{{ $permissao->nome }} </td>


                <td>
                    <div class="checkbox">

                            <input  "form-control {{ $errors->has('$p') ? 'is-invalid': ''  }}" name = "$p[]" type="checkbox" value= {{$permissao->id }}>
                             </div>
                             @if($errors->has('$p'))
                             <div class="invalid-feedback">
                                 {{$errors->first('$p')}}
                              </div>
                              @endif

                </td>

              </tr>
              @endforeach
              @if($errors->has('$p'))
              <div class="invalid-feedback">
                  {{$errors->first('$p')}}
               </div>
               @endif
            </tbody>

          </table>

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </div>

{!! Form::close() !!}
</div>
@endsection
@section('scripts')

<script>

 function validarSenha(){
        NovaSenha = document.getElementById('NovaSenha').value;
        CNovaSenha = document.getElementById('CNovaSenha').value;
        if (NovaSenha != CNovaSenha){


             return false;
        }

        return true;
 }

</script>
<script type="text/javascript" src="{{ asset('js/validaEmail.js') }}"></script>
 @endsection

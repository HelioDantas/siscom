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
              <a  class="btn btn-outline-info"   onClick="history.go(0)"  data-toggle="tooltip" data-placement="top" title="Recarregar"><i class="fas fa-redo"></i></a>
              <!--<button id="Cancelar" name="Cancelar" class="btn btn-danger" type="button">Cancelar</button>-->
            </div>
     </div>



<fieldset class="form-group">
                    <legend aling="center">Dados do Usuario</legend>
    <div class = "row">
        <div  class = "col-md-3 mb-3">
            <div class = "form-group">
            <label for="matricula">Matricula</label>
            <input type="text" name="Sis_funcionario_matricula" id="" class="form-control"   @if(isset($Funcionario)) value = {{$Funcionario->matricula}} @else value = {{ session('Funcionario')->matricula}} @endif readonly>


            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="cpf">Cpf</label>
                <input type="text" name="cpf" id="" class="form-control" placeholder="Cpf"   @if(isset($Funcionario)) value = {{$Funcionario->cpf}} @else value = {{ session('Funcionario')->cpf }} @endif readonly>
                <small id="cpf" class="text-muted">Hl</small>
            </div>
        </div><!--col -->

        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="password" id="NovaSenha" class="form-control" placeholder="senha">
                <div class="invalid-feedback">
                        As senhas não conhecidem
                       </div>

            </div>
        </div><!--col -->

        <div class="col-md-3 mb-3">
                <div class="form-group">
                    <label for="senha">Confirmar senha</label>
                    <input type="password" name="password" id="CNovaSenha" class="form-control" placeholder="senha">
                    <div class="invalid-feedback">
                           As senhas não conhecidem
                    </div>
                </div>
            </div><!--col -->



        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="dicaSenha">Dica</label>
                <input type="text" name="senha" id="" class="form-control" placeholder="dica da senha">

            </div>
        </div><!--col -->
</div>

<div class="col-4">
        <button  class="btn btn-secondary  "  data-toggle="collapse" type = "button" data-target="#demo"><a HREF="#fim">Permissao</button>

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
              <th scope="row">{{$permissao->nome}}</th>

                 <td class="">{{$permissao->id}} </td>


                <td>
                    <div class="checkbox">

                            <input name = "$p[]" type="checkbox" value= {{$permissao->id }}
                             </div>


                </td>

              </tr>
              @endforeach

            </tbody>

          </table>


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

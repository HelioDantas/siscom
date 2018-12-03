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


  


<fieldset class="form-group">
                    <legend aling="center">Permissoes Usuario</legend>
    <div class = "row">


</div>

<div class="container">



                <div class="form-group navegacao">
                        <div class="col">
                         <a  class="btn btn-outline-success recon"  data-toggle="modal" href="#modal-video1"   data-toggle="tooltip" data-placement="top" title="adicionar novas permissões"><i class="fas fa-plus-circle"></i></a>
                          <a class="btn btn-outline-primary" href="{{route('funcionario.editar',['id' =>  $id])}}"  title="voltar para o editar funcionario"><i class="fas fa-edit"></i></a>
                                   <a  class="btn btn-outline-secondary"   href="{{route('funcionario.listar')}}"   data-toggle="tooltip" data-placement="top" title="pesquisar funcionario"><i class="fas fa-search"></i></a>
                              <div class="modal fade  "id="modal-video1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg "role="document">

                                        <div class="modal-content "   height = "5000rem">
                                            <div class="modal-header">

                                                <button type="button" class="close"  onClick="history.go(0)"  data-dismiss="modal" aria-hidden="true">close <i class="fa fa-times"></i></button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                                                <iframe type="text/html" width="5000rem" height="650rem" src="{{route('user.newPermissoes',['id' =>  $id])}}" frameborder="0" allowfullscreen=""></iframe>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>

                             </div>



                <table class="table table-hover ">
                <thead class="thead-dark">
                <tr>


                    <th scope="col">id</th>
                    <th scope="col">nome</th>
                    <th scope="col">remove</th>

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
                <a id="excluir"name = "excluir" class="btn btn-outline-danger" type="button" href="{{route('user.destroyPermissoes',['id' => $permissao->id, 'user_id' => $id])}}"
                                data-toggle="tooltip" data-placement="top" title="Desativar"><i class="fas fa-trash"></i></a>
                </td>

              </tr>
              @endforeach

            </tbody>

          </table>


    </div>

        </div>

</div>
@endsection
@section('scripts')

<script>



</script>

 @endsection

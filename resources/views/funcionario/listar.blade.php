@extends('layout.app')

@section('estilos')
<style>
    span{
        text-align: center;
    }
    form{

     float: right;
    }
    .container-fluid{
        margin-top: 1rem;
    }
    .btn{
        float:right;
    }


</style>
@endsection

@section('conteudo')

@endsection





@section('navegação')



@endsection



@section('tela')



<div class="container-fluid col-lg-12">
<div class="card text-center mb-3">
    <div class="card-header">

           <h3 class="titulopacientes">Funcionario Cadastrados</h3>
            <a  class="btn btn-outline-secondary"   onClick="history.go(-1)"  data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>
            <a  class="btn btn-outline-danger"  href=""   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>
            <a  class="btn btn-outline-success recon"  href="{{route('funcionario.novo')}}"   data-toggle="tooltip" data-placement="top" title="cadastrar"><i class="fas fa-plus-circle"></i></a>
          <form class="form-inline my-2 my-lg-0" action="buscar" method="post">
                @csrf
                <select name="tipobusca" id="tipobusca"class="form-control mr-sm-2" >
                        <option value="" selected>Selecione</option>
                        <option value="nome">nome</option>
                        <option value="id">prontuario</option>
                        <option value="telefone">telefone</option>
                        <option value="cpf">cpf</option>
                    </select>
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Buscar nome, cpf e matricula">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <div class="card-body">
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">matricula     </th>
                <th scope="col">nome            </th>
                <th scope="col">cpf             </th>
                <th scope="col">identidade      </th>
                <th scope="col">Nascimento</th>
                <th scope="col">sexo            </th>
                <th scope="col">nacionalidade   </th>
                <th scope="col">naturalidade    </th>
                <th scope="col">escolaridade    </th>
    <!--        <th scope="col">rua             </th>
                <th scope="col">numero          </th>
                <th scope="col">bairro          </th>
                <th scope="col">cep             </th>
                <th scope="col">cidade          </th>
                <th scope="col">estado          </th>
                <th scope="col">telefone        </th>
                <th scope="col">celular         </th>
                <th scope="col">email           </th>-->
                <th scope="col">profissao       </th>
                <th scope="col">status        </th>
                <th scope="col">opções</th>
              </tr>
            </thead>
            <tbody>
            @php $cont = 0; @endphp
                @foreach ($funcionarios as $p)
                       @php $cont = $cont + 1; @endphp
              <tr >
                  <th scope="row">     {{$p->matricula}}        </th>
  <!--           <td>       {{$p->DataCadastro}}        </td>  -->
                 <td class="info-nome">       {{$p->nome}}                </td>
                 <td>       {{$p->cpf}}                 </td>
                 <td>       {{$p->identidade}}          </td>
                 <td>       {{$p->dataDeNascimento}}    </td>
                 <td>       {{$p->sexo}}                </td>
                 <td>       {{$p->nacionalidade}}       </td>
                 <td>       {{$p->naturalidade}}        </td>
                 <td>       {{$p->escolaridade}}        </td>
    <!--         <td>       {{$p->rua}}                 </td>
                 <td>       {{$p->numero}}              </td>
                 <td>       {{$p->bairro}}              </td>
                 <td>       {{$p->cep}}                 </td>
                 <td>       {{$p->cidade}}              </td>
                 <td>       {{$p->estado}}              </td>
                 <td>       {{$p->telefone}}            </td>
                 <td>       {{$p->celular}}             </td>
                 <td>       {{$p->email}}               </td>-->
                 <td>       {{$p->profissao}}           </td>
                 <td>       {{$p->status}}            </td>
                <td>


              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-trash"></i></button>
                          <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Exclusão</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        Deseja Excluir esse funcionario?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button id="excluir"name = "excluir" class="btn btn-outline-danger" type="Submit" onclick ="algum({{$p->matricula}})"  data-toggle="tooltip" data-placement="top" title="excluir">excluir</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                 <a class="btn btn-outline-primary" href="editar/{{$p->matricula}}"  title="editar"><i class="fas fa-edit"></i></a>
                  <a class="btn btn-outline-secondar" href="show/{{$p->matricula}}"  title="visualizar"> <i class="fas fa-eye "></i></a>

                </td>


              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="card-footer">
             @if($cont==9)
                <p></p>


            @endif
            {!!$funcionarios->links()!!}
          </div>
    </div>

</div>
    @if(old('cpf'))

       <a class="alert alert-success" >Funcionario cadastrado!!</a>

    @endif


     @if (session('NaoAutorizado'))


    <div class="modal fade" id="modal-mail" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onclick="excluirModal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Clouse</h4>
          </div>
          <div class="modal-body">
           <div class="row">
            <iframe type="text/html" id = "f" width="5000rem" height="650rem" src="{{route('erro')}}" frameborder="0" allowfullscreen=""></iframe>

            </div>

          </div>
          <div class="modal-footer">

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
@endif


    @endsection
    @section('scripts')
    <script>
            $("#f").blur(function(){
                $("#modal-mail").remove();
            });
        function excluirModal(){
            $("#modal-mail").empty();

        }
    </script>
 <script type="text/javascript" src="{{ asset('js/cep.js') }}"></script>
          <script type="text/javascript" src="{{ asset('js/confirmacaoDeExclusao.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/filtra.js') }}"></script>
    @endsection

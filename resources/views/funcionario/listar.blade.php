
@extends('layout.app')


@section('estilos')
<style>
  	span {
		text-align: center;
	}

	form {

		float: right;

	}

	.titulopacientes {
		display: ruby-base-container;
	}

	.container-fluid {
		margin-top: 1rem;
	}

	.btn {
		float: right;
	}

	.btm {
		margin-top: 0.5rem;
		float: left;
	}
 
     @media(max-width: 1350px){
        .titulopacientes{

                 margin-left: 10%; 
        }
    }
       @media(max-width: 1550px ){
        .respom{

                 margin-left: 29%; 
        }
    }
</style>
@endsection

@section('conteudo')

@endsection





@section('navegação')



@endsection



@section('tela')
@php $edit = $show = $destroy = $novo = false;  @endphp
@foreach (session()->get("user")->permission()->get() as $permission )
@if($permission->pivot->permissao_id == 1)
    @php $edit = true @endphp

@endif

@if($permission->pivot->permissao_id == 5)
    @php $show = true @endphp


@endif

@if($permission->pivot->permissao_id == 6)
    @php $destroy = true @endphp

@endif

@if($permission->pivot->permissao_id == 3)
    @php $novo = true @endphp


@endif

@endforeach


<div class="container-fluid col-lg-12">
    <div class="card text-center mb-6">
        <div class="card-header">
            <h3 class="titulopacientes respom">Funcionario Cadastrados</h3>
            <a  class="btn btn-outline-secondary"    href="{{route('dashboard')}}"    data-toggle="tooltip" data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>
            <a  class="btn btn-outline-danger"  href=""   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>
            @if($novo)
                <a  class="btn btn-outline-success recon"  href="{{route('funcionario.novo')}}"   data-toggle="tooltip" data-placement="top" title="cadastrar">
                <i class="fas fa-plus-circle"></i></a>
            @endif
            <form class="form-inline my-2 my-lg-0" action="buscar" method="post">
                @csrf
                <select name="tipobusca" id="tipobusca"class="form-control mr-sm-2" >
                    <option value="" selected>Selecione</option>
                    <option value="nome">nome</option>
                    <option value="matricula">matricula</option>
                    <option value="telefone">telefone</option>
                    <option value="cpf">cpf</option>
                </select>
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Buscar nome, cpf e matricula">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
                <div class="card-body">
                    <div class="table-responsive" style="overflow-x:auto;">  
                        <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">matricula      </th>
                            <th scope="col">nome            </th>   
                            <th scope="col">cpf             </th>
                            <th scope="col">nascimento      </th>
                            <th scope="col">sexo            </th>
                            <th scope="col">telefone        </th>
                            <th scope="col">celular         </th>
                            <th scope="col">naturalidade    </th>
                <!--        <th scope="col">rua             </th>
                            <th scope="col">numero          </th>
                            <th scope="col">bairro          </th>
                            <th scope="col">cep             </th>
                            <th scope="col">cidade          </th>
                            <th scope="col">estado          </th>
                            <th scope="col">telefone        </th>
                            
                            <th scope="col">email           </th>-->
                            <th scope="col">profissão       </th>
                            <th scope="col">status        </th>
                            <th scope="col">opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $cont = 0; @endphp
                            @foreach ($funcionarios as $p)
                                @php $cont = $cont + 1; @endphp
                            <tr >
                            <th scope="row">     {{$p->matricula}}  </th>
             <!--           <td>       {{$p->DataCadastro}}        </td>  -->
                            <td class="info-nome">  {{$p->nome}}   </td>
                            <td>       {{$p->cpf}}                 </td>
                            <td>       {{$p->formatDate($p->dataDeNascimento)}}    </td>
                            <td>       {{$p->sexo}}                </td>
                            <td>       {{$p->telefone}}            </td>
                              <td>       {{$p->celular}}             </td>
                            <td>       {{$p->naturalidade}}        </td>
                <!--        <td>       {{$p->rua}}                 </td>
                            <td>       {{$p->numero}}              </td>
                            <td>       {{$p->bairro}}              </td>
                            <td>       {{$p->cep}}                 </td>
                            <td>       {{$p->cidade}}              </td>
                            <td>       {{$p->estado}}              </td>
                          
                            <td>       {{$p->email}}               </td>-->
                            <td>       {{$p->profissao}}           </td>
                            <td>       {{$p->status}}            </td>
                            <td>
                                @if($destroy)
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-trash"></i></button>
                                    <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Exclusão</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
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

                                @endif

                                @if($edit)
                                    <a class="btn btn-outline-primary" href="editar/{{$p->matricula}}"  title="editar"><i class="fas fa-edit"></i></a>
                                @endif

                                @if($show)
                                    <a class="btn btn-outline-secondar" href="show/{{$p->matricula}}"  title="visualizar"> <i class="fas fa-eye "></i></a>
                                @endif
                         </td>


                        </tr>
                    @endforeach
                    </tbody>
                   
                </table>
                 </div>
            </div>

                <div class="card-footer">
                    @if($cont==9)
                        <p></p>


                    @endif
                    @if (isset($search) && isset($tipobusca))
                    {!!$funcionarios->appends(['search' => $search, 'tipobusca' => $tipobusca])->links()!!}
                    @else
                    {!!$funcionarios->links()!!}
                    @endif
                    
               

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
        </div>
 
    </div>
</div>
    @endsection
    @section('scripts')
    <script>
            $("#f").blur(function(){
                $("#modal-mail").empty();
            });
        function excluirModal(){
            $("#modal-mail").empty();

        }
    </script>

    <script>
        function formatDate(data) {
        if (formato == 'pt-br') {
            return (data.substr(0, 10).split('-').reverse().join('/'));
        } else {
            return (data.substr(0, 10).split('/').reverse().join('-'));
        }
        }

    
    <script>
 <script type="text/javascript" src="{{ asset('js/cep.js') }}"></script>
          <script type="text/javascript" src="{{ asset('js/confirmacaoDeExclusao.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/filtra.js') }}"></script>
    @endsection

@extends('layout.app') @section('estilos')
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
	   @media(max-width: 1550px ){
        .respom{

                 margin-left: 29%; 
        }
    }
</style>
@endsection @section('conteudo') @endsection
 @section('navegação')
 @endsection
  @section('telaListarPaciente')

  @php $edit = $show = $destroy = $novo = false;  @endphp
@foreach (session()->get("user")->permission()->get() as $permission )
	@if($permission->pivot->permissao_id == 7)
		@php $edit = true @endphp

	@endif

	@if($permission->pivot->permissao_id == 11)
		@php $show = true @endphp


	@endif

	@if($permission->pivot->permissao_id == 12)
		@php $destroy = true @endphp

	@endif

	@if($permission->pivot->permissao_id == 9)
		@php $novo = true @endphp


	@endif

@endforeach
<!--<a  class="btn btn-outline-danger"  href=""   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>-->

<div class="container-fluid col-lg-12">

	<div class="card text-center mb-6">
		<div class="card-header">
			@if(old('nome'))
			<div class=" btm">
				<a class="alert alert-success">Paciente cadastrado!!</a>
			</div>
			@endif
			<h3 class="titulopacientes respom">Pacientes Cadastrados</h3>
			<a class="btn btn-outline-secondary"  href="{{route('dashboard')}}" data-toggle="tooltip" data-placement="top" title="Voltar">
				<i class="fas fa-share"></i>
			</a>
			<a class="btn btn-outline-danger" href="" data-toggle="tooltip" id="tooltip" data-placement="top" title="Cancelar perquisa">
				<i class="fas fa-times"></i>
            </a>
            @if($novo)
			<a id="recon" class="btn btn-outline-success" href="{{route('paciente.novo')}}" data-toggle="tooltip" data-placement="top"
			 title="cadastrar">
				<i class="fas fa-plus-circle"></i>
            </a>
            @endif

			<form class="form-inline my-2 my-lg-0" action="buscar" method="post">
				@csrf
				<select name="tipobusca" id="tipobusca"class="form-control mr-sm-2" >
					<option value="" selected>Selecione</option>
					<option value="nome">nome</option>
					<option value="id">prontuario</option>
					<option value="telefone">telefone</option>
					<option value="celular">celular</option>
					<option value="cpf">cpf</option>
				</select>
				<input class="form-control mr-sm-2" type="text" name="search" placeholder="Buscar nome, cpf e matricula">
				<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
			</form>

		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="row">prontuario </th>
							<th scope="col">nome </th>
							<th scope="col">cpf </th>
							<th>identidade </th>
							<th scope="col">Nascimento</th>
							{{--
							<th>sexo </th> --}} {{--
							<th>etnia </th> --}} {{--
							<th scope="col">nacionalidade </th>--}}
							<th scope="col">naturalidade </th>
							{{--
							<th scope="col">escolaridade </th> --}}
							<!--        <th scope="col">rua             </th>
							<th scope="col">numero          </th>
							<th scope="col">bairro          </th>
							<th scope="col">cep             </th>
							<th scope="col">cidade          </th>
							<th scope="col">estado          </th>-->
							<th scope="col">telefone </th>
							<th scope="col">celular </th>
						<!--	<th scope="col">email </th> -->
							{{--
							<th scope="col">profissão </th> --}}
							<th scope="col">status </th>
							<th scope="col">opções </th>
						</tr>
					</thead>
					<tbody>
						@php $cont = 0; @endphp @foreach ($pacientes as $p) @php $cont = $cont + 1; @endphp

						<tr class="Filter">
							<td class="prontuario">
								<strong> {{$p->id}} </strong>
							</td>
			<!--           <td>       {{$p->DataCadastro}}        </td>  -->
							<td class="nome"> {{$p->nome}} </td>
							<td class="cpf"> {{$p->cpf}} </td>
							<td> {{$p->identidade}} </td>
							<td>       {{$p->formatDate($p->dataDeNascimento)}}    </td>
							{{--
							<td> {{$p->sexo}} </td>
							<td> {{$p->etnia}} </td> --}} {{--
							<td> {{$p->nacionalidade}} </td> --}}
							<td> {{$p->naturalidade}} </td>
							{{--
							<td> {{$p->escolaridade}} </td> --}}
		    <!-- <td>       {{$p->rua}}                 </td>
                 <td>       {{$p->numero}}              </td>
                 <td>       {{$p->bairro}}              </td>
                 <td>       {{$p->cep}}                 </td>
                 <td>       {{$p->cidade}}              </td>
                 <td>       {{$p->estado}}              </td>-->
							<td> {{$p->telefone}} </td>
							<td> {{$p->celular}} </td>
							{{--<td> {{$p->email}} </td>
							
							<td> {{$p->profissao}} </td> --}}
							<td> {{$p->status}} </td>
							<td>
                                    @if($destroy)
								<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter" title="excluir">
									<i class="fas fa-trash"></i>
								</button>
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
												<p id="permissaoEditarPaciente"> Deseja Excluir esse paciente? <p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button id="excluir" name="excluir" class="btn btn-outline-danger" type="Submit" onclick="algum({{$p->id}})" data-toggle="tooltip"
												 data-placement="top" title="excluir">excluir</button>
											</div>
										</div>
									</div>
								</div>
                                @endif
                                @if($edit)
								<a class="btn btn-outline-primary" href="editar/{{$p->id}}" title="editar"><i class="fas fa-edit"></i>
                                </a>
                                @endif
                                @if($show)
								<a class="btn btn-outline-secondar" href="show/{{$p->id}}" title="visualizar">
									<i class="fas fa-eye "></i>
                                </a>
                                @endif
							</td>

						</tr>
						@endforeach
					</tbody>
			</div>
			</table>

			<div class="card-footer">
				@if($cont==9)

				<p></p>

				@endif 
				@if (isset($search) && isset($tipobusca))
				{!!$pacientes->appends(['search' => $search, 'tipobusca' => $tipobusca])->links()!!}
				@else
				{!!$pacientes->links()!!}
				@endif
				
			</div>
		</div>

	</div>
</div>
<hr>

 @endsection
 @section('scripts')
<script type="text/javascript" src="{{ asset('js/filtra.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/confirmacaoDeExclusao.js') }}"></script>


@endsection

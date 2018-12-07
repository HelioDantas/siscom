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
         margin-left: 10%;
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
    .card{
        margin-top: 
    }

     @media(max-width: 1550px ){
        .respom{

                 margin-left: 29%; 
        }
    }
</style>
@endsection





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


@section('tela')
<div class="container-fluid col-lg-12">

<div class="card text-center">
    <div class="card-header">

            @if(old('nome'))
			<div class=" btm">
				<a class="alert alert-success">Convênio cadastrado!!</a>
			</div>
			@endif


			<h3 class="titulopacientes respom">Convênios Cadastrados</h3>
			<a class="btn btn-outline-secondary" onClick="history.go(-1)" data-toggle="tooltip" data-placement="top" title="Voltar">
				<i class="fas fa-share"></i>
			</a>
			<a class="btn btn-outline-danger" href="" data-toggle="tooltip" data-placement="top" title="Cancelar">
				<i class="fas fa-times"></i>
            </a>
            @if($novo)
			<a id="recon" class="btn btn-outline-success" href="{{route('convenio.novo')}}" data-toggle="tooltip" data-placement="top"
			 title="cadastrar">
				<i class="fas fa-plus-circle"></i>
            </a>
            @endif

		{{--	<form class="form-inline my-2 my-lg-0" action="buscar" method="post">
				@csrf
				<select name="tipobusca" id="tipobusca"class="form-control mr-sm-2" >
					<option value="" selected>Selecione</option>
					@foreach ($convenios as $cv )
                        <option value="{{ $cv->cnpj }}">{{ $cv->nome }}</option>
                    @endforeach
                </select>
                

				<input class="form-control mr-sm-2" type="text" name="search" placeholder="Buscar nome, cpf e matricula">
				<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
			</form> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive" style="overflow-x:auto;"> 
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th >cnpj     </th>
                <th >nome     </th>
                <th >adesao   </th>
                <th >banco    </th>
                <th >agencia  </th>
                <th >conta    </th>
                <th >status   </th>
         
                <th scope="col">opções </th>

              </tr>
            </thead>
          <tbody>

                @foreach ($convenios as $c)
                    
              <tr>  
                 <td>       {{$c->cnpj}}          </td>
                 <td>        {{ $c->nome}}        </td> 
                 <td>       {{$c->adesao}}        </td>
                 <td>       {{$c->banco}}         </td>
                 <td>       {{$c->agencia}}       </td>
                 <td>       {{$c->conta}}         </td>
                 <td>       {{$c->status}}        </td>
                 <td>
                    <a  class = "btn btn-outline-primary"  href="editar/{{$c->cnpj}}"  title="editar"><i class="fas fa-edit"></i></a> 
                    <a class = "btn btn-outline-info"     href="{{ route('convenio.detalhe',['detalhe'=> $c->id ]) }}" title="Planos"><i class="fab fa-product-hunt"></i></a> 
                    <a class = "btn btn-outline-dark"     href="{{ route('convenio.detalhe.procedimento',['procedimento'=> $c->id ]) }}" title="Procedimentos"><i class="fas fa-syringe"></i></a> 
                </td>

              </tr>
              @endforeach
              </div>
            </tbody>
          </table>

          <div class="card-footer">
           <span> {{$convenios->links()}}</span>
          </div>
    </div>

</div>
</div>
    


    @endsection
    @section('scripts')
    <script  href="{{ asset('js/filtro.js') }}" type="text/javascript"></script>
    @endsection
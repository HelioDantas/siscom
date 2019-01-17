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



@section('navegação')

     <div class="row FilterRow">
        <div class="col-3">
                <div class="form-group">
                        <form class="FilterRow" action="buscar" method="post">
                                @csrf
                            <label for="basic-url">Busque por:</label>
                           <input class="btn-text-top form-control" type="text" name="search" placeholder="Buscar nome, preco, id e procedimento">
                           <button class="btn-buscar-top" type="submit"></button>
                       </form>

                </div>
        </div>
</div>

@endsection


@section('tela')


<div class="container-fluid col-lg-12">
    <div class="card text-center mb-6">
        <div class="card-header">
           <h3 class="titulopacientes">Lista de Procedimento</h3>
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
                    <option value="nome">Nome</option>
                    <option value="id">Id</option>
                    <option value="id_lab">Código do Laboratorio</option>
                </select>
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Buscar nome ou id ">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    

<div class="card text-center">
    <div class="card-header">
    
    </div>
    <div class="card-body">
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th >Id             </th>
                <th >Nome           </th>
                <th >Laboratorio    </th>
              </tr>
            </thead>
            <tbody>
            @php $cont = 0; @endphp
                @foreach ($procedimentoClinico as $p)
                       @php $cont = $cont + 1; @endphp
              <tr class="Filter-nome">
                 <td>       {{$p->id}}          </td>
  
                 <td class="info-nome">       {{$p->nome}}                </td>
                 <td>       {{$p->id_lab}}          </td>
                
                    <a href="excluir/{{$p->id}}"><i class="fas fa-trash"></i></a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="card-footer">
             @if($cont==4)
                <p></p>
              @else
                {!!$procedimentoClinico->links()!!}
            @endif
          </div>
    </div>

</div>
    


    @endsection
    @section('scripts')
    <script type="text/javascript" src="{{ asset('js/filtra.js') }}"></script>
    @endsection
@extends('layout.app') @section('estilos')
<style>
    .save{
        margin-top: 2rem;
        float:right;
        
    }
    .ctt{
      
   -ms-flex-align: center;
     
     }
     .lista{
         margin-top: 2rem;
         text-align: center;
     }
     form{
         margin-left: 15%;
     }
   
</style>
@endsection

@section('tela')

<div class="container">
    <h3 class="aling-center">{{ $convenio->nome }}</h3>
   
    {{--<p><strong> Nome:</strong> <span>{{ $evento->nome }}</span></p> --}}
           <p> <strong> Cnpj </strong>- {{ $convenio->cnpj }} </p>
           <p><strong>Adesao </strong> - {{ $convenio->adesao }} </p>
           <p><strong> Banco </strong> - {{ $convenio->banco }} </p>
           <p> <strong> Agencia </strong> - {{ $convenio->agencia}} </p> 
           <p><strong>Conta</strong> - {{ $convenio->conta }} </p>
    <hr>
</div>

<div class="container">
        
<form action="{{ route('convenio.plano.assoc',['convenio/'=> $convenio->id]) }}" method="PUT">
    <div class="row justify-content-md-center">
            <div class="form-group col-md-4">
                <label for="planos">Planos</label>

                <select name="cargos" id="cargos" class="form-control ">
                    <option value="" selected>selecione</option>
                    @if ($planos)
                        @foreach ($planos as $pl)
                        <option value="{{ $pl->id }}">{{ $pl->nome }}</option>
                        @endforeach
                    @endif

                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="planos">Procedimento</label>
                <select name="cargosfuncionario" id="cargosfuncionario" class="form-control ">
                    <option value="" selected></option>

                </select>
            </div>
            <div class="col save">
                <button id="Salvar" class="btn btn-outline-primary" type="Submit" data-toggle="tooltip" data-placement="top"
                    title="Salvar"><i class="far fa-save"></i></button>
                <a class="btn btn-outline-secondary" href="{{ route('convenio.listar') }}" data-toggle="tooltip"
                    data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>

            </div>
        </div>
</form>

</div>





<div class="container lista col-lg-8">

    <h3>Lista de planos </h3>

    <div class="table table-responsive ">
        <table class="table table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th s># </th>
                    <th>nome </th>
                    <th>status </th>
                    <th> Opcoes </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($planos))
                @foreach ($planos as $plano )
                <tr>
                    <td>{{ $plano->id }}</td>
                    <td>{{ $plano->nome }}</td>
                    <td>{{ $plano->status }}</td>
                    <td>
                       <!-- <a href="{{ route('convenio.plano.assoc.excluir',['evento'=> '', 'funcionario' => $plano->id ]) }}"><i
                                class="fas fa-trash"></i></a> -->
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>


        </table>
        {!!$planos->links()!!}

    </div>





    @endsection

    @section('scripts')
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>

    @endsection

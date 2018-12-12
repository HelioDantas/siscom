@extends('layout.app') @section('estilos')
<style>
    .save{
        margin-top: 2rem;
        float:right;
        
    }
    .back{
        margin-top: 2rem;
        float:right;
        padding-left: 1rem;
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
     h2{
         text-align: center;
     }
     #detalheTop{
        margin-top: 5%;
     }
   
</style>
@endsection

@section('tela')

<div class="container">
    <div>

        <h2 type="hiden"></h2>
        

    </div>
        <div class="container detalheTop">
    <h2 class="aling-center">{{ $convenio->nome }}</h2>
   
    {{--<p><strong> Nome:</strong> <span>{{ $evento->nome }}</span></p> --}}
    
        <div class="row">
            <div class="col-xl-3 col-md-3  col-lg-5 mb-3"><span> <strong> Cnpj </strong>- {{ $convenio->cnpj }}</span></div>
            <div class="col-xl-2 col-md-3  col-lg-5 mb-3"><span><strong>Adesao </strong> - {{ $convenio->adesao }} </span></div>
            <div class="col-xl-2 col-md-3  col-lg-5 mb-3"><span><strong> Banco </strong> - {{ $convenio->banco }} </span></div>
            <div class="col-xl-2 col-md-3  col-lg-5 mb-3"><span> <strong> Agencia </strong> - {{ $convenio->agencia}} </span></div>
            <div class="col-xl-2 col-md-3  col-lg-5 mb-3"> <span><strong>Conta</strong> - {{ $convenio->conta }} </span></div>
           
           
            
          
        </div>
    </div>
    <hr>
</div>

<div class="container">
    <form action="{{ route('convenio.plano.assoc') }}" method="post">
                @csrf 
            <div class="row justify-content-md-center">

                    <div class="form-group col-xl-4 col-md-4  col-lg-5 mb-4">
                            <label for="planos">Planos inativos</label>
            
                            <select name="inativo_id" id="inativo" class="form-control ">
                                <option value="" selected>selecione</option>
                                @if ($inativos)
                                    @foreach ($inativos as $inativo)
                                    <option value="{{ $inativo->id}}">{{ $inativo->nome }}</option>
                                    @endforeach
                                @endif
            
                            </select>
                        </div>

                        <div class="save">
                                <button id="Salvar" class="btn btn-outline-primary" type="Submit" data-toggle="tooltip" data-placement="top"
                                title="Salvar"><i class="far fa-save"></i></button>
                                </div>
                            
            
                        <div class="form-group col-xl-4 col-md-4  col-lg-5 mb-4">
                            <label for="nome">novo plano</label>
                            <input type="text" name="nome" id="nome" maxlength="30" class="form-control">
                        </div>

                        <input type="hidden" name="convenio_id" value="{{ $convenio->id }}">
                        <div class="save">
                        <button id="Salvar" class="btn btn-outline-success" type="Submit" data-toggle="tooltip" data-placement="top"
                        title="Salvar"><i class="fas fa-plus-circle"></i></button>
                        </div>

                        <div class="back">
                                <a class="btn btn-outline-secondary" href="{{ route('convenio.listar') }}" data-toggle="tooltip"
                                    data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>
                                </div>
                                   
                    
            </div>
            
    </form>
               
                
            </div> 
        </div>


</div>





<div class="container lista col-lg-8">

    <h3> Planos </h3>

    <div class="table table-responsive ">
        <table class="table table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th s># </th>
                    <th>nome </th>
                    <th>status </th>
                    <th> Opcões </th>
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
                         <a href="{{ route('convenio.plano.assoc.delete',['delete' => $plano->id ]) }}" class="btn btn-outline-primary" title="Inativar"><i
                             class="fas fa-trash"></i></a>
                              
<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target=".bd-example-modal-lg"  title="Procedimentos"><i class="fas fa-syringe"></i></button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-body">
            <div class="container-fluid">
                <h3 class="justify-content-center"> procedimentos </h3>
              
                <a href="{{route('procedimento.novo',[ 'novo' => $plano->id])}}" class=" btn-outline-primary">cadastrar novo</a>
                    
                     <table class="table table-responsive table-hover">
                         <thead>
                             <tr>
                             <th>codigo Tuss</th>
                             <th>descrição</th>
                             <th>preço </th>

                            </tr>
                         </thead>
                         <tbody>
                        @foreach ($plano->procedimentos()->get()  as $pp)
                        @if (!empty($pp))
                             <tr>
                                 <td>{{ $pp->codTuss }}</td>
                                 <td>{{ $pp->descricao }}</td>
                                 <td>{{ $pp->pivot->precoPlano }}</td>
                             </tr>
                            @else
                            <tr>
                            <td> Esse paciente ainda nao possui um historico de convênios e planos cadastrados </td>
                        </tr>
                             @endif
                         @endforeach
                         </tbody>
                     </table>
                        
                     {{--                                     <iframe type="text/html" width="5000rem" height="650rem" src="{{route('procedimento.novo',['convenio' =>  $convenio->id ])}}" frameborder="0" allowfullscreen=""></iframe>
 --}}
                       
                    

                    </div>

            </div>
    </div>
</div>
</div>
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

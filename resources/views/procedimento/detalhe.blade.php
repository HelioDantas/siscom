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
     h3{
         text-align: center;
     }
     #detalheTop{
        margin-top: 5%;
     }
     #nome{
         position: initial;
     }
   
</style>
@endsection

@section('telaListarPaciente')


    <div>

        <h2 type="hiden"></h2>
        

    </div>
        <div class="container detalheTop">
   
            <h3 class="d-flex justify-content-center">{{ $plano->nome }}</h3>
    </div>
    <hr>


    <form action="{{ route('procedimento.plano.assoc') }}" method="post">
                @csrf 
                <input type="hidden" name="plano_id" value="{{ $plano->id }}">
            <div class="container-fluid">
            <div class="row justify-content-md-center">

                    <div class="form-group col-xl-5 col-md-4  col-lg-5 mb-4">
                            <label for="procedimentos">procedimentos inativos</label>
            
                            <select name="inativo" id="inativo" class="form-control ">
                                <option value="" selected>selecione</option>
                                    @foreach ($plano->procedimentos()->where('status','INATIVO')->get() as $inativo)
                                    <option value="{{ $inativo->codTuss}}">{{ $inativo->descricao }}</option>
                                    @endforeach
                        
            
                            </select>
                        </div> 
                        <div class="save">
                                <button id="Salvar" class="btn btn-outline-primary" type="Submit" data-toggle="tooltip" data-placement="top"
                                title="Salvar"><i class="far fa-save"></i></button>
                                </div>
            </div>
            <div class="row">
                            
            
                        <div class="form-group col-xl-4 col-md-4  col-lg-5 mb-4 justify-content-xl-start">
                            <label for="nome">novo procedimento</label>
                            <input type="text" name="nomeProced" id="nome" maxlength="35" class="form-control">
                        </div>

                            <div class="form-group col-xl-3 col-md-4  col-lg-5 mb-4">
                                    <label for="procedimentos">Especialidade</label>
                    
                                    <select name="especialidade_id" id="especialidade" class="form-control ">
                                        <option value="" selected>selecione</option>
                                            @foreach ($especialidades as $espec)
                                            <option value="{{ $espec->id}}">{{ $espec->nome }}</option>
                                            @endforeach
                                
                    
                                    </select>
                                </div> 

                                <div class="form-group col-xl-2 col-md-2  col-lg-3 mb-2">
                                        <label for="nome">Codigo Tuss</label>
                                        <input type="text" name="ProcedCodTuss" id="nome" maxlength="10" class="form-control">
                                    </div>


                                    <div class="form-group col-xl-1 col-md-4  col-lg-5 mb-4">
                                            <label for="nome">Preço</label>
                                            <input type="text" name="ProcedPreco" id="nome" maxlength="7" class="form-control">
                                        </div>

                       

                        <div class="save">
                        <button id="Salvar" class="btn btn-outline-success" type="Submit" data-toggle="tooltip" data-placement="top"
                        title="Salvar"><i class="fas fa-plus-circle"></i></button>
                        </div>

                        <div class="back">
                                <a class="btn btn-outline-secondary" href="#" data-toggle="tooltip"
                                    data-placement="top" title="Voltar"><i class="fas fa-share"></i></a>
                                </div>
            </div>      
                    
            </div>

    </form>

               
          
        </div>


</div>





<div class="container-fluid lista col-lg-10">
      {{--   <a style="float:right;" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar Especialidade</a>  --}}

    <h3> Procedimentos </h3>

<div class="row">
    <div class="table table-responsive ">
        <table class="table table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">CodigoTuss </th>
                    <th scope="col">descrição </th>
                    <th scope="col">preço </th>
                    <th> Opcões </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($plano))
                @foreach ( $plano->procedimentos()->where('status','ATIVO')->get() as $proced )
                <tr>
                    <td scope="col">{{ $proced->codTuss }}</td>
                    <td scope="col">{{ $proced->descricao }}</td>
                    <td scope="col">{{ $proced->preco }}</td>
                    <td>
                            <a href="{{ route('proced.plano.assoc.delete',['delete' => $plano->id ,'proced' => $proced->codTuss ]) }}"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>


        </table>
      {{--   {!!  !!}$procedimentos->links()!!}   --}}

    </div>
</div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <h3 class="justify-content-center"> cadastre uma nova especialidade </h3>
                        
                        <form action="" method="post">
                            <div class="container-fluid col-xl-12-lg-10-mb-6">
                                <div class="row">

                                    <div class=" col form-group">
                                        <span>Nome: </span>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>

                                    <div class="col-5 form-group">
                                            <span>descrição: </span>
                                            <input type="text" name="" id="" class="form-control">
                                        </div>
                                        <div class="col form-group">
                                                <span>Codigo Tuss: </span>
                                                <input type="text" name="" id="" class="form-control">
                                            </div>

                                            <div class="save">
                                                    <button id="Salvar" class="btn btn-outline-success" type="Submit" data-toggle="tooltip" data-placement="top"
                                                    title="Salvar"><i class="fas fa-plus-circle"></i></button>
                                                    </div>
                                </div>
                            </div>
                        </form>
                            </div>
        
                    </div>
            </div>
        </div>
        </div>

    @endsection

    @section('scripts')
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>

    @endsection

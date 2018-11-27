@extends('layout.app')

@section('estilos')
<style>
    span{
        text-align: center;
    }
    form{
      
     float: right;
    
    }
    .titulopacientes{
       margin-left: 17rem;
      text-align: center;
      float:left;
    }
    .container-fluid{
        margin-top: 1rem;
    }
    .btn{
        float:right;
    }

    .btm{
         margin-top: 0.5rem;
        float:left;
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
       
              <h3 class="titulopacientes">Planos</h3>
        



       
    </div>
    <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="row" >Convenio</th>
                     <th scope="col">id</th>
                <th scope="col">Plano</th>
                <th scope="col">Opção</th>
         
               
              </tr>
            </thead>
            <tbody>
            
                @foreach ($planos as $p)

               
              <tr class="Filter">
                 <td class="prontuario">{{$p->convenio->nome}}</td>
                  <td class="cpf">{{$p->id}}</td>
                 <td class="nome">{{$p->nome}} </td>
                
              
                <td>
                       {!! Form::open(['route' => 'medico.planoCreate','method ' => 'post',]) !!} @csrf


                       <imput type = "hidden"   name = "id" value = {{$p->id }} > </imput>
                        <a class="btn btn-outline-primary"  type = "submit"  title="adicionar novo plano"><i class="fas fa-plus-circle"></i></a> 

                       {!! Form::close() !!}
                </td>

              </tr>
              @endforeach
            </tbody>
        </div>
          </table>

          <div class="card-footer">
        

                <p></p>  

    
            {!!$planos->links()!!}
          </div>
    </div>

</div>
</div>
   <hr> 
  

    @endsection


    @section('scripts')
<script type="text/javascript" src="{{ asset('js/filtra.js') }}"></script>
 <script type="text/javascript" src="{{ asset('js/confirmacaoDeExclusao.js') }}"></script>   
    @endsection








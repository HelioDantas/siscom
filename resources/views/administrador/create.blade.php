@extends('layout.app2')

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
       
              <h3 class="titulopacientes">Permissões</h3>
        



       
    </div>
    <div class="card-body">
            <div class="table-responsive">
            
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
             
                     <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">Opção</th>
         
               
              </tr>
            </thead>
            <tbody>
            
                @foreach ($Permissao as $permissao)

               
              <tr class="Filter">
                
                  <td class="cpf">{{$permissao->id}}</td>
                 <td class="nome">{{$permissao->nome}} </td>
           
              
                <td>

                 <a id=""name = "excluir" class="btn btn-outline-primary" type="button" href="{{route('user.createPermissoes',['id' => $permissao->id,'user_id'=>$id])}}"
                      data-toggle="tooltip" data-placement="top" title="adicionar novo plano"><i class="fas fa-plus-circle"></i></a>  
                
                </td>

              </tr>
              @endforeach
            </tbody>
        </div>
          </table>

          <div class="card-footer">
        

                <p></p>  

    
         
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








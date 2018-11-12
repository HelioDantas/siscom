@extends('layout.app')

@section('estilos')
<style>
    span{
        text-align: center;
    }
</style>
@endsection

@section('conteudo')
<div class="jumbotron">
TESTANDO: <span style="color:red;">visualização e paginação do dados do paciente</span>
</div>
@endsection


@section('navegação')

    <div class="col-2">
    <label for="filtrar-tabela">Buscar</label>
    <input type="text" name="filtro" id="filtrar-tabela">    
    </div>    
@endsection



@section('tela')
    
<div class="card text-center">
    <div class="card-header">
            <h3 class="titulopacientes">Pacientes Cadastrados</h3>
    </div>
    <div class="card-body">
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

                @foreach ($convenio as $c)
                    
              <tr>
                 <td>       {{$c->id}}          </td>
  
                 <td class="info-nome">       {{$c->nome}}    </td>
                 <td>       {{$p->cnpj}}                 </td>
                 <td>       {{$p->nome}}          </td>
                 <td>       {{$p->adesao}}        </td>
                 <td>       {{$p->banco}}         </td>
                 <td>       {{$p->agencia}}       </td>
                 <td>       {{$p->conta}}         </td>
                 <td>       {{$p->status}}        </td>
          
                    <a href="alterar/{{$p->id}}"><i class="fas fa-edit"></i></a> 
            
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="card-footer">
           <span> {{$convenio->links()}}</span>
          </div>
    </div>

</div>
    


    @endsection
    @section('scripts')
    <script  href="{{ asset('js/filtro.js') }}" type="text/javascript"></script>
    @endsection
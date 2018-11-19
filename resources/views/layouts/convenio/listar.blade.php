@extends('layout.app')

@section('estilos')
<style>
    span{
        text-align: center;
    }
    .FilterRow{
        margin-top: 1rem;
    justify-content: center !important;
        
        
    }
</style>
@endsection

@section('conteudo')

    <div class="row FilterRow">
        <div class="col-2">
                <div class="form-group">
                
                    <label for="selectbasic">Pesquisar</label>
                      <select required  id="buscarPor" name="busca" class="form-control">
                        <option value=".cnpj">cnpj</option>
                        <option value=".nome" selected >nome</option>
                        <option value=".adesao">adesao</option>
                        <option value=".banco">banco</option>
                        <option value=".agencia">agencia</option>
                        <option value=".conta">conta</option>
                        <option value=".status">status</option>
                      </select>
                   
                </div>
                
        </div>
        <div class="col-3">
                <label for="filtrar-tabela">Pesquisar</label>
                <input type="text" name="filtro"  class="form-control" id="filtrar-tabela">    
                </div>
                </div>


@endsection


@section('navegação')
       
@endsection

@section('tela')
    
<div class="card text-center mb-3">
    <div class="card-header">
            <h3 class="titulopacientes">Lista de Convênios</h3>
    </div>
    <div class="card-body">
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th >CNPJ               </th>
                <th >Nome de Convênio   </th>
                <th >Adesão             </th>
                <th >Banco              </th>
                <th >Agência            </th>
                <th >Conta              </th>
    
                <th scope="col">status  </th>  
                
              </tr>
            </thead>
            <tbody>

                @foreach ($convenio as $c)
                    
              <tr class="Filter">
                 <td class="cnpj">       {{$c->id}}        </td>
                 <td class="nome">       {{$c->nome}}      </td>
                 <td class="adesao">     {{$c->adesao}}    </td>
                 <td class="banco">      {{$c->banco}}     </td>
                 <td class="agencia">    {{$c->adesao}}    </td>
                 <td>                    {{$p->status}}    </td>  

                    <a href="editar/{{$c->id}}"><i class="fas fa-edit"></i></a> 
                
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
<script type="text/javascript" src="{{ asset('js/filtra.js') }}"></script>
    
    @endsection
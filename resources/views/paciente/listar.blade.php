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
                
                    <label for="selectbasic">Buscar por</label>
                      <select required  id="buscarPor" name="busca" class="form-control">
                        <option value=".cpf">Cpf</option>
                        <option value=".nome" selected >nome</option>
                        <option value=".telefone">telefone</option>
                        <option value=".prontuario">prontuario</option>
                      </select>
                   
                </div>
                
        </div>
        <div class="col-3">
                <label for="filtrar-tabela">Buscar</label>
                <input type="text" name="filtro"  class="form-control" id="filtrar-tabela">    
                </div>
                </div>


@endsection


@section('navegação')



       
@endsection



@section('tela')
    
<div class="card text-center mb-3">
    <div class="card-header">
            <h3 class="titulopacientes">Pacientes Cadastrados</h3>
    </div>
    <div class="card-body">
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th >prontuario      </th>
                <th >nome            </th>
                <th >cpf             </th>
                <th >identidade      </th>
                <th >Nascimento</th>
                <th >sexo            </th>
     {{--       <th >etnia           </th>      --}}
                <th >nacionalidade   </th>
    {{--        <th >naturalidade    </th>   
                <th >escolaridade    </th>--}}
    <!--        <th scope="col">rua             </th>
                <th scope="col">numero          </th>
                <th scope="col">bairro          </th>
                <th scope="col">cep             </th>
                <th scope="col">cidade          </th>
                <th scope="col">estado          </th>
                <th scope="col">telefone        </th>
                <th scope="col">celular         </th>-->
                <th scope="col">email           </th> 
       {{--          <th scope="col">profissao       </th> --}}
                <th scope="col">status        </th>  
                <th scope="col">opções    </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $p)
                    
              <tr class="Filter">
                 <td class="prontuario">       {{$p->id}}          </td>
  <!--           <td>       {{$p->DataCadastro}}        </td>  -->
                 <td class="nome">       {{$p->nome}}             </td>
                 <td class="cpf">       {{$p->cpf}}                 </td>
                 <td>       {{$p->identidade}}          </td>
                 <td>       {{$p->dataDeNascimento}}    </td>
                 <td>       {{$p->sexo}}                </td>
  {{--            <td>       {{$p->etnia}}               </td>   --}}
                 <td>       {{$p->nacionalidade}}       </td>
    {{--              <td>       {{$p->naturalidade}}        </td> 
                 <td>       {{$p->escolaridade}}        </td>  --}}
    <!--         <td>       {{$p->rua}}                 </td>
                 <td>       {{$p->numero}}              </td>
                 <td>       {{$p->bairro}}              </td>
                 <td>       {{$p->cep}}                 </td>
                 <td>       {{$p->cidade}}              </td>
                 <td>       {{$p->estado}}              </td>
                 <td>       {{$p->telefone}}            </td>
                 <td>       {{$p->celular}}             </td>-->
                 <td>       {{$p->email}}               </td> 
      {{--           <td>       {{$p->profissao}}           </td>  --}}
                 <td>       {{$p->status}}            </td>  
                <td>
                    <a href="editar/{{$p->id}}"><i class="fas fa-edit"></i></a> 
                
                    <a href="excluir/{{$p->id}}"><i class="fas fa-trash"></i></a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="card-footer">
           <span> {{$pacientes->links()}}</span>
          </div>
    </div>

</div>
    


    @endsection


    @section('scripts')
<script type="text/javascript" src="{{ asset('js/filtra.js') }}"></script>
    
    @endsection
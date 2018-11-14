@extends('layout.app')

@section('estilos')
<style>
    span{
        text-align: center;
    }
    .FilterRow{
    margin-top: 1rem;
        justify-content:flex-end !important;
        
        width: 83.7%;
    }
</style>
@endsection

@section('conteudo')
<div class="jumbotron">
TESTANDO: <span style="color:red;">visualização e paginação do dados dos funcionarios</span>
</div>
@endsection





@section('navegação')

     <div class="row FilterRow">
        <div class="col-3">
                <div class="form-group">
                        <form class="FilterRow" action="buscar" method="post">
                                @csrf
                            <label for="basic-url">Busque por:</label>
                           <input class="btn-text-top form-control" type="text" name="search" placeholder="Buscar nome, cpf e matricula">
                           <button class="btn-buscar-top" type="submit"></button>
                       </form>

                </div>
        </div>
</div>

@endsection



@section('tela')
    
<div class="card text-center">
    <div class="card-header">
            <h3 class="titulopacientes">Funcionarios Cadastrados</h3>
    </div>
    <div class="card-body">
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th s>matricula     </th>
                <th >nome            </th>
                <th >cpf             </th>
                <th >identidade      </th>
                <th >Nascimento</th>
                <th >sexo            </th>
                <th >nacionalidade   </th>
                <th >naturalidade    </th>
                <th >escolaridade    </th>
    <!--        <th scope="col">rua             </th>
                <th scope="col">numero          </th>
                <th scope="col">bairro          </th>
                <th scope="col">cep             </th>
                <th scope="col">cidade          </th>
                <th scope="col">estado          </th>
                <th scope="col">telefone        </th>
                <th scope="col">celular         </th>
                <th scope="col">email           </th>-->
                <th >profissao       </th>
                <th >status        </th>   
                <th scope="col">opções</th>
              </tr>
            </thead>
            <tbody>
            @php $cont = 0; @endphp
                @foreach ($Funcionarios as $p)
                       @php $cont = $cont + 1; @endphp
              <tr class="Filter-nome">
                 <td>       {{$p->matricula}}          </td>
  <!--           <td>       {{$p->DataCadastro}}        </td>  -->
                 <td class="info-nome">       {{$p->nome}}                </td>
                 <td>       {{$p->cpf}}                 </td>
                 <td>       {{$p->identidade}}          </td>
                 <td>       {{$p->dataDeNascimento}}    </td>
                 <td>       {{$p->sexo}}                </td>
                 <td>       {{$p->nacionalidade}}       </td>
                 <td>       {{$p->naturalidade}}        </td>
                 <td>       {{$p->escolaridade}}        </td>
    <!--         <td>       {{$p->rua}}                 </td>
                 <td>       {{$p->numero}}              </td>
                 <td>       {{$p->bairro}}              </td>
                 <td>       {{$p->cep}}                 </td>
                 <td>       {{$p->cidade}}              </td>
                 <td>       {{$p->estado}}              </td>
                 <td>       {{$p->telefone}}            </td>
                 <td>       {{$p->celular}}             </td>
                 <td>       {{$p->email}}               </td>-->
                 <td>       {{$p->profissao}}           </td>
                 <td>       {{$p->status}}            </td>  
                <td>
                    <a href="editar/{{$p->matricula}}"><i class="fas fa-edit"></i></a> 
                
                    <a href="excluir/{{$p->matricula}}"><i class="fas fa-trash"></i></a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="card-footer">
             @if($cont==4)
                <p></p>
              @else
                {!!$Funcionarios->links()!!}
            @endif
          </div>
    </div>

</div>
    


    @endsection
    @section('scripts')
    <script type="text/javascript" src="{{ asset('js/filtra.js') }}"></script>
    @endsection
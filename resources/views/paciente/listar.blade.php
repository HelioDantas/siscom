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
                <th s>prontuario      </th>
                <th >nome            </th>
                <th >cpf             </th>
                <th >identidade      </th>
                <th >dataDeNascimento</th>
                <th >sexo            </th>
                <th >etnia           </th>
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
                <th scope="col">email           </th>
                <th scope="col">profissao       </th>
                <th scope="col">status_2        </th>   -->
                <th scope="col">opções    </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $p)
                    
              <tr>
                 <td>       {{$p->id}}          </td>
  <!--           <td>       {{$p->DataCadastro}}        </td>  -->
                 <td>       {{$p->nome}}                </td>
                 <td>       {{$p->cpf}}                 </td>
                 <td>       {{$p->identidade}}          </td>
                 <td>       {{$p->dataDeNascimento}}    </td>
                 <td>       {{$p->sexo}}                </td>
                 <td>       {{$p->etnia}}               </td>
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
                 <td>       {{$p->email}}               </td>
                 <td>       {{$p->profissao}}           </td>
                 <td>       {{$p->status_2}}            </td>  -->
                <td>
                    <a href="pacientes/editar/ {{$p->id}}"><i class="fas fa-edit"></i></a> 
                
                    <a href="pacientes/excluir/ {{$p->id}}"><i class="fas fa-trash"></i></a>
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
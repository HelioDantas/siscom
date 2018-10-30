@extends('layout.app')

@section('estilos')
<style>
.titulopacientes{
    margin:0 auto;
    margin-top:2rem;
    width:80rem;
}
</style>
@endsection

@section('conteudo')
<div class="jumbotron">
TESTANDO: <span style="color:red;">visualização e paginação do dados do paciente</span>
</div>
@endsection


@section('navegação')

        <h4 class="titulopacientes">Pacientes Cadastrados</h4>
@endsection



@section('tela')
    

    
<table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">prontuario      </th>
            <th scope="col">DataCadastro    </th>
            <th scope="col">nome            </th>
            <th scope="col">cpf             </th>
            <th scope="col">identidade      </th>
            <th scope="col">dataDeNascimento</th>
            <th scope="col">sexo            </th>
            <th scope="col">etnia           </th>
            <th scope="col">nacionalidade   </th>
            <th scope="col">naturalidade    </th>
            <th scope="col">escolaridade    </th>
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
             <td>       {{$p->prontuario}}          </td>
             <td>       {{$p->DataCadastro}}        </td>
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
             <td><a href="#"><i class="fas fa-edit"></i></a></td> 
            <td><a href="#"><i class="fas fa-trash"></i></a></td> 

             </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    @endsection
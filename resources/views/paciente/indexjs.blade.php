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
              
                    
              <tr>
                 <td>       gsdfghsdf         </td>
  <!--           <td>      gsdgsdfgs        </td>  -->
                 <td>      gsdgdgsd               </td>
                 <td>       sdgsgdg                </td>
                 <td>      hsght          </td>
                 <td>       \atjt\ea    </td>
                 <td>       j\atej\ng                </td>
                 <td>       \tej\egf               </td>
                 <td>      \htehtfgbf       </td>
                 <td>      h\etfgrt        </td>
                 <td>       \hrnerhrt        </td>
    
                 <td><a href="#"><i class="fas fa-edit"></i></a> 
                    <a href="#"><i class="fas fa-trash"></i></a></td> 
              </tr>
            </tbody>
          </table>

          <div class="card-footer">
           
          </div>
    </div>

</div>
    


    @endsection

    @section('scripts')

<script>
      function carregarPacientes(pagina){
        $.get('paciente.json',{page:pagina }, function(resp){
            console.log(resp);
            });

        $(function(){
            carregarPacientes(1);
        });
    }
    
</script>
    @endsection
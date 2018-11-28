<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<meta http-equiv="refresh" content="5">-->

    <!--<link rel="stylesheet" href="{{ 'css/app.css'}}">
    <link rel="stylesheet" href="{{'css/home.css'}}"> -->

    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
   <link rel="stylesheet" href="{{ URL::to('/css/home.css') }}">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
    integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <title>SisCom</title>
    @yield('estilos')
    <style>
        .corpo{
           margin-top:3rem;
        }
    span{
        text-align: center;
    }

    </style>
</head>
<body>
        <!-- header -->
        <div class="container-fluid agoravai">
            <header style="color:#000000;">
               <div class="agoravai">
                <h2 class="logo"><strong>Siscon</strong></h2>
                <h1>Sistema de Consultorio Medico</h1>

                <span id='real-clock'></span>
                <span><script type="text/javascript" src="{{ asset('js/data.js') }}"></script></span>
                <span style="color:red;">sessao expira em 5 minutos</span>
                <span>mensagem de bem vindo @php echo session("user"); @endphp </span>

                </div>
            </header>
        </div>
        <!-- end header -->

        <!-- menu navbar -->
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
              <ul class="navbar-nav mr-auto col-sm-3 col-md-3">
                <li class="nav-item active">
                  <div class="dropdown">
                    <button class="dropbtn">Cadastro</button>
                    <div class="dropdown-content">
                      <a href="{{route('paciente.novo')}}">Paciente</a>
                      <a href="#">Convenios</a>
                      <a href="#">Medico</a>
                      <a href="{{route('funcionario.novo')}}">Funcionario</a>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Convenios</button>
                    <div class="dropdown-content">
                      <a href="#">Aceitos</a>
                      <a href="#">Consultar</a>
                      <a href="#"></a>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Agenda</button>
                    <div class="dropdown-content">
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Medicos</button>
                    <div class="dropdown-content">
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
            <div class="dropdown">
              <button class="dropbtn">Pacientes</button>
              <div class="dropdown-content">
              <a href="{{route('paciente.listar')}}">lista de pacientes</a>
                <a href="#">Adicionar</a>
                <a href="#">Adicionar</a>
              </div>
            </div>
                    </div>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <a class="btn sair #26a69a" type="button" href = "{{route('login.logout')}}"><strong>Sair</strong></a>

              </form>
            </div>
        </nav>
        <!-- end navbar -->


<div class="jumbotron">
TESTANDO: <span style="color:red;">visualização e paginação do dados do paciente</span>
</div>




<div class="container" style="">
    
<div class="card text-center">
    <div class="card-header">
            <h3 class="titulopacientes">Pacientes Cadastrados</h3>
    </div>
    <div class="card-body" >
            <table class="table table-hover" id="tabelaPacientes">
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
    
                 <td><a href="#"><i class="fas fa-edit"></i></a> 
                    <a href="#"><i class="fas fa-trash"></i></a></td> 
              </tr>
            </tbody>
          </table>

          <div class="card-footer">
                <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li>
                        </ul>
                      </nav>
          </div>
    </div>

</div>
    
</div>


    

      <!--<script src="{{ URL::to('js/app.js') }}"></script>-->
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script  href="{{ asset('js/app.js') }}" type="text/javascript"></script>
      
      <script>
      
      

function montarLinha(paciente) {

   return '<tr>'+
    '<td>' +paciente.id     + '</td>'+
    '<td>'+paciente.nome            +'</td>'+
    '<td>'+paciente.cpf             +'</td>'+
    '<td>'+paciente.identidade      +'</td>'+
    '<td>'+paciente.dataDeNascimento+'</td>'+
'</tr>';
}

function montarTabela(data){
    $("#tabelaPacientes>tbody>tr").remove();
    for(i=0; i<data.data.lenght; i++){
       $("#tabelaPacientes>tbody").append( montarLinha(data.data[i]));
    }
}

function carregarPacientes(pagina){
    $.get('./json',{page:pagina }, function(resp){
        console.log(resp);
        montarTabela(resp);
        });

}
      
$(function(){
    carregarPacientes(1);
});
      
      </script>

     
      <script>
          setInterval(function() {
              clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
          }, 1000);
          var clock = document.getElementById('real-clock');
    </script>
     
  </body>
  </html>
  

   
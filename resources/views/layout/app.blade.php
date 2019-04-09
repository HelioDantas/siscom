<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/css/home.css') }}">
    
    @yield('links')
   <link rel="stylesheet" href="{{ URL::to('https://use.fontawesome.com/releases/v5.4.2/css/all.css') }}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>SisCom</title>
    @yield('estilos')
    <style>
        .corpo{
           margin-top:3rem;
        }
        header > a{
          margin-right:0.5rem;

        }
        header .logo{
            font-size: 20px;
        }
        #containerLogoDataHoraH3{
          padding-top:-0.5rem;
        }
     
         header{
            padding: 10px 2%;
            background-color: white ;
            text-align: center;
        }
         header h4{
            float: left;
        }
        header .logo{
            font-size: 20px;
        }

        .real-clock{
            padding-left : 1%;
        }
        nav span{
            float:right;
            padding-left: 2%;

            
        }
          .sp{
            float:right;
            padding-left: 1.4rem;
        }

    </style>
</head>
<body>
        <!-- header -->

            <header class="teste"> <!-- style="color:#000000;" -->

                    <div class="logo">
                <h4><a class="navbar-brand cor" href="{{route('dashboard')}}">SisCon</a></h4>
            </div>

            <span class = "sp"id="real-clock"></span>

            <span class = "sp"><script type="text/javascript" src="{{ asset('js/data.js') }}"></script></span>


                <div class="container">
                    <h3>Sistema de Consultório médico</h3>

                </div>

            </header>

        <!-- end header -->

        <!-- menu navbar -->
        <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fas fa-align-justify"></i></span>
                      </button>

                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto col-sm-3 col-md-3">
                <li class="nav-item active">
                  <div class="dropdown">
                    <button class="dropbtn">Cadastro</button>
                    <div class="dropdown-content">

                      <a href="{{route('paciente.listar')}}">Paciente</a>

                      <a href="{{route('convenio.listar')}}">Convenios</a>

                      <a href="{{route('funcionario.listar')}}">Funcionario</a>

                      

                    </div>
                  </div>
                </li>
           {{--       <!--
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Convenios</button>
                    <div class="dropdown-content">
                       <a href="{{ route('agenda.index') }}">Agenda</a>
                      <a href="">Pesquisar</a>
                      <a href="{{route('convenio.editar')}}">Alterar</a>
                    </div>
                  </div>
                </li>
           --> --}}
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Agenda</button>
                    
                    <div class="dropdown-content">
                       @if(Auth::user()->funcionario->medico)
                       <a href="{{ route('medico.agenda') }}">Agendar</a
                          
                           @else
                           <a href="{{ route('agenda.index') }}">Agendar</a>
                          @endif
                     
                    </div>
                  </div>
                </li>
            
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Medicos</button>
                    <div class="dropdown-content">
                      <a href="{{ route('medico.RegistrosClinicos') }}" >Registros Clinicos</a>
                    </div>
                  </div>
                </li>
               {{--    
                <!--
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Pacientes</button>
                    <div class="dropdown-content">
                    <a href="{{route('paciente.listar')}}">lista de pacientes</a>
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                    </div>
                  </div>
                </li> 
                 <li class="nav-item">
                  <div class="dropdown">
                    <button class="dropbtn">Funcionarios</button>
                    <div class="dropdown-content">
                    <a href="{{route('funcionario.listar')}}">lista de funcionarios</a>
                      <a href="#">Adicionar</a>
                      <a href="#">Adicionar</a>
                    </div>
                  </div>
                </li>-->--}}

              </ul>
            </div>
              <span class="navbar-text my-2 my-sm-0 pagina" id="msgBemVindo">Bem vindo @php echo session("user")->funcionario->nome; @endphp </span>

                <span class="navbar-text my-2 my-sm-0  pagina" id="sessao" style="color:#000000;"><strong>sessao expira em 5 minutos</strong></span>
              <form class="form-inline my-2 my-lg-0">
                <a class="btn btn-secondary sair "  type="button" href = "{{route('login.logout')}}"><strong>Sair</strong></a>

              </form>

        </nav>
        <!-- end navbar -->




       
        @yield('navegação')

        
        <div class="container col-lg-10" style="">
                   @yield('tela')
            </div>
            <div class="container col-lg-12" style="">
                @yield('telaListarPaciente')
         </div>



    <!--<script src="{{ URL::to('js/app.js') }}"></script>-->

  
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.7.0/d3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/mascara.js') }}"></script>

    
    <script type="text/javascript">
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  </script>

    <script>
		setInterval(function() {
			clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
		}, 1000);
		var clock = document.getElementById('real-clock');
  </script>



   @yield('scripts')
</body>
</html>

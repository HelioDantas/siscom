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
    
   
   <link rel="stylesheet" href="{{ URL::to('/css/login.css') }}"> 
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
    integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <title>SisCom</title>
    
    <style>
        body{
           background-color: #fff !important;
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
                </div>
            </header>
        </div>

    
                
               
       
            <ul class = "navbar-nav ml-auto"> 
                <li class = nav-item dropdown>    
                    <a class = "nav-item"><script type = "text/javascript" src = "js/data.js"></script></a>
                    <a class = "nav-tes real-clock" ><span id="real-clock"></span></a>
                </li>
            </ul>
           
        </nav>

   
        <div class="container login-container">
             <div class="row">
                <div class="col-md-6 offset-md-3 login-form-1">    
                    <h3>SisCon</h3>
                    <center><small style="font-size: 16px;color:#2BBBAD;"><strong>Login de Acesso</strong></small></center>
                    <form action="login.php" method="post">

                        <div class="form-group">
                            <input type="text" name="matricula" class="form-control is-valid"  placeholder="Matricula" value="" />
                        </div>

                        <div class="form-group">
                            <input type="password" name="senha" class="form-control is-valid" require placeholder="Senha" value="" />
                        </div>

                        <div  class="agoravai">
                            <input type="submit" id="btn" class="btnSubmit " value="Login" />
                        </div>
                        </form>
                    
                  <!--    <div class = "col s4 msgErro">
                     <p class = "" > Usuario ou senha invalida</p>
                    </div>   -->
                        <div class="col s4 agoravai">
                            <a href="recuperarSenha/recuperar_senha.php">Esqueceu a senha?</a>
                        </div>
                        <div class="col s4 agoravai">
                            <a href="cadastro/cadastro-form.php"><strong>cadastre-se</strong></a>
                        </div>
            </div>
        </div>
    </div>
   

     <script>
    setInterval(function () {
        clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
    }, 1000);
     var clock = document.getElementById('real-clock');
    </script>
    <!-- <footer >
        <div >© 2018 Copyright:
        <a href="index.php"> SinCon</a>
        </div> 
    </footer>-->
</body>
</html>

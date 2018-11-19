
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login PHP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{'css/login.css'}}">
        <link rel="stylesheet" href="{{'css/app.css'}}">

        <style> a{ color: #2BBBAD;}
        span{
            float:right;
            padding-left: 1rem;
        }
        </style>

    </head>

    <body>

        <header class="teste">
            <div class="logo">
                <h4><a class="navbar-brand" href="{{route('dashboard')}}">SisCon</a></h4>
            </div>

            <span id="real-clock"></span>

            <span><script type="text/javascript" src="js/data.js"></script></span>

                
                <div class="container">
                    <h3>Sistema de Consultorio medico</h3>

                </div>

        </header>


            <div class="container login-container">
                 <div class="row">
                    <div class="col-md-6 offset-md-3 login-form-1">
                        <h3>SisCon</h3>
                        <center><small style="font-size: 16px;color:#2BBBAD;"><strong>Login de Acesso</strong></small></center>
                        {!! Form::open(['route' => 'user.login','method ' => 'post',]) !!} @csrf

                         @if(!empty($mensagem))
                         <p class = "msgErro">  {{$mensagem}} </p>
                          @endif
                            <div class="form-group">
                            <input type="text" name="cpf" class="form-control"  placeholder="cpf" value="" />
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control is-valid" require placeholder="Senha" value="" />
                            </div>

                            <div  class="agoravai">
                                <input type="submit" id="btn" class="btnSubmit " value="Login" />
                            </div>
                            {!! Form::close() !!}

                            <div class="col s4 agoravai">
                                <a href="{{route('recovery_senha')}}">Esqueceu a senha?</a>
                            </div>
                            
                </div>
            </div>
        </div>


 <script>
		setInterval(function() {
			clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
		}, 1000);
		var clock = document.getElementById('real-clock');
  </script>

    </body>
    </html>

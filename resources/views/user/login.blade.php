
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login PHP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{'css/login.css'}}">
        <link rel="stylesheet" href="{{'css/app.css'}}">

        <style> a{ color: black;}
        span{
            float:right;
            padding-left: 1rem;
        }
        </style>

    </head>

    <body>

        <header class="teste">
            <div class="logo sp">
                <h4><a class="navbar-brand sp " href="{{route('dashboard')}}">SisCon</a></h4>
            </div>

            <span class = "sp" id="real-clock"></span>

            <span class = "sp"><script type="text/javascript" src="js/data.js"></script></span>


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


                          @if (session('mensagem'))
                           <p class = "msgErro">   {{ session('mensagem') }} </p>
                              @endif
                            <div class="form-group">
                            <input type="text" id = "cpf" name="cpf" class="form-control"  placeholder="cpf" value="" />
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control is-valid" require placeholder="Senha" value="" maxlength = 30 />
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
    <script  href="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
 <script>
		setInterval(function() {
			clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
		}, 1000);
		var clock = document.getElementById('real-clock');
  </script>
<script>
    jQuery(function($){

    $("#cpf").mask("999.999.999-99");


    });
</script>
    </body>
    </html>


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
        }
        </style>

    </head>

    <body>

        <header class="teste">
            <div class="logo">
                <h4><a class="navbar-brand" href="{{route('dashboard')}}">SisCon</a></h4>
            </div>
            <span><script type="text/javascript" src="js/data.js"></script></span>
                <span id="real-clock"></span>
                <div class="container">
                    <h3>Sistema de Consultorio medico</h3>

                </div>

        </header>


            <div class="container login-container">
            
                <div class="container tttt">
                    <div class="row " style="padding:-20%;">
                        <div class="col-lg-6 offset-md-3 login-form-1">
                            <h3>SisCon</h3>
                            <center>
                                <small style="font-size: 16px;">Recuperar Senha</small>
                            </center>
                            <form action="recovery_senha.php" method="post">
                
                                <div class="form-group">
                                    <input type="Email" name="rep_email" class="form-control is-valid" placeholder="Email" value="" />
                                </div>
                
                                <div class="agoravai">
                                    <input type="submit" id="btn" class="btnSubmit" value="enviar" />
                                </div>
                            </form>
                            <a href="../index.php"> voltar </a>
                        </div>

            </div>
        </div>

    </body>
    </html>






























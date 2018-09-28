<?php
require_once('session.php');

if (obterSessao('usuario_matricula') !== null)
{
    header("Location: sistema.php");  
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <style type="text/css"> 
    body{
    background-image: radial-gradient(#6db3ff,#2f8cef)
    }
    </style>
</head>
<body>
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 offset-md-3 login-form-1">
            <h3>SisCon</h3>
            <center><small style="font-size: 16px;">Login de Acesso</small></center>
            <form action="login.php" method="post">
                <div class="form-group">
                    <input type="text" name="matricula" class="form-control" placeholder="Matricula" value="" />
                </div>
                <div class="form-group">
                    <input type="password" name="senha" class="form-control" placeholder="Senha" value="" />
                </div>
                <div  class="agoraVai">
                    <input type="submit" id="btn" class="btnSubmit" value="Login" />
                </div>
            </form>
                <div class="col s4">
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <div class="col s4">
                    <a href="cadastro-form.php"><strong>cadastre-se</strong></a>
                </div>
        </div>
    </div>
</div>
</body>
</html>

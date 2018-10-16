<?php
session_start();
require_once('session.php');


if (obterSessao('usuario_matricula') === null || !isset($_COOKIE["usuario_logado"])){
    excluirSessao('usuario_matricula');
    setcookie("usuario_logado");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/estilo.css">
    <link rel="stylesheet"  href="css/bootstrap.css" />
    
    <style> p{color:white; } span{color :black } a {padding-left : 0%}</style>    
    
    <style> a{ color: #2BBBAD;}</style>
    

    <title>Sistema Siscon</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><h2>SisCon</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
         
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
           
            <div class = "container">
                 
             <div id="navbarTogglerDemo01">
                  <ul class="nav justify-content-center">
            
                    <li class="nav-item ">
                        <a class="nav-link" href="#"><h3>Sistema de consultorio Medico </h3> </a>
                    </li>
                
                    </ul>
                
                </div>         
             </div>
                
              
                
                    <a class = "nav-item">  Seja bem vindo<strong> <?php echo $_SESSION["nome"] ?></strong></a>
                    <a class = "nav-item"><script type = "text/javascript" src = "js/data.js"></script></a>
                    <a class = "nav-tes" ><span id="real-clock"></span></a>
                    <a class = "nav-link" href="sair.php">Sair</a>
            </div>
          </nav>


<script src="js/bootstrap.min.js"></script>

  <script>
    setInterval(function () {
        clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
    }, 1000);
     var clock = document.getElementById('real-clock');
    </script>
</body>
</html>
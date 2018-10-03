<?php
session_start();
require_once('session.php');


if (obterSessao('usuario_matricula') === null) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="css/bootstrap.css" />
    <style>
    p{
        color:white;
    }
    </style>
    <title>Sistema</title>
</head>
<body>
    <nav class = "navbar navbar-dark bg-dark">
     <p  class = "nav-item">Sistema, página protegida.</p>
     <p class = "nav-item">  Seja bem vindo<strong> <?php echo $_SESSION["nome"] ?></strong></p>
     <a href="">
<p><script language"javascript">

var now = new Date();
var mName = now.getMonth() +1 ;
var dayNr = now.getDate();
var yearNr=now.getYear();
if(mName==1){Month = "Janeiro";}
if(mName==2){Month = "Fevereiro";}
if(mName==3){Month = "Março";}
if(mName==4){Month = "Abril";}
if(mName==5){Month = "Maio";}
if(mName==6){Month = "Junho";}
if(mName==7){Month = "Julho";}
if(mName==8){Month = "Agosto";}
if(mName==9){Month = "Setembro";}
if(mName==10){Month = "Outubro";}
if(mName==11){Month = "Novembro";}
if(mName==12){Month = "Dezembro";}
if(yearNr < 2000) {Year = 1900 + yearNr;}
else {Year = yearNr;}
var todaysDate =(dayNr + " " + Month + " " + Year);

 var time = now.getHours();    
 
 /// cookie-sessao

document.write('  '+todaysDate);
</script></p>


     <a class = "nav-link" href="sair.php">Sair</a>
    </nav>

    
    

<script src="js/bootstrap.min.js"></script>
</body>
</html>
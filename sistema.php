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
	<link rel="stylesheet" href="css/bootstrap.css" />
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	 crossorigin="anonymous"></script>

	<style>
		p {
			color: white;
		}

		span {
			color: black
		}
	</style>

	<title>Sistema Siscon</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">
			<h2>SisCon</h2>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo02"
		 aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">

			<div class="container">


				<ul class="nav justify-content-center">

					<li class="nav-item ">
						<a class="nav-link" href="#">
							<h2 class = "b">Sistema de consultorio Medico </h2>
						</a>
					</li>

				</ul>

			</div>
			<a class="nav-item layat"> Seja bem vindo
				<strong>
					<?php echo $_SESSION["nome"] ?>
				</strong>
			</a>
			<a class="nav-item layat">
				<script type="text/javascript" src="js/data.js"></script>
			</a>
			<a class="nav-tes layat">
				<span id="real-clock"></span>
			</a>
			<a class="nav-link layat" href="sair.php">Sair</a>
		</div>
	</nav>
	<ul class="nav nav-tabs white">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle a" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastro</a>
			<div class="dropdown-menu">
				<a class="dropdown-item a" href="#">Pacientes</a>
				<a class="dropdown-item a" href="#">Funcionários</a>
				<a class="dropdown-item a" href="#">Convênios</a>
				<a class="dropdown-item a" href="#">Procedimentos</a>
				<a class="dropdown-item a" href="#">Laboratórios</a>
		</li>

		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle a" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Agenda</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Pacientes</a>
				<a class="dropdown-item" href="#">Eventos</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle a" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Registro Clínico</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle a" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Relatórios</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Valores</a>
				<a class="dropdown-item" href="#">Convênios</a>
				<a class="dropdown-item" href="#">Eventos</a>
		</li>
	</ul>


	<script src="js/bootstrap.min.js"></script>

	<script>
		setInterval(function() {
			clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
		}, 1000);
		var clock = document.getElementById('real-clock');
	</script>
</body>

</html>
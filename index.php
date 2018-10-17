<?php
require_once('session.php');

if (obterSessao('usuario_matricula') !== null && isset($_COOKIE["usuario_logado"])) {
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
	<link rel="stylesheet" href="css/bootstrap.css" />
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/css/estilo.css">



</head>

<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light">

		<a class="navbar-brand" href="index.php">
			<h2>SisCon</h2>
		</a>
		<div class="container">

			<div id="navbarTogglerDemo01">
				<ul class="nav justify-content-center">

					<li class="nav-item ">
						<a class="nav-link" href="#">
							<h2 class = "b">Sistema de consultorio Médico </h2>
						</a>
					</li>

				</ul>

			</div>
		</div>



		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a class="nav-item">
					<script type="text/javascript" src="js/data.js"></script>
				</a>
				<a class="nav-tes real-clock">
					<span id="real-clock"></span>
				</a>
			</li>
		</ul>

	</nav>


	<div class="container login-container">
		<div class="row">
			<div class="col-md-6 offset-md-3 login-form-1">
				<h3>SisCon</h3>
				<center>
					<small style="font-size: 16px;color:#2BBBAD;">
						<strong>Login de Acesso</strong>
					</small>
				</center>
				<form action="login.php" method="post">

					<div class="form-group">
						<input type="text" name="matricula" class="form-control is-valid" placeholder="Matricula" value="" />
					</div>

					<div class="form-group">
						<input type="password" name="senha" class="form-control is-valid" require placeholder="Senha" value="" />
					</div>

					<div class="agoravai">
						<input type="submit" id="btn" class="btnSubmit " value="Login" />
					</div>
				</form>
				<?php
                    if (isset($_GET["login"]) && $_GET["login"] == 0) { ?>
				<div class="col s4 msgErro">
					<p class=""> Usuario ou senha invalida</p>
				</div>
				<?php  } ?>
				<div class="col s4 agoravai">
					<a href="recuperarSenha/recuperar_senha.php">Esqueceu a senha?</a>
				</div>
				<div class="col s4 agoravai">
					<a href="cadastro/cadastro-form.php">
						<strong>cadastre-se</strong>
					</a>
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
	<!-- <footer >
        <div >© 2018 Copyright:
        <a href="index.php"> SinCon</a>
        </div> 
    </footer>-->

  <div class="foot">
	<i>
		<div align="center">&copy SisCon - Todos os direitos reservados     
			</div>
		</i>
	</div>

</body>

</html>
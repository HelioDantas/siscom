<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>recuperar senha</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.css" />
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/estilo.css">

</head>

<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light">

		<a class="navbar-brand" href="../index.php">
			<h2>SisCon</h2>
		</a>
		<div class="container">

			<div id="navbarTogglerDemo01">
				<ul class="nav justify-content-center">

					<li class="nav-item ">
						<a class="nav-link" href="#">
							<h3>Sistema de consultorio Medico </h3>
						</a>
					</li>

				</ul>

			</div>
		</div>



		<ul class="navbar-nav ml-auto">
			<li class=n av-item dropdown>
				<a class="nav-item">
					<script type="text/javascript" src="js/data.js"></script>
				</a>
				<a class="nav-tes real-clock">
					<span id="real-clock"></span>
				</a>
			</li>
		</ul>

	</nav>

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

			<script>
				setInterval(function() {
					clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
				}, 1000);
				var clock = document.getElementById('real-clock');
			</script>
</body>

</html>
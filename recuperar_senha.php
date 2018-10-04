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

	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-md-3 login-form-1">
				<h3>SisCon</h3>
				<center>
					<small style="font-size: 16px;">Recuperar Senha</small>
				</center>
				<form action="recovery_senha.php" method="post">

					<div class="form-group">
						<input type="Email" name="rep_email" class="form-control is-valid" placeholder="Email" value="" />
					</div>

					<div class="form-group">
						<input type="password" name="senha" class="form-control is-valid" require placeholder="Senha" value="" />
					</div>

					<div class="agoravai">
						<input type="submit" id="btn" class="btnSubmit" value="Login" />
					</div>
				</form>
			</div>


</body>

</html>
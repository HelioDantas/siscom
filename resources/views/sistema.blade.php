<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
---- Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap template site</title>
	<link rel="stylesheet" href="css/style.css">
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <link rel="stylesheet" href="/css/app.css"> 
    <link rel="stylesheet" href="/css/home.css"> 
</head>
<body>
    <!-- header -->
    <div class="container-fluid header">
        <header>
            <h5>Siscon</h5>
            <h1>Sistema de Consultorio Medico</h1>
            <span>data</span>
            <span>hora</span>
            <span style="color:red;">sessao expira em 5 minutos</span>
            <span>mensagem de bem vindo </span>
		</header>
    </div>
    <!-- end header -->


    <!-- menu navbar -->
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto col-sm-3 col-md-3">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Convenios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Agenda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Medicos</a>
            </li>
			<li class="nav-item">
				<div class="dropdown show">
				  <a class="btn nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					cadastro
				  </a>

				  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					<a class="dropdown-item" href="#">Pacientes</a>
					<a class="dropdown-item" href="#">Convenios</a>
					<a class="dropdown-item" href="#">Funcionarios</a>
				  </div>
				</div>
			</li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-secondary my-2 my-sm-0 blue" type="button" data-toggle="modal" data-target="#loginModal">Sair</button>
          </form>
        </div>
    </nav>
    <!-- end navbar -->



    <!-- login modal-->
    <div class="modal" id="loginModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Sair</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
              <form class="form-signin">
          
                <div class="form-label-group">
                    <label for="inputEmail">Email address</label>
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                </div>
          
                <div class="form-label-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
          
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted text-center">© 2018-2019</p>
              </form>
          
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    <!-- end login modal-->

    <!-- content -->

    <div class="container-fluid">
        <div class="content row">
			<div class="col-md-2">left sidebar</div>
			<div class="col-md-8 text-center">content</div>
			<div class="col-md-2">Right Sidebar</div>
			
        </div>
    </div>

	<footer>© 2018-2019</footer>
  <!-- this template is made by silvan paul -->
  <script src="/js/app.js"></script>
</body>
</html>
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
    <style>
      .dropbtn {
          background-color: #4CAF50;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
          
      }
      
      .dropdown {
          position: relative;
          display: inline-block;
      }
      
      .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
          text-align: center;
      }
      
      .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;

      }
      
      .dropdown-content a:hover {background-color: #ddd;}
      
      .dropdown:hover .dropdown-content {display: block;}
      
      .dropdown:hover .dropbtn {background-color: #3e8e41;}
      nav{
       background-color:  #4CAF50;
      }
      ul li{
        text-align: center;
      }
      
      </style>
</head>
<body>
    <!-- header -->
    <div class="container-fluid header">
        <header>
            <h5>Siscon</h5>
            <h1>Sistema de Consultorio Medico</h1>
            <span>data</span>
            <span id="real-clock"></span>
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
              <div class="dropdown">
                <button class="dropbtn">Cadastro</button>
                <div class="dropdown-content">
                  <a href="#">Paciente</a>
                  <a href="#">Convenios</a>
                  <a href="#">Medico</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <button class="dropbtn">Convenios</button>
                <div class="dropdown-content">
                  <a href="#">Aceitos</a>
                  <a href="#">Consultar</a>
                  <a href="#"></a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <button class="dropbtn">Agenda</button>
                <div class="dropdown-content">
                  <a href="#">Adicionar</a>
                  <a href="#">Adicionar</a>
                  <a href="#">Adicionar</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <button class="dropbtn">Medicos</button>
                <div class="dropdown-content">
                  <a href="#">Adicionar</a>
                  <a href="#">Adicionar</a>
                  <a href="#">Adicionar</a>
                </div>
              </div>
            </li>
			<li class="nav-item">
        <div class="dropdown">
          <button class="dropbtn">Pacientes</button>
          <div class="dropdown-content">
            <a href="#">Adicionar</a>
            <a href="#">Adicionar</a>
            <a href="#">Adicionar</a>
          </div>
        </div>
				</div>
			</li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-secondary my-2 my-sm-0 dodgerblue" type="button" data-toggle="modal" data-target="#loginModal">Sair</button>
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
  
  <script>
		setInterval(function() {
			clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
		}, 1000);
		var clock = document.getElementById('real-clock');
	</script>
  
  <script>
  $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
  </script>
</body>
</html>
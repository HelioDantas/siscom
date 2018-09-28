<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
<body>
    
    <div class="container login-container">
        <div class="row">
        <div class=" col-md-6 offset-md-3 login-form-1">
            <form action="criar_usuario_post.php" method="post">
                <div>
                    <label>Nome:</label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div>
                    <label>matricula:</label>
                    <input type="text" name="matricula" id="matricula">
                </div>
                <div>
                    <label>Senha:</label>
                    <input type="password" name="senha" id="senha">
                </div>           

                <input type="submit" value="salvar" />
                </div>
            </form>


        </div>
    </div>


</body>
</html>
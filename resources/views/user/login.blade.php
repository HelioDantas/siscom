<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>
<body>

        <div class="container">
            <div class="row">
                {!! Form::open(['route' => 'user.login','method ' => 'post',]) !!}} @csrf
                <div class="col s12 cm-6">
                    <label for="Cpf"> Cpf</label>
                    <input type="text" id="Cf" name="cpf">
                </div>
                <div class="col s12 cm-6">
                    <label for="senha"> senha</label>
                    <input type="password" id="senha" name="senha">
                </div>
                <input type="submit" value="entrar" >
                {!! Form::close() !!}}
            </div>
        </div>
</body>
</html>
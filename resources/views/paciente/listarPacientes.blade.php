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
    
    <table class="table table-responsive md-auto">
        <thead >
            <tr>
                <th>nome</th>
                <th>cpf</th>
                <th>convenio</th>
                <th>status</th>
            </tr>
            </thead>
            <tbody>
                    @foreach ($pacientes as $p )
                <tr>
                    <td scope="row">{{ $p->nome }}</td>
                    <td>{{ $p->cpf }}</td>
                    <td>{{ $p->convenio }}</td>
                    <td>{{ $p->status }}</td>
                </tr>
                
                @endforeach
            </tbody>
    </table>

</body>
</html>
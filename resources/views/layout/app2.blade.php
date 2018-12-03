<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<meta http-equiv="refresh" content="5">-->

    <!--<link rel="stylesheet" href="{{ 'css/app.css'}}">
    <link rel="stylesheet" href="{{'css/home.css'}}"> -->


     <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/css/home.css') }}">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
    integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    <title>SisCom</title>
    @yield('estilos')
    <style>
        .corpo{
           margin-top:3rem;
        }
        span{
          margin-right:1rem;

        }

    </style>
</head>
<body>
        <!-- header -->
        <div class="container-fluid agoravai">
            </header>
           
            </header>
        </div>
        <!-- end header -->

        <!-- menu navbar -->
    
        <!-- end navbar -->




        @yield('conteudo')
        @yield('navegação')
        <div class="container" style="">
                   @yield('tela')
            </div>




            <script  href="{{ asset('js/app.js') }}" type="text/javascript"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
             <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script type="text/javascript" src="{{ asset('js/mascara.js') }}"></script>
        
            <script>
            setInterval(function() {
              clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));
            }, 1000);
            var clock = document.getElementById('real-clock');
          </script>
        
        
        
           @yield('scripts')
        </body>
        </html>
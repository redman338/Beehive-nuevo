<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="keywords" content="{{ $landing->name_copropiedad }}"/>
        <meta name="title" content="{{ $landing->name_copropiedad }}" />
        <!-- Bootstrap CSS -->
        <link rel="icon" type="image/png" href="{{url('landing/media/img/Logo_Beehive.png')}}" />
        <link rel="stylesheet" href="{{url('landing/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{url('landing/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{url('landing/css/home.css')}}">
        <link rel="stylesheet" href="{{url('landing/css/margenes.css')}}">

        <title>{{ $landing->name_copropiedad }}</title>

    </head>
    <body>


             @yield('content')
       
       

        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>
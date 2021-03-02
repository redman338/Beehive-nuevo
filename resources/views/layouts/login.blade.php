<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{url('login/css/materialize.css')}}"  media="screen,projection"/>
       
        <link type="text/css" rel="stylesheet" href="{{url('login/css/logins.css')}}"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    
    <body>

       @yield('content')


        <!--Import jQuery before materialize.js-->
        <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
        <script type="text/javascript" src="{{url('login/js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{url('login/js/materialize.js')}}"></script>
        
    </body>
</html>
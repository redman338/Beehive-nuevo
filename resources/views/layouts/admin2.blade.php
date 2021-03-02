<!DOCTYPE html>
<html lang="en">

<head>
    <title>Beehive</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
   
    <!-- Favicon icon -->
   <!--  <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon"> -->
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/bootstrap.min.css')}}">
    <!-- Style.css -->
     <link rel="stylesheet" type="text/css" href="{{url('admin/css/style.css')}}">

     <link rel="stylesheet" type="text/css" href="{{url('admin/css/main.css')}}">

    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{url('admin/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{url('admin/icon/icofont/css/icofont.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{url('admin/icon/feather/css/feather.css')}}">

     <link rel="stylesheet" type="text/css" href="{{url('admin/icon/font-awesome/css/font-awesome.min.css')}}">
   

    <link rel="stylesheet" type="text/css" href="{{url('admin/css/jquery.mCustomScrollbar.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('admin/css/toastr.min.css')}}">
   
    <!-- <link rel="stylesheet" href="..\files\assets\scss\partials\menu\_pcmenu.htm"> -->
</head>

<body>
<!-- Pre-loader start -->
@include('partials.loader')
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="{{url('dashboard')}}">
                       <div class="logoadmin" >
                             <img class="img-fluid" src="{{url('login2/media/img/Logo_Completo_Beehive2.png')}}" alt="Theme-Logo">
                       </div>
                      
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                  <!--   <span class="badge bg-c-pink">5</span> -->
                                </div>
                             
                            </div>
                        </li>
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-message-square"></i>
                                    <!-- <span class="badge bg-c-green">3</span> -->
                                </div>
                            </div>
                        </li>
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- <img src="{{url('admin/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image"> -->

                                  
                                    <span>{{ Auth::user()->name}}</span>

                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                   
                               
                                    <li>
                                        <a href="{{url('dashboard/cambiar')}}">
                                            
                                            <i class="feather icon-settings"></i> Cambiar Perfil
                                        </a>
                                    </li>

                              
                                   <!--  <li>
                                        <a href="user-profile.htm">
                                            <i class="feather icon-user"></i>Mi Perfil
                                        </a>
                                    </li> -->
                                  
                                    
                                    <li>
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      
                                            <i class="feather icon-log-out"></i> Cerrar Sesion
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                         </form>           

                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar chat start -->
        <div id="sidebar" class="users p-chat-user showChat">
            <div class="had-container">
                <div class="card card_main p-fixed users-main">
                    <div class="user-box">
                        <div class="chat-inner-header">
                            <div class="back_chatBox">
                                <div class="right-icon-control">
                                    <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                    <div class="form-icon">
                                        <i class="icofont icofont-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-friend-list">
                           
                          
                           
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar inner chat start-->
    
        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigatio-lavel">
                        {{ Session::get('copropiedad_name') }}

                        </div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="{{url('dashboard')}}">
                                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                    <span class="pcoded-mtext">Dashboard</span>
                                </a>
                             
                            </li>
                            <li class="pcoded-hasmenu">
                                
                           
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                    <span class="pcoded-mtext">Mi Registro</span>
                                    <!-- <span class="pcoded-badge label label-warning">NEW</span> -->
                                </a>
                           
                                <ul class="pcoded-submenu">

                                @can('copropiedad-index') 
                                    <li class=" pcoded-hasmenu">
                                        <a href="{{route('copropiedad.index')}}">
                                            <span class="pcoded-mtext">Gestion de Clientes</span>
                                        </a>    
                                    </li>
                                @endcan

                                @can('micopropiedad-index') 
                                    <li class=" pcoded-hasmenu">
                                        <a href="{{route('micopropiedad.index')}}">
                                            <span class="pcoded-mtext">Mi Copropiedad</span>
                                        </a>    
                                    </li>
                                @endcan
                            
                                @can('inmueble-index') 
                                    <li class=" pcoded-hasmenu">
                                        <a href="{{route('inmueble.index')}}">
                                            <span class="pcoded-mtext">Gestion de Inmuebles</span>
                                        </a>
                                     
                                    </li>
                                @endcan   


                               
                                </ul>
                            </li>

                             @can('zonascomunes-index') 
                                    <li class=" pcoded-hasmenu">
                                        <a href="{{route('zonascomunes.index')}}">
                                          <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                       <span class="pcoded-mtext">Zonas Comunes</span>
                                        </a>
                                     
                                    </li>

                             @endcan
                             @can('tablasmaestras') 
                                <li class="pcoded-hasmenu">
                                     <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Ingresos</span>
                                    </a>
                                  <ul class="pcoded-submenu">
                                      
                                       <li class=" pcoded-hasmenu">
                                            <a href="{{route('obligaciones.index')}}">
                                                <span class="pcoded-mtext">Gestion de Obligaciones</span>
                                            </a>    
                                        </li>
                                  
                                                                        

                                  </ul>
                                </li>
                            @endcan
                          
                        </ul>
                        <div class="pcoded-navigatio-lavel">Configuracion</div>
                        <ul class="pcoded-item pcoded-left-item">
                            
                            @can('userdetails-index') 
                            <li class="pcoded-hasmenu">

                                <a href="{{ route('userdetails.index')}}">
                                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                    <span class="pcoded-mtext">Usuarios</span>
                                </a>
                              
                            </li>
                            
                            @endcan

                            @can('tablasmaestras') 
                                <li class="pcoded-hasmenu">
                                    <a href="{{url('tablasmaestras')}}">
                                        <span class="pcoded-micon"><i class="feather icon-sliders"></i></span>
                                        <span class="pcoded-mtext">Tablas Maestras</span>
                                    </a>
                                  
                                </li>
                            @endcan
                            
                        </ul>
            
                       
                     
                    </div>
                </nav>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">

                         <div class="col-md-12">
                            @include('partials.alerts')
                          </div>
                        <!-- Main-body start -->
                        @yield('content')
                        <!-- <div id="styleSelector">

                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{url('admin/js/bower_components/jquery/js/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{url('admin/js/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>

<script type="text/javascript" src="{{url('admin/js/bower_components/popper.js/js/popper.min.js')}}"></script>

<script type="text/javascript" src="{{url('admin/js/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->

<script type="text/javascript" src="{{url('admin/js/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

<!-- modernizr js -->
<!-- <script type="text/javascript" src="{{url('admin/js/bower_components/modernizr/js/modernizr.js')}}"></script> -->

<!-- <script type="text/javascript" src="{{url('admin/js/bower_components/modernizr/js/css-scrollbars.js')}}"></script> -->

<!-- i18next.min.js -->
<!-- <script type="text/javascript" src="{{url('admin/js/bower_components/i18next/js/i18next.min.js')}}"></script> -->

<!-- <script type="text/javascript" src="{{url('admin/js/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>

<script type="text/javascript" src="{{url('admin/js/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script> -->

<!-- <script type="text/javascript" src="{{url('admin/js/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
 -->
<script src="{{url('admin/js/pcoded.min.js')}}"></script>
<script src="{{url('admin/js/vartical-layout.min.js')}}"></script>
<script src="{{url('admin/js/jquery.mCustomScrollbar.concat.js')}}"></script>
  
<script type="text/javascript" src="{{url('admin/js/script.js')}}"></script> 

<script type="text/javascript" src="{{url('admin/js/toastr.min.js')}}"></script>     

       @yield('scripts')

<!-- <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script> -->
</body>

</html>

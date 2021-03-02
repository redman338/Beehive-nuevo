<!DOCTYPE html>
<html lang="en">

<head>
    <title>Beehive</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   

    <!-- Favicon icon -->
    <link rel="icon" href="..\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
   
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/bootstrap.min.css')}}">

     <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{url('admin/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{url('admin/icon/icofont/css/icofont.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{url('admin/icon/feather/css/feather.css')}}">

   <link rel="stylesheet" type="text/css" href="{{url('admin/icon/font-awesome/css/font-awesome.min.css')}}">
   
   <!-- Style.css -->
     <link rel="stylesheet" type="text/css" href="{{url('admin/css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('admin/css/jquery.mCustomScrollbar.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('admin/css/pcoded-horizontal.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('admin/css/main.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/toastr.min.css')}}">
    
     @yield('css')
</head>
<!-- Menu horizontal fixed layout -->

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">

        <div class="pcoded-container">
            <!-- Menu header start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                       <a href="{{url('dashboard')}}">
                           <div class="logoadmin2">
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
                                       <!--  <span class="badge bg-c-pink"></span> -->
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                    <!--     <li>
                                            <div class="media">
                                               
                                                <div class="media-body">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li> -->
                                      
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-message-square"></i>
                                       <!--  <span class="badge bg-c-green">3</span> -->
                                    </div>
                                </div>
                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                       
                                        <span>{{ Auth::user()->name}}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Configuracion
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.htm">
                                                <i class="feather icon-user"></i> Perfil
                                            </a>
                                        </li>
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
            <!-- Menu header end -->
            <div class="pcoded-main-container">
                <nav class="pcoded-navbar">
                    <div class="pcoded-inner-navbar">
                        <ul class="pcoded-item pcoded-left-item">
                            
                           
                             


                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-map"></i></span>
                                    <span class="pcoded-mtext">Mi Registro</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                     
                                     @can('copropiedad-index') 
                                      <li class="">
                                          <a href="{{route('copropiedad.index')}}"> 
                                            <span class="pcoded-micon"><i class="ti-reload rotate-refresh"></i></span>
                                              <span class="pcoded-mtext">Gestion de Clientes</span>
                                              
                                          </a>    
                                      </li>

                                      
                                    @endcan

                                    @can('micopropiedad-index') 
                                    <li class="">
                                        <a href="{{route('micopropiedad.index')}}">
                                            <span class="pcoded-mtext">Mi Copropiedad</span>
                                        </a>    
                                    </li>
                                    @endcan

                                    @can('inmueble-index') 
                                    <li class="">
                                        <a href="{{route('inmueble.index')}}">
                                            <span class="pcoded-mtext">Gestion de Inmuebles</span>
                                        </a>
                                     
                                    </li>
                                    @endcan  

                                     @can('zonascomunes-index') 
                                    <li class="">
                                        <a href="{{route('zonascomunes.index')}}">
                                          <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                       <span class="pcoded-mtext">Zonas Comunes</span>
                                        </a>
                                     
                                    </li>

                                    @endcan
                                 
                                   
                                  
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                                    <span class="pcoded-mtext">Configuracion</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    @can('userdetails-index') 
                                    <li class="">
                                        <a href="{{ route('userdetails.index')}}">
                                          <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                          <span class="pcoded-mtext">Usuarios</span>
                                      </a>

                                        
                                    </li>

                                   @endcan

                                     @can('tablasmaestras') 

                                      <li class="">
                                          <a href="{{url('tablasmaestras')}}">
                                              <span class="pcoded-micon"><i class="feather icon-sliders"></i></span>
                                              <span class="pcoded-mtext">Tablas Maestras</span>
                                          </a>
                                        
                                      </li>
                                @endcan
                                                                      
                                
                                   
                                </ul>
                            </li>
                           
                         
                            
                           <!--  <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
                                    <span class="pcoded-mtext">Other</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)" data-i18n="nav.menu-levels.main">
                                            <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                            <span class="pcoded-mtext">Menu Levels</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="javascript:void(0)" data-i18n="nav.menu-levels.menu-level-21">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Menu Level 2.1</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)" data-i18n="nav.menu-levels.menu-level-22.main">
                                                    <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                                    <span class="pcoded-mtext">Menu Level 2.2</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                             
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)" data-i18n="nav.menu-levels.menu-level-23">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext">Menu Level 2.3</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                  
                                    
                                   
                                </ul>
                            </li> -->
                        </ul>
                    </div>
                </nav>
                  
                
                <div class="pcoded-wrapper">
                  <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                      <div class="main-body">
                         <div class="col-md-12  m-t-50">
                            @include('partials.alerts')
                          </div>                   
                          <!-- Main-body start -->
                          @yield('content')
                          
                          <!-- Main-body start -->
                      </div>                      
                    </div>
                  </div>
                </div>
          
            
            </div>
        </div>
    </div>


<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{url('admin/js/bower_components/jquery/js/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{url('admin/js/bower_components/jquery-ui/js/jquery-ui.js')}}"></script>

 <script type="text/javascript" src="{{url('admin/js/bower_components/popper.js/js/popper.min.js')}}"></script>

 <script type="text/javascript" src="{{url('admin/js/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->

<script type="text/javascript" src="{{url('admin/js/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    

   <!--  <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script> -->
 <!--    <script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script> -->

    <!-- Syntax highlighter prism js -->
 <!--    <script type="text/javascript" src="..\files\assets\pages\prism\custom-prism.js"></script> -->
    <!-- i18next.min.js -->
    <!-- <script type="text/javascript" src="..\files\bower_components\i18next\js\i18next.min.js"></script> -->
   <!--  <script type="text/javascript" src="..\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script> -->
    <!-- <script type="text/javascript" src="..\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script> -->
    <script type="text/javascript" src="{{url('admin/js/jquery.validate.js')}}"></script>
    <!-- Custom js --> -->
    <script src="{{url('admin/js/pcoded2.min.js')}}"></script>
    <script src="{{url('admin/js/menu/menu-hori-fixed.js')}}"></script>
    <script src="{{url('admin/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{url('admin/js/script.js')}}"></script>
    <script type="text/javascript" src="{{url('admin/js/toastr.min.js')}}"></script>  
    
     @yield('scripts')
</body>

</html>

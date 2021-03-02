@extends('layouts.beehive')


@section('content')

<div class="main-body">
  <div class="page-wrapper">
      <!-- Page-header start -->
     <div class="page-header m-t-50">
          <div class="row align-items-end">
              <div class="col-lg-8">
                  <div class="page-header-title">
                      <div class="d-inline">
                          <h4>Dashboard</h4>
                          <span></span>
                      </div>
                  </div>
              </div>
              
              <div class="col-lg-4">
                  <div class="page-header-breadcrumb">
                      <ul class="breadcrumb-title">
                          <li class="breadcrumb-item">
                              <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                          </li>
                          <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a> </li>
                      </ul>
                  </div>
              </div>
            </div>
        </div>
        <!-- Page-header end -->

        <div class="page-body">
            <div class="row menu-admin">
              
             @can('inmueble-index') 
              <div class="col-lg-2 col-md-2">
                <a href="{{route('inmueble.index')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-hotel.png')}}">
                    <p class="title_icon">Inmuebles</p>
                  </div>
                </a>            
              </div>
            @endcan

              @can('zonascomunes-index') 
              <div class="col-lg-2 col-md-2">
                <a href="{{route('zonascomunes.index')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-piscina.png')}}">
                    <p class="title_icon">Zonas Comunes</p>
                  </div>
                </a>            
              </div>
            @endcan

            @can('zonascomunes-index') 
              <div class="col-lg-2 col-md-2">
                <a href="{{route('reservas.index')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-calendario-1.png')}}">
                    <p class="title_icon">Reservas</p>
                  </div>
                </a>            
              </div>
            @endcan

             @can('userdetails-index') 
              <div class="col-lg-2 col-md-2">
                <a href="{{ route('userdetails.index')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-usuarios.png')}}">
                    <p class="title_icon">Usuarios</p>
                  </div>
                </a>            
              </div>
            @endcan


            @can('tablasmaestras') 
              <div class="col-lg-2 col-md-2">
                <a href="{{url('tablasmaestras')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-inventario.png')}}">
                    <p class="title_icon">Tablas Maestras</p>
                  </div>
                </a>            
              </div>
            @endcan

              @can('userdetails-index') 
              <div class="col-lg-2 col-md-2">
                <a href="{{ route('micomunidad')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-comunicacion2.png')}}">
                    <p class="title_icon">Social</p>
                  </div>
                </a>            
              </div>
            @endcan

            
              @can('userdetails-index') 
              <div class="col-lg-2 col-md-2">
                <a href="{{ route('landing-page.index')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-web.png')}}">
                    <p class="title_icon">Pagina Web</p>
                  </div>
                </a>            
              </div>
            @endcan

            @can('tablasmaestras') 
              <div class="col-lg-2 col-md-2">
              <a href="{{route('obligaciones.index')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-inventario.png')}}">
                    <p class="title_icon">Obligaciones</p>
                  </div>
                </a>            
              </div>
            @endcan

           <!--    <div class="col-lg-3 col-md-3">
                <a href="">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-bienes-raíces.png')}}">
                    <p class="title_icon">Copropiedades</p>
                  </div>
                </a>            
              </div> -->
            </div>
        </div>
      </div>
  </div>

@endsection
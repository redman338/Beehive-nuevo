@extends('layouts.propietario')


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
                              <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                          </li>
                          <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                      </ul>
                  </div>
              </div>
            </div>
        </div>
        <!-- Page-header end -->

         <div class="page-body">
            <div class="row menu-admin">
              
             @can('miregistro-index') 
              <div class="col-lg-2 col-md-2">
                <a href="{{route('miregistro.index')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icon-casa.png')}}">
                    <p class="title_icon">Mi Registro</p>
                  </div>
                </a>            
              </div>
            @endcan

              @can('mizonascomunes-index') 
              <div class="col-lg-2 col-md-2">
                <a href="{{url('cliente/zonascomunes')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-piscina.png')}}">
                    <p class="title_icon">Zonas Comunes</p>
                  </div>
                </a>            
              </div>
            @endcan

             @can('misobligaciones-index') 
              <div class="col-lg-2 col-md-2">
                <a href="">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-inventario.png')}}">
                    <p class="title_icon">Mis Obligaciones</p>
                  </div>
                </a>            
              </div>
            @endcan

            <div class="col-lg-2 col-md-2">
                <a href="{{ route('micomunidad')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-comunicacion2.png')}}">
                    <p class="title_icon">Social</p>
                  </div>
                </a>            
              </div>
          

           
            </div>
        </div>
      </div>
  </div>

@endsection
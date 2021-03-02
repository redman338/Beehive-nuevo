@extends('layouts.beehive')
@section('content')

<div class="page-wrapper">
    <!-- START -->
  <!-- header -->
    <div class="page-header m-t-50">
      <div class="row align-items-end">
          <div class="col-lg-8">
              <div class="page-header-title">
                  <div class="d-inline">
                      <h4>Dashboard</h4>
                      <span>Administrador Beehive</span>
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

  <!-- header -->


    <!-- page body -->
      <div class="page-body">

        <div class="row menu-admin">
          <div class="col-lg-3 col-md-3">
            <a href="{{route('copropiedad.index')}}">
              <div class="img-icon-menu">
                <img src="{{url('admin/icon/beehive/icon-casa.png')}}">
                <p class="title_icon">Copropiedades</p>
              </div>
            </a>            
          </div>


           @can('userdetails-index') 
              <div class="col-lg-3 col-md-3">
                <a href="{{ route('userdetails.index')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-usuarios.png')}}">
                    <p class="title_icon">Usuarios</p>
                  </div>
                </a>            
              </div>
            @endcan
            
             @can('roles.index')
              <div class="col-lg-3 col-md-3">
                <a href="{{ route('copropiedadxusers.index')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-key.png')}}">
                    <p class="title_icon">Administrar Grupos<br> Copropiedad x Usuarios</p>
                  </div>
                </a>            
              </div>
             @endcan

          

      
        </div>
      </div>
    <!-- page body -->
</div>
@endsection
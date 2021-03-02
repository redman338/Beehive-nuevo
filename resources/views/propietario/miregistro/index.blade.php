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
                          <h4>Mi Registro</h4>
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


                          <li class="breadcrumb-item"><a href="#">Mi Registro</a> </li>
                      </ul>
                  </div>
              </div>
            </div>
        </div>
        <!-- Page-header end -->

         <div class="page-body">
            <div class="row menu-admin">
              
              
              <div class="col-lg-2 col-md-2">
                  
              </div>




              @can('miregistro-index') 
              <div class="col-lg-3 col-md-3">
                <a href="{{route('cliente/propietario')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-residente.png')}}">
                    <p class="title_icon">Propietario</p>
                  </div>
                </a>            
              </div>
            @endcan



             @can('miregistro-index') 
              <div class="col-lg-3 col-md-3">
                <a href="{{route('cliente/propietario/validacion')}}">
                  <div class="img-icon-menu">
                    <img src="{{url('admin/icon/beehive/icons-residente2.png')}}">
                    <p class="title_icon">Residente</p>
                  </div>
                </a>            
              </div>
            @endcan


             

            

          

           
            </div>
        </div>
      </div>
  </div>

@endsection
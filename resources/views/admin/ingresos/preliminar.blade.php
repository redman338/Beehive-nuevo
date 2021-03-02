@extends('layouts.admin')

@section('content')

<div class="main-body">
  <div class="page-wrapper">
        <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">

        <div class="col-lg-8">
          <div class="page-header-title">
              <div class="d-inline">
                  <h4>Gestion de Obligaciones</h4>
                  <p>Proceso Preliminar</p>
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('obligaciones.index')}}">Obligaciones</a>
                    </li>

                    <li class="breadcrumb-item"><a href="#">Proceso Preliminar</a>
                    </li>
              
                </ul>
            </div>
        </div>
        
       
      </div>  
    </div>

    <!-- Page-body start -->
      <div class="page-body">
    
      <div class="row">
        <div class="col-sm-12 col-md-8 col-xl-8">
          <!-- Zero config.table start -->
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between bd-highlight mb-3"> 
                <div class="d-flex align-items-start"> 
                  <h5>Proceso Preliminar</h5>
                </div>
              </div>
            </div>
          
            <div class="card-block">
              <div class="row">
                
                <div class="col-md-4">
                  <div class="icon_button icon-btn">
                    <a href="{{route('configfactura.index')}}" class="btn btn-primary btn-outline-primary btn-block">
                      <i class="fa fa-list-alt"></i>
                      <h6>Parametrizar<br> Factura</h6>
                    </a>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="icon_button icon-btn">
                    <a href="{{url('preliminar/configuracion')}}" class="btn btn-primary btn-outline-primary btn-block">
                      <i class="fa fa-cog"></i>
                      <h6>Variables de<br> Configuracion</h6>
                    </a>
                  </div>
                </div>


                <!-- <div class="col-md-4">
                  <a href="" class="" >
                    <div class="icon_button">
                      <img src="{{url('admin/images/icon/organize.png')}}" class="menu_icon">

                      <p> Desprendibles de Pago</p>
                    </div>
                  </a>
                
                </div>
 -->

               <!--  <div class="col-md-4">
                  <div class="icon_button">
                    <a href="" class="bn btn-primary btn-outline-primary btn-block" >
                      <img src="{{url('admin/images/icon/organize.png')}}" class="menu_icon">

                      <p>Crear Obligacion por Apartamento</p>
                    </a>
                  </div>
                
                </div> -->
             
              </div>
              
              <div class="row p-t-20">
                 
                 <a href="{{route('obligaciones.index')}}" class="btn btn-inverse waves-effect waves-inverse"><i class="icofont icofont-close f-16"></i>Regresar</a>

              </div>
            </div>
          
            

          </div>
          
        </div>
      </div>
    </div>

  </div>

      <!-- Page-body end -->
</div>



@endsection
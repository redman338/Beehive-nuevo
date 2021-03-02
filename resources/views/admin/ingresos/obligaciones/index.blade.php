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
              
                </ul>
            </div>
        </div>
        
       
      </div>  
    </div>

    <!-- Page-body start -->
      <div class="page-body">
    
  
      <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
          <!-- Zero config.table start -->
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between bd-highlight mb-3"> 
                <div class="d-flex align-items-start"> 
                  <h5>Menu Obligaciones</h5>
                </div>
              </div>
            </div>
          
            <div class="card-block">
              <div class="row">
                
                <div class="col-md-3 col-sm-12">
                  <div class="icon_button icon-btn">
                    <a href="{{url('preliminar/obligaciones')}}" class="btn btn-primary btn-outline-primary btn-block">
                      <i class="fa fa-list"></i>
                      <h6>Proceso Preliminar</h6>
                    </a>
                  </div>
                </div>

                <div class="col-md-3 col-sm-12">
                  <div class="icon_button icon-btn">
                    <a href="{{route('obligaciones.create')}}" class="btn btn-primary btn-outline-primary btn-block">
                      <i class="fa fa-list-alt"></i>
                      <h6>Crear Obligaciones Principal<br>x Apartamento</h6>
                    </a>
                  </div>
                </div>

               <div class="col-md-3 col-sm-12">
                  <div class="icon_button icon-btn">
                    <a href="{{url('desprendibles')}}" class="btn btn-primary btn-outline-primary btn-block">
                      <i class="fa fa-print"></i>
                      <h6>Generar Desprendibles<br> de Pago</h6>
                    </a>
                  </div>
                </div>


               <div class="col-md-3 col-sm-12">
                  <div class="icon_button icon-btn">
                    <a href="{{route('obligaciones-pagos')}}" id="" class="btn btn-primary btn-outline-primary btn-block">
                      <i class="fa fa-check"></i>
                      <h6>Actualizar Pagos <br>de obligaciones </h6>
                    </a>
                  </div>
                </div>


               <!--  <div class="col-md-4">
                  <div class="icon_button">
                    <a href="" class="bn btn-primary btn-outline-primary btn-block" >
                      <img src="{{url('admin/images/icon/organize.png')}}" class="menu_icon">

                      <p>Crear Obligacion por Apartamento</p>
                    </a>
                  </div>
                
                </div> -->
             
              </div>

           {{--    <div class="row">
                  <div class="col-md-4">
                  <div class="icon_button icon-btn">
                    <a href="{{url('obligacion/especial')}}" class="btn btn-inverse btn-outline-inverse btn-block">
                      <i class="fa fa-file-text-o"></i>
                      <h6>Crear Obligacion Especial<br> x Apartamento</h6>
                    </a>
                  </div>
                </div>
              </div> --}}

            </div>

          </div>
          
        </div>
      </div>
    </div>

  </div>

      <!-- Page-body end -->
</div>



@endsection

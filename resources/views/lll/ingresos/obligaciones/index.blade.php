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
                                            <!-- task, page, download counter  start -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-yellow update-card">
                                <div class="card-block">
                                    <div class="row align-items-end">
                                        <div class="col-8">
                                            <h4 class="text-white">$30200</h4>
                                            <h6 class="text-white m-b-0">All Earnings</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <canvas id="update-chart-1" height="50"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                                </div>
                            </div>
                        </div>

                          <div class="col-xl-3 col-md-6">
                              <div class="card bg-c-green update-card">
                                  <div class="card-block">
                                      <div class="row align-items-end">
                                          <div class="col-8">
                                              <h4 class="text-white">290+</h4>
                                              <h6 class="text-white m-b-0">Page Views</h6>
                                          </div>
                                          <div class="col-4 text-right">
                                              <canvas id="update-chart-2" height="50"></canvas>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer">
                                      <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                                  </div>
                              </div>
                          </div>

                          <div class="col-xl-3 col-md-6">
                              <div class="card bg-c-pink update-card">
                                  <div class="card-block">
                                      <div class="row align-items-end">
                                          <div class="col-8">
                                              <h4 class="text-white">145</h4>
                                              <h6 class="text-white m-b-0">Task Completed</h6>
                                          </div>
                                          <div class="col-4 text-right">
                                              <canvas id="update-chart-3" height="50"></canvas>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer">
                                      <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                                  </div>
                              </div>
                          </div>
                      </div>

  
      <div class="row">
        <div class="col-sm-12 col-md-8 col-xl-8">
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
                
                <div class="col-md-4">
                  <div class="icon_button icon-btn">
                    <a href="{{url('preliminar/obligaciones')}}" class="btn btn-primary btn-outline-primary btn-block">
                      <i class="fa fa-list"></i>
                      <h6>Proceso Preliminar</h6>
                    </a>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="icon_button icon-btn">
                    <a href="{{route('obligaciones.create')}}" class="btn btn-primary btn-outline-primary btn-block">
                      <i class="fa fa-file-text-o"></i>
                      <h6>Generar Desprendibles<br> de Pago</h6>
                    </a>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="icon_button icon-btn">
                    <a class="btn btn-primary btn-outline-primary btn-block">
                      <i class="fa fa-print"></i>
                      <h6>Imprimir Desprendibles<br> de Pago</h6>
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

            </div>

          </div>
          
        </div>
      </div>
    </div>

  </div>

      <!-- Page-body end -->
</div>



@endsection
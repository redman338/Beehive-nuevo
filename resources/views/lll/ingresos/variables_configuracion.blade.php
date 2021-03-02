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
                  <h4>Variables de Configuracion</h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>

                    <li class="breadcrumb-item"><a href="{{route('obligaciones.index')}}">Obligaciones</a>
                    </li>

                    <li class="breadcrumb-item"><a href="{{url('preliminar/obligaciones')}}">Proceso Preliminar</a>
                    </li>

                    <li class="breadcrumb-item"><a href="#!">Variables de Configuracion</a>
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
                  
                  <h5>Variables de Configuracion</h5>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{url('preliminar/obligaciones')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Cancelar</a>
                  </div>
                </div>
              </div>
                  <div class="card-block">

                    <div class="table-responsive">
                      <table class="table table-hover table-borderless">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Configuracion</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              
                              @can('bloques-index')   
                                <tr>
                                 
                                    <td><label class="label label-primary">*</label></td>
                                    <td>Conceptos Financieros</td>
                                    <td>
                                    <a href="{{route('conceptosfinancieros.index')}}"class="btn btn-inverse"><i class="fa fa-cog"></i></a>
                                    </td>
                                  
                                </tr>
                              @endcan
                               

                            
                             
                             
                          </tbody>
                      </table>
                      <div class="text-right m-r-20">
                          
                      </div>
                  </div>

                  </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Page-body end -->
  </div>


</div>

@endsection
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
                  <h4>Tablas Maestras</h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Tablas Maestras</a>
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
                  
                  <h5>Tablas Maestras</h5>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{url('dashboard')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Cancelar</a>
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
                                    <td>Bloques de la copropiedad</td>
                                    <td>
                                    <a href="{{route('bloques.index')}}"class="btn btn-inverse"><i class="fa fa-cog"></i></a>
                                    </td>
                                  
                                </tr>
                              @endcan
                               

                              @can('tipocopropiedad-index')     
                                <tr>
                                    <td><label class="label label-primary">*</label></td>
                                    <td>Tipos de copropiedad</td>
                                    <td>
                                    <a href="{{route('tipocopropiedad.index')}}"class="btn btn-inverse"><i class="fa fa-cog"></i></a>
                                    </td>
                                </tr>
                              @endcan

                              @can('tipoinmueble-index') 
                                <tr>
                                    <td><label class="label label-primary">*</label></td>
                                    <td>Tipos de Inmueble</td>
                                   <td>
                                     <a href="{{route('tipoinmueble.index')}}"class="btn btn-inverse"><i class="fa fa-cog"></i></a>
                                   </td> 
                                </tr>
                              @endcan
                            

                            @can('roles.index') 
                              <tr>
                                  <td><label class="label label-primary">*</label></td>
                                  <td>Roles</td>
                                 <td>
                                   <a href="{{route('roles.index')}}"class="btn btn-inverse"><i class="fa fa-cog"></i></a>
                                 </td> 
                              </tr>
                            @endcan
                            

                            @can('permissions.index') 
                                <tr>
                                  <td><label class="label label-primary">*</label></td>
                                  <td>Permisos</td>
                                 <td>
                                   <a href="{{route('permissions.index')}}"class="btn btn-inverse"><i class="fa fa-cog"></i></a>
                                 </td> 
                              </tr>

                            @endcan


                            @can('users.index') 

                              <tr>
                                  <td><label class="label label-primary">*</label></td>
                                  <td>Usuarios</td>
                                 <td>
                                   <a href="{{route('users.index')}}"class="btn btn-inverse"><i class="fa fa-cog"></i></a>
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
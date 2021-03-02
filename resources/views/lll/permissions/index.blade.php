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
                  <h4>Permisos</h4>
                  
              </div>
          </div>
        </div>

        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('tablasmaestras')}}">Tablas Maestras</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Permisos</a>
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
                  
                  <h5>Listado de Permisos</h5>

                  </div>

                  <div class="d-flex align-items-center">
                       @can('permissions.create')
                        <a href="{{ route('permissions.create') }}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Permisos</a>
                      @endcan
                  </div>
                </div>
              </div>


                 <div class="card-block">

                    <div class="dt-responsive col-md-8">
                      <table id="simpletable" class="table table-striped table-bordered nowrap">                          
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Nombre del Permiso</th>

                            <th></th>
                            <th></th>
                            <th></th>
                            
                          </tr>
                        </thead>

                          <tbody>

                             @foreach($permissions as $permiso)
                              <tr>
                                <td>{{ $permiso->id }}</td>
                                <td>{{ $permiso->name }}</td>
                                
                                  <td width="5px">
                                    <div class="icon-btn">

                                  
                                        @can('permission.show')
                                          <a href="{{ route('permissions.show', $permiso->id) }}" class="btn btn-info btn-icon"><i class="icofont icofont-eye-alt"></i></a>
                                        @endcan
                                    </div>
                                  </td>
                                  
                                  <td width="5px">
                                    <div class="icon-btn">
                                     @can('permissions.edit')
                                         <a href="{{ route('permissions.edit', $permiso->id) }}"  class="btn btn-inverse btn-icon"><i class="icofont icofont-ui-edit"></i></a>

                                        @endcan
                                    </div>
                                  </td> 
                                  
                                  <td width="5px">
                                    <div class="icon-btn">
                                      @can('permissions.destroy')
                                          
                                           {!! Form::open(['route' => ['permissions.destroy', $permiso->id], 
                                            'method' => 'DELETE']) !!}
                                                <button class="btn btn-danger btn-icon">
                                                  <i class="fa fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                          @endcan
                                     
                                     </div>
                                  </td>

                                      </div>
                                      
                                    </div>
                                  </td>
                                  
                              </tr>
                            @endforeach
                            
                          </tbody>
                      </table>
                    </div>

                  </div>
            

            </div>
          </div>
        </div>
      </div>

                    
@endsection
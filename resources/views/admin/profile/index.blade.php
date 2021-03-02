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
                  <h4>Usuarios</h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Usuarios</a>
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
                  
                  <h5>Listado de Usuarios</h5>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{route('userdetails.create')}}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Usuario</a>
                  </div>
                </div>
              </div>
                  <div class="card-block">

                    <div class="dt-responsive ">
                      <table id="simpletable" class="table table-striped table-bordered nowrap">                          
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Nombre de Usuario</th>
                            <th>Nit</th>
                            <th>Email</th>
                            <th></th>
                            
                          </tr>
                        </thead>

                          <tbody>

                            @foreach( $profiles as $profile)
                              <tr>
                                  <td>{{ $profile->id}}</td>
                                  <td> {{$profile->name}} </td>
                                  <td>{{$profile->nit}}</td>
                                  <td>{{$profile->email}}</td>
                                  <td>
                                    <div class="icon-btn">

                                      <div>
                                         <a href="{{route('userdetails.show', $profile)}}" class="btn btn-info btn-icon"><i class="icofont icofont-eye-alt"></i></a>

                                         <a href="{{route('userdetails.edit', $profile)}}"  class="btn btn-inverse btn-icon"><i class="icofont icofont-ui-edit"></i></a>
                                       
                                        @if(! $profile->role)
                                            <a  href="{{url('configuracion', $profile)}}"  class="btn btn-info btn-icon"><i class="fa fa-cogs"></i></a>
                                       
                                        @else

                                            <a  href="{{url('show/users', $profile->id)}}"  class="btn btn-warning btn-icon"><i class="fa fa-user"></i></a>

                                        @endif
                                         <a  href="{{url('delete', $profile->id)}}"  class="btn btn-danger btn-icon"><i class="fa fa-trash"></i></a>
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

      </div>

      <!-- Page-body end -->
  </div>


</div>

@endsection
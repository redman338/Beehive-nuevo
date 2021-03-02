@extends('layouts.admin')

@section('content')

<div class="main-body">
  <div class="page-wrapper">
        <!-- Page-header start -->
     <div class="page-header m-t-50">
      <div class="row align-items-end">

        <div class="col-lg-8">
          <div class="page-header-title">
              <div class="d-inline">
                 
                 @foreach($copropiedad as $c)

                   <h4>{{ $c->name}}</h4>

                  <h5>Inmuebles</h5>
                @endforeach
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Inmuebles</a>
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
                  
                  <h5>Listado de Inmuebles</h5>

                  </div>
                  
                  @can('inmueble-create')
                  <div class="d-flex align-items-center">
                      <a href="{{route('inmueble.create')}}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Inmueble</a>
                  </div>

                  @endcan
                </div>
              </div>
                  <div class="card-block">

                    <div class="dt-responsive ">
                      <table id="simpletable" class="table table-striped table-bordered nowrap">                          
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Copropiedad</th>
                            <th>Tipo de Inmueble</th>
                            <th>Propietario</th>                           
                            <th></th>
                            <th></th>
                            
                            
                          </tr>
                        </thead>

                          <tbody>
                        
                        @foreach($inmuebles as $inmueble)
                          <tr>
                              <td>  
                              {{ $inmueble->name}}
                              </td>

                              <td>  
                                {{ $inmueble->copropiedad->name}}
                              </td>

                               <td>  
                                {{ $inmueble->tipoinmueble->name}}
                              </td>

                               <td>  
                                {{ $inmueble->user->name}}
                              </td>

                            @can('inmueble-show')  
                              <td width="5px">
                                <div class="icon-btn">
                                  <a href="{{route('inmueble.show', $inmueble->id)}}" class="btn btn-info btn-icon"><i class="icofont icofont-eye-alt"></i></a>
                                </div>
                              </td>
                            @endcan

                             @can('inmueble-edit')  
                              <td width="5px">
                                <div class="icon-btn">
                                  <a href="{{route('inmueble.edit', $inmueble->id)}}"  class="btn btn-inverse btn-icon"><i class="icofont icofont-ui-edit"></i></a>
                                </div>
                              </td>

                              @endcan


                              @can('inmueble-edit') 

                                <td width="5px">
                                  <div class="icon-btn"> 
                                    <a  href="#"  class="btn btn-danger btn-icon"><i class="fa fa-trash"></i></a>
                                        
                                  </div>
                                </td>

                              @endcan
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
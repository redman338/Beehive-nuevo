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
                  <h4>Tipo de Inmueble</h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Tipo de Inmueble</a>
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
                  
                  <h5>Listado Tipos de Inmuebles</h5>

                  </div>

                  <div class="d-flex align-items-center">
                    @can('tipoinmueble-create')
                      <a href="{{route('tipoinmueble.create')}}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Tipo de Inmuebles</a>

                    @endcan
                  </div>
                </div>
              </div>
                  <div class="card-block">

                    <div class="dt-responsive col-md-8">
                      <table id="simpletable" class="table table-striped table-bordered nowrap">                          
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                           
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            
                          </tr>
                        </thead>

                          <tbody>
                        
                        @foreach($tipoinmueble as $tipc)
                          <tr>
                              <td>  
                              {{ $tipc->name}}
                              </td>

                              <td>  
                                {{ $tipc->description}}
                              </td>

                              @can('tipoinmueble-show')    

                                <td  width="5%">
                                    <div class="icon-btn">
                                      <a href="{{route('tipoinmueble.show', $tipc->id)}}" class="btn btn-info btn-icon"><i class="icofont icofont-eye-alt"></i></a>
                                    </div>
                                  </td>
                              @endcan


                                 @can('tipoinmueble-edit')    

                                  <td  width="5%">  
                                    <div class="icon-btn">   
                                      <a href="{{route('tipoinmueble.edit', $tipc->id)}}"  class="btn btn-inverse btn-icon"><i class="icofont icofont-ui-edit"></i></a>
                                    </div>
                                  </td >
                                @endcan
                                
                                @can('tipoinmueble-destroy')        
                                  <td  width="5%"> 
                                    <div class="icon-btn">
                                      {!!Form::open ([
                                            'route'=>[
                                            'tipoinmueble.destroy',
                                            $tipc->id ], 'method' => 'DELETE'

                                            ])!!} 

                                           <button class="btn btn-danger btn-icon"><i class="fa fa-trash"></i></button>
                                            
                                        {!! Form::close() !!}
                                    </div>
                                  </td>  

                                  @endcan   
                                </div>
                              </div>
                            
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
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
                  <h4>Bloques</h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Bloques</a>
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
                  
                  <h5>Listado de Bloques</h5>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{route('bloques.create')}}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Bloques</a>
                  </div>
                </div>
              </div>
                  <div class="card-block">

                    <div class="dt-responsive ">
                      <table id="simpletable" class="table table-striped table-bordered nowrap">                          
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Copropiedad</th>
                            <th>Descripcion</th>
                          
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            
                          </tr>
                        </thead>

                          <tbody>
                        
                        @foreach($bloques as $bloque)
                          <tr>
                              <td>  
                              {{ $bloque->name}}
                              </td>

                              <td>  
                                {{ $bloque->copropiedad->name}}
                              </td>

                               <td>  
                                {{ $bloque->description}}
                              </td>

                            @can('bloques-show')  
                              <td width="5px"> 
                                <div class="icon-btn">
                                  <a href="{{route('bloques.show', $bloque->id)}}" class="btn btn-info btn-icon"><i class="icofont icofont-eye-alt"></i></a>
                                </div>
                              </td>
                            @endcan


                            @can('bloques-edit')  

                              <td width="5px">
                                <div class="icon-btn">      
                                  <a href="{{route('bloques.edit', $bloque->id)}}"  class="btn btn-inverse btn-icon"><i class="icofont icofont-ui-edit"></i></a>
                                </div>
                              </td>
                            @endcan


                            @can('bloques-destroy') 
  
                               <td width="5px">
                                <div class="icon-btn">  
                                      
                                       @can('bloques.destroy')
                                          
                                           {!! Form::open(['route' => ['bloques.destroy', $bloque->id], 
                                            'method' => 'DELETE']) !!}
                                                <button class="btn btn-danger btn-icon">
                                                  <i class="fa fa-trash"></i>
                                                </button>
                                            {!! Form::close() !!}
                                          @endcan
                                    
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
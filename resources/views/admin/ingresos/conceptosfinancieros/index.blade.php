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
                   <p>Conceptos Financieros</p>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('obligaciones.index')}}">Gestion de Obligaciones</a>
                    </li>
                    
                     <li class="breadcrumb-item"><a href="{{url('preliminar/obligaciones')}}">Proceso Preliminar</a>
                    </li>

                    <li class="breadcrumb-item"><a href="#!">Conceptos Financieros</a>
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
                  
                  <h5>Listado de Conceptos Financieros</h5>

                  </div>
                  
                    @can('conceptosfinancieros-create')
                      <div class="d-flex align-items-center">
                          <a href="{{route('conceptosfinancieros.create')}}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Concepto</a>
                      </div>
                    @endcan
                </div>
              </div>
                  <div class="card-block">
                
                    <div class="dt-responsive ">
                      <table id="simpletable" class="table table-striped table-bordered nowrap">                          
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Concepto</th>
                            <th>Descripcion</th>
                            
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            
                          </tr>
                        </thead>

                          <tbody>
                          @foreach($conceptos as $c)
                             <tr>

                              <td>
                                {{ $c -> id}}
                              </td>

                              <td>
                                {{ $c -> name}}
                              </td>

                               <td>
                                {{ $c -> description}}
                              </td>

                             
                            @can('conceptosfinancieros-show') 
                             <td width="5px"> 
                                <div class="icon-btn">
                                  <a href="{{route('conceptosfinancieros.show', $c)}}" class="btn btn-info btn-icon"><i class="icofont icofont-eye-alt"></i></a>
                                </div>
                              </td>
                            @endcan


                            @can('conceptosfinancieros-edit') 
    
                              <td width="5px">
                                <div class="icon-btn">
                                  <a href="{{route('conceptosfinancieros.edit', $c)}}"  class="btn btn-inverse btn-icon"><i class="icofont icofont-ui-edit"></i></a>
                                </div>
                              </td>   
                            @endcan
                            
                             @can('conceptosfinancieros-destroy')
                               <td width="5px">
                                <div class="icon-btn">           
                                          
                                     {!! Form::open(['route' => ['conceptosfinancieros.destroy', $c], 
                                      'method' => 'DELETE']) !!}
                                          <button class="btn btn-danger btn-icon">
                                            <i class="fa fa-trash"></i>
                                          </button>
                                      {!! Form::close() !!}
                                                                               
                                </div>
                              </td>

                              @endcan
                          </tr>
                       @endforeach
                          </tbody>
                      </table>
                    </div>
                       <a href="{{url('preliminar/configuracion')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Regresar</a>
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
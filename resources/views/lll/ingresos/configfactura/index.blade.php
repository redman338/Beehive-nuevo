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
                   <h4>Configuración de Factura</h4>
                   <p>Configuracion</p>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('obligaciones.index')}}">Gestion de Obligaciones</a>
                    </li>
                    
                     <li class="breadcrumb-item"><a href="{{url('preliminar/obligaciones')}}">Proceso Preliminar</a>
                    </li>

                    <li class="breadcrumb-item"><a href="#!">Configuracion de Factura</a>
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
                  
                  <h5>Listado de Parametros Financieros</h5>

                  </div>
                  
                    @can('configfactura-create')
                      <div class="d-flex align-items-center">
                          <a href="{{route('configfactura.create')}}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Configuracion</a>
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
                            <th>Valor</th>
                            <th>Copropiedad</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            
                          </tr>
                        </thead>

                          <tbody>
                          
                            @can('conceptosfinancieros-show') 
                             <td width="5px"> 
                                <div class="icon-btn">
                                  <a href="#" class="btn btn-info btn-icon"><i class="icofont icofont-eye-alt"></i></a>
                                </div>
                              </td>
                            @endcan


                            @can('conceptosfinancieros-edit') 
    
                              <td width="5px">
                                <div class="icon-btn">
                                  <a href="#"  class="btn btn-inverse btn-icon"><i class="icofont icofont-ui-edit"></i></a>
                                </div>
                              </td>   
                            @endcan
                            
                             @can('conceptosfinancieros-destroy')
                               <td width="5px">
                                <div class="icon-btn">           
                                          
                                     {!! Form::open([#], 
                                      'method' => 'DELETE']) !!}
                                          <button class="btn btn-danger btn-icon">
                                            <i class="fa fa-trash"></i>
                                          </button>
                                      {!! Form::close() !!}
                                                                               
                                </div>
                              </td>

                              @endcan
                          </tr>
                     
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
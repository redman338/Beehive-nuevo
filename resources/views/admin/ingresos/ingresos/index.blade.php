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
                   <h4>Reportar Ingresos</h4>
                   <p>Pagos</p>
                  
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
                    
                    
                    <li class="breadcrumb-item"><a href="#!">Ingresos</a>
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
                  
                  <h5>Listado de Obligaciones Generadas</h5>

                  </div>

                   
                    
                </div>
              </div>
                  <div class="card-block">
                    <div class="row">

                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Año Fiscal :</label>
                            <div class="col-sm-7">
                                    {!! Form::select('year_id',
                               [ null => '-- Selecciona ---']+ $years,
                                null, 
                                ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'inputYear']) !!}
                            </div>
                        </div>

                      </div>
                      

                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Periodo / Mes:</label>
                            <div class="col-sm-7">
                                    {!! Form::select('month_id',
                               [ null => '-- Selecciona ---']+ $months,
                                null, 
                                ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'inputMonth']) !!}
                            </div>
                        </div>

                      </div>
                      
                      <div class="col-md-4">
                        <button class="btn btn-md btn-primary" type="button" id="btnConsultar">Consultar </button>
                      </div>
                      

                      
                    </div>
                
                    <div class="dt-responsive ">
                      <table id="simpletable" class="table table-striped table-bordered nowrap">                          
                        <thead>
                          <tr>
                            <th>No Documento</th>
                            <th>Inmueble</th>
                            <th>Mes</th>                          
                            <th>Fecha Limite de Pago</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                            
                            
                          </tr>
                        </thead>

                          <tbody id="datatable">
                      
                              
                                                      
                          </tbody>

                      </table>
                        <div id="pager" class="p-t-20">
                              <ul id="pagination" class="pagination-sm"></ul>
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
<input type="hidden" name="token" value="{{ csrf_token() }}">

@include('admin.ingresos.ingresos.partials.modal_ingresos')
@endsection

@section('scripts')

<script src="{{url('admin/js/jquery.twbs-pagination.min.js')}}" ></script>
<script src="{{url('admin/js/querys/ingresos.js')}}" ></script>
@endsection
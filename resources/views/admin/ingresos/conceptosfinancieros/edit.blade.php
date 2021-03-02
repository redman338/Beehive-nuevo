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
                  <h4>Conceptos</h4>
                  <h5>Ver </h5>
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('conceptosfinancieros.index')}}">Conceptos Financieros</a>
                    </li>

                     <li class="breadcrumb-item"><a href="#!">Ver</a>
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
                  
                  <h5>Informacion</h5>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{route('conceptosfinancieros.index')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Cancelar</a>
                  </div>
                </div>
              </div>
                
              <div class="card-block">
                    
                
                {{ Form::model($concepto,  ['route'=>['conceptosfinancieros.update', $concepto->id ], 'method'=>'PUT' ])}}
                    
                   
                    @include('admin.ingresos.conceptosfinancieros.partials.form')
                
                    <div class="row">
                       <div class="col-lg-12 col-sm-12 mob-product-btn">
                            <button type="submit" class="btn btn-primary waves-effect waves-inverse"> <i class="icofont icofont-save f-16"></i>Actualizar</button>


                            <a href="{{route('conceptosfinancieros.index')}}" class="btn btn-inverse waves-effect waves-inverse"><i class="icofont icofont-close f-16"></i>Cancelar</a>
                            
                        </div>
                    </div>


                {{ Form::close() }}
               
                                     
              </div>
        </div>
    </div>   

  </div>
</div>

</div>
</div>
        





@endsection
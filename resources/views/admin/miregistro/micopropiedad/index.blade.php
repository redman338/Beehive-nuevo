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
                  <h4>Mis Copropiedades</h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Mis Copropiedades</a>
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
                  
                  <h5>Listado de Copropiedades</h5>

                  </div>
                
                  @can('copropiedad.create')
                    <div class="d-flex align-items-center">
                        <a href="{{route('copropiedad.create')}}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Cliente</a>
                    </div>
                  @endcan
                </div>
              </div>
                  <div class="card-block">

                      @include('admin.partials.delegado')
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
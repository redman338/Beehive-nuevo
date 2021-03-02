@extends('layouts.admin')
@section('css')
  
  <link rel="stylesheet" type="text/css" href="{{url('admin/css/dropzone.css')}}">
  
  <script src="{{url('admin/js/file_uploader/dropzone.js')}}"></script>

@endsection

@section('content')

<div id="loading">
  <img src="{{url('admin/icon/beehive/loading.gif')}}">
</div>

<div class="main-body">
  <div class="page-wrapper">
        <!-- Page-header start -->
    <div class="page-header m-t-50">
      <div class="container">
        <div class="row align-items-end">

          <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Clientes / Copropiedades</h4>
                    <h5>Crear </h5>
                </div>
            </div>
          </div>


          <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('copropiedad.index')}}">Clientes / Copropiedades</a>
                    </li>

                     <li class="breadcrumb-item"><a href="#!">Crear</a>
                    </li>
              
                </ul>
            </div>
          </div>
        </div>
       
      </div> 

    </div>

    <!-- Page-body start -->
      <div class="container page-body">
        <div class="row">
          <div class="col-md-12 ">
            <!-- Zero config.table start -->
            <div class="card">
              <div class="card-header">
                
                <div class="d-flex justify-content-between bd-highlight mb-3"> 
                  <div class="d-flex align-items-start"> 
                  
                  <h5>Agregar Nuevo Cliente</h5>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{route('copropiedad.index')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Cancelar</a>
                  </div>
                </div>
              </div>
                
              <div class="card-block ">
                <div class="form-margin">
            
                    {{ Form::open(['route'=>'copropiedad.store', 'files' => 'true',
                    'id' => 'copropiedadForm'])}}
                        
                        @include('admin.miregistro.copropiedad.partials.form')

                    {{ Form::close() }}

                 
                </div>               
              </div>

        </div>
    </div>   

  </div>
</div>

</div>
</div>
        


@include('admin.miregistro.copropiedad.partials.form_user_modal')
@include('admin.miregistro.copropiedad.partials.search_user_modal')

@endsection
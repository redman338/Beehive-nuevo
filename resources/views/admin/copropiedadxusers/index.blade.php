@extends('layouts.admin')

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
                    <h4>Asociar Copropiedades</h4>
                    <h5> </h5>
                </div>
            </div>
          </div>


          <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>

                     <li class="breadcrumb-item"><a href="#!">Asociar Copropiedades</a>
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
                  
                  <h5>Asociar usuarios a una copropiedad</h5>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{url('dashboard')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Cancelar</a>
                  </div>
                </div>
              </div>
                
              <div class="card-block ">
                <div class="form-margin">
            
                    {{ Form::open(['route'=>'copropiedadxusers.store'])}}
                        
                        @include('admin.copropiedadxusers.partials.form')

                        @include('admin.copropiedadxusers.show')
                    {{ Form::close() }}

                 
                </div>               
              </div>

        </div>
    </div>   

  </div>
</div>

</div>
</div>
        

@include('admin.copropiedadxusers.partials.search_copropiedades_modal')
@include('admin.miregistro.copropiedad.partials.search_user_modal')


@endsection
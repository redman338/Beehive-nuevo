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
                  <h4>Roles </h4>
                  <p>Editar </p>
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index')}}">Roles</a>
                    </li>

                     <li class="breadcrumb-item"><a href="#!">Editar</a>
                    </li>
              
                </ul>
            </div>
        </div>
        
       
      </div>  
    </div>

    <!-- Page-body start -->
      <div class="page-body">
        <div class="row">

          <div class="col-sm-12 col-md-8 col-xl-8">
            <!-- Zero config.table start -->
            <div class="card">
              <div class="card-header">
                
                <div class="d-flex justify-content-between bd-highlight mb-3"> 
                  <div class="d-flex align-items-start"> 
                  
                  <h3>Role</h3>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{route('roles.index')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Cancelar</a>
                  </div>
                </div>
              </div>
                
                <div class="card-block">
                  

                 
                  {!! Form::model($role, ['route' => ['roles.update', $role->id],
                    'method' => 'PUT']) !!}
                     
                     @include('admin.roles.partials.form')

                

                    <div class="row">
                        <div class="col-lg-12 col-sm-12 mob-product-btn">
                            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20">
                              <i class="icofont icofont-save f-16"></i><span class="m-l-10">Actualizar</span>
                          </button>
                            
                            <a href="{{route('roles.index')}}" class="btn btn-inverse waves-effect waves-inverse"><i class="icofont icofont-undo"></i>Regresar</a>
                            
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
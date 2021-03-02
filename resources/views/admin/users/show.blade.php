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
                  <h4>Configuracion </h4>
                  <p>usuarios </p>
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('userdetails.index')}}">Usuarios</a>
                    </li>

                     <li class="breadcrumb-item"><a href="#!">Configuracion</a>
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
                  
                  <h5>Configurar Acceso Usuario</h5>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{route('userdetails.index')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Cancelar</a>
                  </div>
                </div>
              </div>
                
                <div class="card-block">
                  
                  {{ Form::model($user, []) }}
                     
                    @include('admin.users.partials.form2')
                  
                    <div class="row">
                       <div class="col-lg-12 col-sm-12 mob-product-btn">
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning waves-effect waves-light m-r-20">
                                <i class="fa fa-pencil"></i><span class="m-l-10">EDITAR</span>
                            </a>
                            <a href="{{route('users.index')}}" class="btn btn-inverse waves-effect waves-inverse"><i class="icofont icofont-close f-16"></i>Cancelar</a>
                            
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
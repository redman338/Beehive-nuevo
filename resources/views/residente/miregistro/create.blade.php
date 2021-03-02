@extends('layouts.residente2')

@section('css')
   
    
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/steps.css')}}" >
@endsection

@section('content')
 
  
    <div class="main-body">
        <div class="page-wrapper full-calender">
            <!-- Page-header start -->
                
       
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <div class="d-inline">
                                <h4>Mi Registro</h4>
                             
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Mi registro</a> </li>
                                                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-header end -->
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Mi Registro</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                           @include('residente.miregistro.partials.form')                            
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    
<input type="hidden" name="token" value="{{ csrf_token() }}">   
          


@section('scripts')



    
    <script src="{{ asset('admin/js/validation.js') }}"></script>
    <script src="{{ asset('admin/js/steps.js') }}"></script>
     <script src="{{ asset('admin/js/querys/propietario.js') }}"></script>

  

  
@endsection

@endsection
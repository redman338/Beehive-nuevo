@extends('layouts.propietario2')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/fullcalendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/fullcalendar.print.css')}}" media='print'>
@endsection

@section('content')
 
   @foreach($zona as $z)     
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper full-calender">
            <!-- Page-header start -->
                

        <!-- ALERT MENSAJE -->
            <div id="alertinfo" class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        
                            <div id="alert" class="alert alert-dismissible" role="alert">
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>

                                <p id="messaje">Mensaje </p>

                            </div>
                       
                    </div>
                </div>
            </div>

        <!-- ALERT MENSAJE -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <div class="d-inline">
                                <h4>Reservas</h4>
                                <span>{{ $z->name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{url('cliente/zonascomunes')}}">Zonas Comunes</a> </li>
                                <li class="breadcrumb-item"><a href="{{url('cliente/zona', $z->slug)}}">{{ $z->name}}</a> </li>

                                 <li class="breadcrumb-item"><a href="#">Reservas</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-header end -->
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5>Reservas</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-xl-2 col-md-12">
                                    <div id="external-events">

                                      <h6 class="m-b-30 m-t-20">{{ $z->name}}</h6>
                                          <div id="boxeventos">  
                                              <div class="fc-event ui-draggable ui-draggable-handle">My Event 1</div>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-xl-10 col-md-12">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-error">
                    <div class="card text-center">
                        <div class="card-block">
                            <div class="m-t-10">
                                <i class="icofont icofont-warning text-white bg-c-yellow"></i>
                                <h4 class="f-w-600 m-t-25">Not supported</h4>
                                <p class="text-muted m-b-0">Full Calender not supported in this device</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
<input type="hidden" name="token" value="{{ csrf_token() }}">   
<input type="hidden" name="zonacomun_id" value="{{ $z->id }}">                
@include('propietario.reservas.partials.form_reserva_modal')
@include('propietario.reservas.partials.info_event')
@endforeach

@section('scripts')



  <!--   <script type="text/javascript" src="..\files\assets\js\classie.js"></script> -->
    
    <!-- calender js -->
    <script type="text/javascript" src="{{url('admin/js/full-calender/moment.min.js')}}"></script>

    <script type="text/javascript" src="{{url('admin/js/full-calender/3.8/fullcalendar.js')}}"></script>
  
    <!-- Custom js -->
    <script type="text/javascript" src="{{url('admin/js/full-calender/calendar.js')}}"></script>

    <script type="text/javascript" src="{{url('admin/js/full-calender/es.js')}}"></script>
    
    <script src="{{ asset('admin/js/validation.js') }}"></script>

    <script type="text/javascript" src="{{url('admin/js/querys/reserva.js')}}"></script>

  
@endsection

@endsection
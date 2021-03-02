@extends('layouts.propietario2')

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
                                 <li class="breadcrumb-item"><a href="{{url('miregistro')}}">Mi registro</a> </li>
                                <li class="breadcrumb-item"><a href="#">Validacion</a> </li>
                                                            
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
                            
                            <div class="boxForm" id="boxForm">
                              <div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
       
        <div class="col-md-12 col-sm-9 col-md-7 col-lg-8 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Formulario de Registro Residentes</strong></h2>
                <p>Datos Basicos del Residente</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                      
                    <form id="msform" class="msform">
                     
                      
                            <!-- progressbar -->

                         
                            <ul id="progressbar2">

                                <li class="active" id="account"><strong>Validacion</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                                                              
                            </ul> <!-- fieldsets -->
                             <fieldset>
                                <div class="form-card">
                                    
                                    <h2 class="fs-title">Validacion de Registro</h2>
                                      
                                      <div class="row justify-content-center p-t-20">
                                       
                                         <h4 id="message">Haz click en la opcion que te corresponda</h4>
                                      
                                      </div>

                                    <div class="box" id="box_validation">

                                      <div class="row p-t-20">
                                        <div class="col-md-6">

                                        
                                          <div class="row justify-content-center">
                                            <a href="{{url('cliente/propietario/residentes/form')}}" class="link_propietario_residente">
                                              <h5>Propietario Residente</h5>
                                            </a>
                                          </div>

                                         
                                            <div class="row justify-content-center">
                                  
                                                <div class="col-3"> 
                                                   <a href="{{url('cliente/propietario/residentes/form')}}" class="link_propietario_residente">
                                                    <img src="{{url('admin/icon/beehive/icons-ok.png')}}" class="fit-image">
                                                    </a>
                                                </div>
                                                                                    
                                            </div>
                                    
                                          
                                        </div>
                                        <div class="col-md-6">
                                          

                                        
                                            <div class="row justify-content-center">
                                                <a href="{{url('cliente/propietario/residentes/formresidente')}}" class="link_residente_ext">
                                                  <h5>Arrendatario Residente</h5>
                                                </a>
                                            </div>

                                             
                                              <div class="row justify-content-center">
                                            
                                                
                                                  <div class="col-3"> 
                                                     <a href="{{url('cliente/propietario/residentes/formresidente')}}" class="link_residente_ext">
                                                        <img src="{{url('admin/icon/beehive/icons-contrato.png')}}" class="fit-image">
                                                      </a>
                                                  </div>

                                              </div>
                                          
                                         </div>
 
                                      </div>
                                    </div>


                                </div>
                             </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                            </div>
                                                      
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    
<input type="hidden" name="token" value="{{ csrf_token() }}">   
          


@section('scripts')



    
    <script src="{{ asset('admin/js/validation.js') }}"></script>
  <!--   <script src="{{ asset('admin/js/steps.js') }}"></script> -->
     <script src="{{ asset('admin/js/querys/validacion_propietario.js') }}"></script>

  

  
@endsection

@endsection
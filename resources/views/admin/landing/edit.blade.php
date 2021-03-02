@extends('layouts.admin')
@section('css')
  
  <link rel="stylesheet" type="text/css" href="{{url('admin/css/dropzone.css')}}">
  
  <script src="{{url('admin/js/file_uploader/dropzone.js')}}"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  

@endsection

@section('content')

  <div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Pagina Web</h4>
                            <span>Edita las imagenes de tu pagina web</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                            </li>

                            <li class="breadcrumb-item">
                                <a href="{{route('landing-page.index')}}"> Pagina web </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Widget</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->
            <div class="page-body">
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                      
                        <div id="navigation">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card version">
                                        <div class="card-header">
                                        @foreach($landing as $value)

                                            <h4>Url Amigable : </h4>
                                            <h5><a href="http://www.beehive.com.co/es/{{$value->slug}}">www.beehive.com.co/es/{{$value->slug}}</a></h5>
                                            <div class="card-header-right">
                                                <i class="icofont icofont-navigation-menu"></i>
                                            </div>

                                            <input type="hidden" class="landing" name="landing_id" value="{{$value->id}}">
                                         
                                        </div>
                                        <div class="card-block">                                         
                                            <div class="support-btn">
                                              <div class="row">
                                                <div class="col-md-10">

                                                   {{ Form::model($landing,  ['route'=>['landing-page.update', $value->id ], 'method'=>'PUT',])}}
  
                                                                                                    
                                                     <input type="hidden" class="landing" name="landing_id" value="{{$value->id}}">

                                                    <input type="text" name="slug" class="form-control" value="{{$value->slug}}">                                                 

                                                </div>

                                                <div class="col-md-10 p-t-10">
                                                    <button type="submit" class="btn btn-primary btn-block" target="_blank"><i class="icofont icofont-life-buoy"></i> Actualizar</button>
                                                </div>                                           
                                                </form>
                                              </div>

                                              
                                            </div>
                                         @endforeach



                                            <ul class="nav navigation">
                                                <li class="navigation-header"><i class="icon-history pull-right"></i> <b>Version history</b></li>
                                                <li>
                                                    <a href="#v_1_1">Version 1.2 <span class="text-muted text-regular pull-right">02.12.2015</span></a>
                                                </li>
                                                <li>
                                                    <a href="#v_1_0">Version 1.1 <span class="text-muted text-regular pull-right">21.10.2015</span></a>
                                                </li>
                                                <li>
                                                    <a href="#release">Initial Release <span class="text-muted text-regular pull-right">01.10.2015</span></a>
                                                </li>
                                                <li class="navigation-divider"></li>
                                                <li class="navigation-header"><i class="icon-gear pull-right"></i> <b>Extras</b></li>
                                                <li>
                                                    <a href="#" target="_blank"><i class="icofont icofont-speech-comments m-r-5"></i> Contact me</a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank"><i class="icofont icofont-life-buoy m-r-5"></i> Website</a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank"><i class="icofont icofont-rocket-alt-2 m-r-5"></i> Other templates</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    
                   @foreach($landing as $value)
                    <div class="col-lg-8 col-xl-9">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card" id="v_1_1">
                                    <div class="card-header">
                                        <h5>Logo Principal</h5>
                                        
                                        <div class="">                                           
                                            <label class="label label-info">V.1</label>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                          <div class="col-md-6">
                                             @include('admin.landing.widgets.logo')
                                          </div>
                                          <div class="col-md-6" id="logo">
                                            
                                          </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card" id="v_1_0">
                                    <div class="card-header">
                                        <h5>Banner Central</h5>
                                        <span></span>
                                        <div class="">
                                            
                                            <label class="label label-info">V.1</label>
                                        </div>
                                    </div>
                                    <div class="card-block">

                                       <div class="row">
                                          <div class="col-md-6">
                                             @include('admin.landing.widgets.banner')
                                          </div>

                                          <div class="col-md-6">
                                            
                                          </div>
                                        </div>
                                        
    

                                  </div>
                              </div>
                          </div>
                      </div>
                       
                      <div class="row">
                            <div class="col-sm-12">
                                <div class="card" id="release">
                                    <div class="card-header">
                                        <h5>Tarjetas</h5>
                                        <span></span>
                                        <div class="">
                                            <span class="text-muted heading-text m-r-5">October 1, 2015</span>
                                            <label class="label label-info">V.1.0</label>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        
                                        <div class="row">
                                          <div class="col-md-6">
                                            <h5>Tarjeta 1</h5>
                                            <span class="text-muted heading-text m-r-5">Mas info</span>
                                             @include('admin.landing.widgets.card1')
                                          </div>
                                          <div class="col-md-6">
                                             <h5>Tarjeta 2</h5>
                                            <span class="text-muted heading-text m-r-5">Mas info</span>
                                             @include('admin.landing.widgets.card2')
                                          </div>
                                        </div>

                                        <div class="row p-t-20">
                                          <div class="col-md-6">
                                             <h5>Tarjeta 3</h5>
                                            <span class="text-muted heading-text m-r-5">Mas info</span>
                                             @include('admin.landing.widgets.card3')
                                          </div>
                                          <div class="col-md-6">
                                             <h5>Tarjeta 4</h5>
                                            <span class="text-muted heading-text m-r-5">Mas info</span>
                                             @include('admin.landing.widgets.card4')
                                          </div>

                                         
                                        </div>


                                    </div>
                                </div>
                            </div>
                      </div>


                         <div class="row">
                            <div class="col-sm-12">
                                <div class="card" id="v_1_0">
                                    <div class="card-header">
                                        <h5>Descripción del Conjunto</h5>
                                        <span></span>
                                        <div class="">
                                            
                                            <label class="label label-info">V.1</label>
                                        </div>
                                    </div>
                                    <div class="card-block">

                                       <div class="row">
                                          <div class="col-md-6">
                                             @include('admin.landing.widgets.description')
                                          </div>

                                          <div class="col-md-6">
                                            
                                          </div>
                                        </div>
                                        
    

                                  </div>
                              </div>
                          </div>
                      </div>
                          

                          <div class="row">
                            <div class="col-sm-12">
                                <div class="card" id="v_1_0">
                                    <div class="card-header">
                                        <h5>Información Adicional</h5>
                                        <span></span>
                                        <div class="">
                                            
                                            <label class="label label-info">V.1</label>
                                        </div>
                                    </div>
                                    <div class="card-block">

                                       <div class="row">
                                         
                                          <div class="col-md-6">
                                             @include('admin.landing.widgets.masinfo')
                                          </div>

                                          <div class="col-md-6">
                                            
                                          </div>
                                        </div>
                                        
    

                                  </div>
                              </div>
                          </div>
                      </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card" id="v_1_0">
                                    <div class="card-header">
                                        <h5>Información de Contacto</h5>
                                        <span></span>
                                        <div class="">
                                            
                                            <label class="label label-info">V.1</label>
                                        </div>
                                    </div>
                                    <div class="card-block">

                                       <div class="row">
                                         
                                          <div class="col-md-6">
                                             @include('admin.landing.widgets.contact')
                                          </div>

                                          <div class="col-md-6">
                                            
                                          </div>
                                        </div>
                                        
    

                                  </div>
                              </div>
                          </div>
                        </div>


  

                    </div>
                    @endforeach
                    <!-- col-sm-9 end -->
                </div>
                <!-- row end -->
            </div>
        </div>
    </div>


 <input type="hidden" name="token" value="{{ csrf_token() }}">
@endsection

@section ('scripts')

<script src="{{ asset('admin/js/jquery.stringToSlug.min.js') }}"></script>


 <script src="{{url('admin/js/querys/landing.js')}}"></script>

<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script>
 

  CKEDITOR.config.height = 300;
  CKEDITOR.config.width  = 'auto';
  CKEDITOR.replaceAll('editor');

</script>



@endsection
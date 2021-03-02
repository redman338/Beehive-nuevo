@extends('layouts.admin')

@section('content')

  <!-- Main-body start -->
  <div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Reservas</h4>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('reservas.index')}}">reserva</a> </li>
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
                                        <h5>Informacion Detallada</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-navigation-menu"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                       
                                        <ul class="nav navigation">
                                            <li class="navigation-header"><i class="icon-history pull-right"></i> <b>Usuario Solicitante</b></li>
                                            <li>
                                                <a href="#v_1_1">Nombre:

                                                <span class="text-muted text-regular pull-right">{{$reservaUser["name"]}}</span></a>
                                            </li>
                                           <li>
                                                <a href="#v_1_1">Telefono:

                                                 <span class="text-muted text-regular pull-right">{{$reservaUser["phone"]}}</span></a>
                                            </li>
                                           <li>
                                                <a href="#v_1_1">Email:

                                                 <span class="text-muted text-regular pull-right">{{$reservaUser["email"]}}</span></a>
                                            </li>
                                           
                                            <li class="navigation-divider"></li>
                                            <li class="navigation-header"><i class="icon-gear pull-right"></i> <b>Zona Comun</b></li>
                                            <li>

                                               <a href="#v_1_1">Zona:

                                               <span class="text-muted text-regular pull-right">{{ $zonacomun->name}}</span></a>
                                               
                                            </li>
                                            <li>
                                                <a href="#" target="_blank"><i class="icofont icofont-life-buoy m-r-5"></i> Website</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card" id="v_1_1">
                                <div class="card-header">
                                    <h4 class="text-primary">{{ $reserva->zonacomun->name }}</h4>
                                    <span>Informacion de la Reserva</span>
                                    

                                    <!-- RESERVA -->
                                    <div class="row">
                                      <div class="col-md-12">
                                        <!-- <div class="dt-responsive"> -->

                                          {{ Form::model($reserva,  ['route'=>['reservas.update', $reserva->id ], 'method'=>'PUT' ])}}
                                      
                                                    
                                            <div class="row">
                                                <div class="col-md-6">
                                                    {{ Form::text('title', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Titulo de la Reserva', 'required' => 'required']) }}     
                                                </div>

                                                <div class="col-md-6">
                                                      {{ Form::text('start', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Hora de Inicio', 'required' => 'required']) }}  
                                                </div>
                                            </div>
                                

                                          <div class="row p-t-30">
                                            
                                            
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                  <label class="col-md-5">Hora de Inicio: </label>

                                                  <div class="col-md-6">
                                                    {{ Form::text('start_time', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Hora de Inicio', 'required' => 'required']) }}  
                                                  </div>                                                   
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                              <div class="form-group row">
                                                  <label class="col-md-5">Hora de Fin: </label>

                                                  <div class="col-md-6">
                                                    {{ Form::text('end_time', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Nombre del nuevo cliente', 'required' => 'required']) }}     
                                                  </div>
                                              </div>
                                            </div>
                                          </div>

                                        <div class="row p-t-30">
                                            <div class="col-md-6">
                                              <div class="form-group row">
                                                <label class="col-md-3">Valor de la Reserva: </label>

                                                <div class="col-md-6">
                                                  <?php 
                                                      $end = (int)$reserva->end_time;
                                                      $start = (int)$reserva->start_time;
                                                      $time= $end - $start;
                                                      $valorTotal = $time * $zonacomun->valorxhora;
                                                    ?>
                                                 
                                                  <input class="form-control form-txt-primary form-control-primary" id="value" value="{{ $valorTotal }}">
                                                </div>                                     
                                              </div>
                                            </div>


                                          <div class="col-md-6">
                                            <div class="form-group row">
                                              <label class="col-md-3">Estado de la Reserva:</label>

                                              <div class="col-md-6">
                                              {{ Form::select('reservastatus_id', $rstatus, $reserva->reservastatus_id,['class'=>'form-control'])}}
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                   <div class="row">
                                      <div class="col-md-3">
                                        <button type="submit" class="btn btn-md btn-primary">ACTUALIZAR</button>
                                      </div>
                                   </div>
                                  
                                </div>

                            {!!Form::Close() !!}
                            </div>
                          </div>

                        </div>
                      <div class="card-block">
                      </div>
                    </div>
                  </div>

                </div>
                <!-- col-sm-9 end -->
              </div>
              <!-- row end -->
            </div>
          </div>
        </div>

            
      </div>
    </div>
  
    
@endsection
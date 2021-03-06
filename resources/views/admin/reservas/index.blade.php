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
                  <h4>Reservas </h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!"> Reservas</a>
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
                  
                  <h5>Listado de Reservas</h5>

                  </div>
                  
                  <div class="d-flex align-items-center">
                    <a href="{{route('reservas.create')}}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Reserva</a>
                </div>
                   
                </div>
              </div>
                  <div class="container card-block">
                    
                    <div class="row">
                      <div class="col-md-12">
                        <!-- <div class="dt-responsive"> -->
                          <table id="simpletable" class="table table-striped table-bordered nowrap">                          
                            <thead>
                              <tr>
                                <th>No Reserva</th>     
                                <th>Zona Comun</th>         
                                <th>Titulo de la Reserva</th>
                                <th>Fecha de Reserva</th>
                                <th>Usuario Solicitante</th>
                                <th>Estado de la Reserva</th>
                             
                               
                                <th></th>
                                <th></th>
                                <th></th>
                                
                                
                              </tr>
                            </thead>

                              <tbody>

                            @foreach($reservas as $r)
                              <tr>
                                <td>{{$r->id }}</td>
                                <td>{{$r->zonacomun->name }}</td>
                                <td>{{$r->title }}</td>
                                <td>{{$r->start }}</td>
                                <td>{{$r->user->name }}</td>
                                <td>{{$r->reservastatus->name }}</td>


                             
                                   <td width="5px"> 
                                      <div class="icon-btn">
                                        <a href="{{route('reservas.show',$r->id)}}" class="btn btn-info btn-icon"><i class="icofont icofont-eye-alt"></i></a>
                                      </div>
                                    </td>
                               


                             
        
                                  <td width="5px">
                                    <div class="icon-btn">
                                      <a href="{{route('reservas.edit',$r->id)}}"  class="btn btn-inverse btn-icon"><i class="icofont icofont-ui-edit"></i></a>
                                    </div>
                                  </td>   
                             
                                
                                
                                   <td width="5px">
                                    <div class="icon-btn">           
                                              
                                        
                                                            
                                    </div>
                                  </td>

                               
                              </tr>
                            @endforeach
                              </tbody>
                          </table>
                        </div>
                      </div>

                    </div>

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
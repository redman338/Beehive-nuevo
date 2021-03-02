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
                  <h4>Zonas Comunes </h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!"> Zonas Comunes</a>
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
                  
                  <h5>Listado de Zonas</h5>

                  </div>
                  
                    @can('zonascomunes-create')
                      <div class="d-flex align-items-center">
                          <a href="{{route('zonascomunes.create')}}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Zona Comun</a>
                      </div>
                    @endcan
                </div>
              </div>
                  <div class="container card-block">
                    
                    <div class="row">
                      <div class="col-md-12">
                        <!-- <div class="dt-responsive"> -->
                          <table id="simpletable" class="table table-striped table-bordered nowrap">                          
                            <thead>
                              <tr>
                               
                                <th>Zona Comun</th>         
                                <th>Descripcion</th>
                                <th>Valor</th>
                                <th>Disponible</th>
                               
                                <th></th>
                                <th></th>
                                <th></th>
                                
                                
                              </tr>
                            </thead>

                              <tbody>
                             @foreach($zonascomunes as $c)

                              <tr>
                                
                                  <td>{{$c->name}}</td>
                                  <td>{{ substr($c->description, 0,50)}}</td>
                                  <td>{{$c->valorxhora}}</td>
                                  <td>
                                    @if($c->disponible == 1)
                                      SI

                                    @else
                                        NO
                                    @endif</td>
                                  
                                
                                 

                                @can('zonascomunes-show') 
                                 <td width="5px"> 
                                    <div class="icon-btn">
                                      <a href="{{route('zonascomunes.show', $c->id)}}" class="btn btn-info btn-icon"><i class="icofont icofont-eye-alt"></i></a>
                                    </div>
                                  </td>
                                @endcan


                                @can('zonascomunes-edit') 
        
                                  <td width="5px">
                                    <div class="icon-btn">
                                      <a href="{{route('zonascomunes.edit', $c->id)}}"  class="btn btn-inverse btn-icon"><i class="icofont icofont-ui-edit"></i></a>
                                    </div>
                                  </td>   
                                @endcan
                                
                                 @can('zonascomunes-delete')
                                   <td width="5px">
                                    <div class="icon-btn">           
                                              
                                         {!! Form::open(['route' => ['zonascomunes.destroy', $c->id], 
                                          'method' => 'DELETE']) !!}
                                              <button onClick="return confirm('Desea Eliminar este Registro ?')" class="btn-danger btn btn-icon">
                                               <i class="fa fa-trash"></i>
                                             </button>                     
                                          {!! Form::close() !!}
                                             
                                                            
                                    </div>
                                  </td>

                                  @endcan
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
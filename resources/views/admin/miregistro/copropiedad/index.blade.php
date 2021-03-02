@extends('layouts.admin')

@section('content')


  <div class="page-wrapper">
        <!-- Page-header start -->
    <div class="page-header  m-t-50">
      <div class="row align-items-end">

        <div class="col-lg-8">
          <div class="page-header-title">
              <div class="d-inline">
                  <h4>Clientes / Copropiedades</h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Clientes / Copropiedades</a>
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
                  
                  <h5>Listado de Clientes</h5>

                  </div>
                  
                    @can('copropiedad-create')
                      <div class="d-flex align-items-center">
                          <a href="{{route('copropiedad.create')}}" class="btn btn-info"><i class="icofont icofont-ui-add"></i>Cliente</a>
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
                                <th>Nombre de la Copropiedad</th>
                                <th> Tipo Copropiedad</th>
                                <!-- <th>Departamento</th> -->
                                <th>Ciudad</th>
                                <th>Direccion</th>
                              
                                <th></th>
                                <th></th>
                                <th></th>
                                
                                
                              </tr>
                            </thead>

                              <tbody>
                             @foreach($copropiedades as $c)

                              <tr>
                                  <td>{{$c->name}}</td>
                                  <td>{{$c->tipocopropiedad->name}}</td>
                                  <!-- <td>{{$c->department}}</td> -->
                                  <td>{{$c->city}}</td>
                                  <td>{{$c->address}}</td>
                                 
                                  
                                
                                 

                                @can('copropiedad-show') 
                                 <td width="5px"> 
                                    <div class="icon-btn">
                                      <a href="{{route('copropiedad.show', $c->id)}}" class="btn btn-info btn-icon"><i class="icofont icofont-eye-alt"></i></a>
                                    </div>
                                  </td>
                                @endcan


                                @can('copropiedad-edit') 
        
                                  <td width="5px">
                                    <div class="icon-btn">
                                      <a href="{{route('copropiedad.edit', $c->id)}}"  class="btn btn-inverse btn-icon"><i class="icofont icofont-ui-edit"></i></a>
                                    </div>
                                  </td>   
                                @endcan
                                
                                 @can('copropiedad-destroy')
                                   <td width="5px">
                                    <div class="icon-btn">           
                                              
                                         {!! Form::open(['route' => ['copropiedad.destroy', $c->id], 
                                          'method' => 'DELETE']) !!}
                                              <button class="btn btn-danger btn-icon">
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




@endsection
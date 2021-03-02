@extends('layouts.admin')

@section('content')

<div class="main-body">
  <div class="page-wrapper">
        <!-- Page-header start -->
    <div class="page-header m-t-50">
      <div class="row align-items-end">

        <div class="col-lg-8">
          <div class="page-header-title">
              <div class="d-inline">
                  <h4>Clientes / Copropiedades</h4>
                  <h5>Ver </h5>
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('copropiedad.index')}}">Clientes / Copropiedades</a>
                    </li>

                     <li class="breadcrumb-item"><a href="#!">Ver</a>
                    </li>
              
                </ul>
            </div>
        </div>
        
       
      </div>  
    </div>

 <!-- Formulario Create -->
                 
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="row">

        <div class="col-lg-12 col-md-12 m-b-20">
          <h3 class="text-primary">{{ $copropiedad->name}}</h3>
        </div>

        
        <div class="col-sm-6">

          <div class="card">
          <div class="card-block">

               <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">{{ $copropiedad->tipocopropiedad->name}}</h6>
              
               <div class="row p-b-5">
                  <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Administrador Delegado</p>
                  <h6 class="text-muted f-w-400">{{$copUser["name"]}}</h6>
                  </div>
                  <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Email</p>
                      <h6 class="text-muted f-w-400"></h6>
                  </div>
              </div>

              <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Informacion</h6>
              <div class="row">
                  <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Dirección</p>
                      <h6 class="text-muted f-w-400">{{ $copropiedad->address}}</h6>
                  </div>
                  <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Telefono</p>
                      <h6 class="text-muted f-w-400"> {{ $copropiedad->phone_1}}</h6>
                  </div>
              </div>

              <div class="row">
                  <div class="col-sm-4">
                      <p class="m-b-10 f-w-600">Area Comun</p>
                      <h6 class="text-muted f-w-400">{{ $copropiedad->area_comun}}</h6>
                  </div>
                  <div class="col-sm-4">
                      <p class="m-b-10 f-w-600">Area Privada</p>
                      <h6 class="text-muted f-w-400"> {{ $copropiedad->area_privada}}</h6>
                  </div>
                   <div class="col-sm-4">
                      <p class="m-b-10 f-w-600">Area Total</p>
                      <h6 class="text-muted f-w-400"> {{ $copropiedad->area_total}}</h6>
                  </div>
              </div>

              
               <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Ubicacion</h6>
               <div class="row">
                  <div class="col-sm-4">
                      <p class="m-b-10 f-w-600">Departamento</p>
                      <h6 class="text-muted f-w-400">{{ $copropiedad->department}}</h6>
                  </div>
                  <div class="col-sm-4">
                      <p class="m-b-10 f-w-600">Ciudad</p>
                      <h6 class="text-muted f-w-400"> {{ $copropiedad->city}}</h6>
                  </div>

                  <div class="col-sm-4">
                      <p class="m-b-10 f-w-600">Localidad</p>
                      <h6 class="text-muted f-w-400"> {{ $copropiedad->location}}</h6>
                  </div>
              </div>
           
              
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <a href="{{route('copropiedad.index')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Regresar</a>

           
          </div>
        </div>
      </div>
            
        <div class="col-md-5 col-lg-5 m-b-5">
             
              
              <div class="box_img_profile">
                <div class="img_profile">
                 
                    @if(!$copropiedad->file)
                      <img class="img img-fluid" src="{{url('admin/images/not-found-icon-28.jpg')}}" alt="Image">

                    @else
                      
                      <img class="img img-fluid" src="{{ $copropiedad->file }}" alt="Image">
                    @endif
                </div>
            </div>
             
        </div>  


                  
            </div>
          </div>
                          
                          <!--  -->


            
</div>
      


@endsection
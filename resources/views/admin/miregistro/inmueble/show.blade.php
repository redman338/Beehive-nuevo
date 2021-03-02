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
                  <h4>Inmuebles</h4>
                  <h6>Informacion del Inmueble </h6>
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('inmueble.index')}}">Inmuebles</a>
                    </li>

                     <li class="breadcrumb-item"><a href="#!">Ver</a>
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
            <div class="card ">
              <div class="card-header ">
                
                <div class="d-flex justify-content-between bd-highlight mb-3 "> 
                  <div class="d-flex align-items-start ml-5"> 
                  
                  <h4 class="text-primary">{{ $inmueble->copropiedad->name  }}</h4>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{route('inmueble.index')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Cancelar</a>
                  </div>
                </div>
              </div>
            
                
            <div class="card-block">
                
             
              <div class="row ml-5">
                  <div class="col-md-3">
                    <img src="{{url('admin/images/icon/hotel.png')}}" class="img_icon">
                  </div>

                  <div class="col-md-6">
                    <h4>{{ $inmueble->tipoinmueble->name}}</h4>
                    <h6><strong>Nombre / Codigo : {{ $inmueble->name }}</strong></h6>
                    <h6>Bloque : {{ $inmueble->bloque->name }}</h6>
                  </div>
              </div>
             
              <hr>

              <div class="row ml-5">
                
                <div class="col-md-10">
                   <h4 class="text-primary">Datos del Propietario </h4>
                    <div class="info p-t-10">
                       <h6>Nombre completo / Razon Social : <strong> {{ $inmueble->user->name }}</strong> </h6>

                       <h6>Cedula / Nit : <strong> {{ $inmueble->user->nit }}</strong> </h6>

                       <h6>Telefono : <strong> {{ $inmueble->user->phone_1 }}</strong> </h6>

                       <h6>Email : <strong> {{ $inmueble->user->email }}</strong> </h6>


                    </div>
                 
                </div>
                 
                 
              </div>



          
                     <div class="row p-t-40">
                       <div class="col-lg-12 col-sm-12 mob-product-btn">
                            
                            <a href="{{route('inmueble.index')}}" class="btn btn-inverse waves-effect waves-inverse"><i class="icofont icofont-close f-16"></i>Regresar</a>
                            
                        </div>
                    </div>
               
                                     
              </div>
        </div>
    </div>   

  </div>
</div>

</div>
</div>
        





@endsection
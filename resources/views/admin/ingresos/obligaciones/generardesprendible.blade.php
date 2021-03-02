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
                  <h4>Gestion de Obligaciones</h4>
                  <h6>Generar Desprendible de Pago </h6>
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ url('desprendibles')}}">desprendibles</a>
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
                  
                  <h4 class="text-primary">{{ $desprendible->copropiedad->name  }}</h4>

                  </div>

                  <div class="d-flex align-items-center">
                      <a href="{{url('desprendibles')}}" class="btn btn-inverse"><i class="icofont icofont-close"></i>Cancelar</a>
                  </div>
                </div>
              </div>
            
                
            <div class="card-block">
                
             
              <div class="row ml-5">
                  <div class="col-md-3">
                    <img src="{{url('admin/images/icon/hotel.png')}}" class="img_icon">
                  </div>

                  <div class="col-md-6">
                    <h4>Inmueble : <strong>{{ $desprendible->inmueble->tipoinmueble->name }} {{ $desprendible->inmueble->name }}</strong> </h4>
                    
                    <h6>Bloque : <strong> {{ $desprendible->inmueble->bloque->name }}</strong> </h6>

                    <h6>Propietario : <strong> {{ $desprendible->inmueble->user->name }}</strong> </h6>
                
                  </div>
              </div>
             
              <hr>

              <div class="row ml-5">
                
                <div class="col-md-10">
                   <h4 class="text-primary">Datos de Facturacion </h4>
                    <div class="info p-t-10">
                      <h4>Numero de Documento: {{ $desprendible->numero_doc}}</h4>
                      
                      <h6><strong>Periodo / Año : {{ $desprendible->year->year}}</strong></h6>
                      
                      <h6>Mes Facturado : {{ $desprendible->month->name}}</h6>
                      

                       <h6>Vence : <strong> {{ $desprendible->daysinrecargo}}</strong> </h6>

                       <h6>Total : <strong>{{ number_format(
                        $desprendible->total) }}</strong> </h6>

                      <!--  <h6>Email : <strong> {{ $desprendible }}</strong> </h6> -->


                    </div>
                 
                </div>
                 
                 
              </div>
              
               <hr>
 
               <div class="row ml-5">
                <h4 class="text-primary">Descripcion de la Factura</h4>
                
                  @foreach($items as $item )
                    <div class="col-md-10 p-t-20">
                    
                    <h6> <strong>Concepto : </strong>{{ $item->concepto->name}}</h6>
                      
                    <h6> <strong>Valor : </strong>{{ number_format($item->valor)}}</h6>
                   
                    </div>
                  @endforeach
              </div>


          
                     <div class="row p-t-40">
                       <div class="col-lg-12 col-sm-12 mob-product-btn">
                            <a href="{{url('generar/desprendible', $desprendible->id)}}" class="btn btn-primary waves-effect waves-primary"><i class="icofont icofont-print f-16"></i>Generar Desprendible</a>


                            <a href="{{url('desprendibles')}}" class="btn btn-inverse waves-effect waves-inverse"><i class="icofont icofont-close f-16"></i>Regresar</a>
                            
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
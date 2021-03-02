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
                 <h4>Zonas Comunes</h4>
                
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                       <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                <li class="breadcrumb-item"><a href="{{route('reservas.index')}}">Reservas</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Zonas Comunes</a>
                    </li>
              
                </ul>
            </div>
        </div>
        
       
      </div>  
    </div>

    <!-- Page-body start -->
      <div class="page-body">
       <div class="row">
          
        @foreach($zonascomunes as $zona)

          @if($zona->disponible == 1)
          <div class="col-xl-4 col-md-6 col-sm-6 col-xs-12">
            <div class="card prod-view">
              <div class="prod-item text-center">
                 <div class="prod-img">
                      <div class="option-hover">
                         
                          <a href="{{url('reserva/zona', $zona->slug )}}" class="btn btn-primary btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
                              <i class="icofont icofont-eye-alt f-20"></i>
                          </a>
                          
                      </div>
                      <a href="{{url('reserva/zona', $zona->slug )}}" class="hvr-shrink">
                         @if($zona->file)
                          <img src="{{$zona->file}}" class="img-fluid o-hidden" alt="prod1.jpg">
                          @else
                           <img class="img img-fluid" src="{{url('admin/images/not-found-icon-28.jpg')}}" alt="Image">
                          @endif
                      </a>
                      <div class="p-new"><a href="">Reservar </a></div>
                  </div>
                          <div class="prod-info">
                              <a href="{{url('reserva/zona', $zona->slug )}}" class="txt-muted"><h4>{{$zona->name}}</h4></a>
                              <div class="m-b-10">
                                  <label class="label label-success">3.5 <i class="fa fa-star"></i></label><a class="text-muted f-w-600">14 Ratings &amp;  3 Reviews</a>
                              </div>
                              <span class="prod-price"><i class="icofont icofont-cur-dollar"></i>{{number_format($zona->valorxhora)}} </span>
                          </div>
                      </div>
                  </div>
              </div>

          @endif
        @endforeach
                                                                 
      </div>

    </div>

      <!-- Page-body end -->
  </div>


</div>

@endsection
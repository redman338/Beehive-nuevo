@extends('layouts.admin')

@section('css')
        <link rel="stylesheet" href="{{url('admin/css/home.css')}}">
        <link rel="stylesheet" href="{{url('admin/css/margenes.css')}}">
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
                  <h4>Landing </h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!"> Landing-Page</a>
                    </li>
              
                </ul>
            </div>
        </div>
        
       
      </div>  
    </div>

    <!-- Page-body start -->
          <div class="page-body">
            

            <div class="container">
              <div class="row">                 
                
                    <div class="col-md-2">
                      @if($validate == 0)
                        <a href="{{route('landing-page.create')}}" class="btn btn-md btn-primary">
                              CREAR
                        </a>
                      @endif
                    </div>
               
                    <div class="col-md-2">
                      @if($validate == 1)
                      <a href="{{route('landing-page.edit', 1)}}" class="btn btn-md btn-warning">
                        EDITAR
                      </a>
                      @endif
                    </div>

            
                  <div class="col-md-2">
                    

                      <form action="{{url('landing_eliminar')}}" method="POST">
                        @foreach($landing as $value)
                          <input type="hidden" name="id" value="{{$value->id}}">
                    
                              @csrf
                            

                            <button onClick="return confirm('Desea Eliminar el Sitio Web ?')" class="btn btn-md btn-danger">
                              ELIMINAR
                            </button>
                           
                        @endforeach
                      </form>            
                
                  </div>
              </div>

              <div class="row p-t-20">     
                <div class="col-md-10">
                <!-- LANDING TEMPLATE  -->
                    
                    @if(count($landing)>0)   
                      @include('admin.landing.partials.template')
                    @else
                      @include('admin.landing.partials.template2')
                    @endif
                <!--  -->
                </div>

                <div class="col-md-2">
                  
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
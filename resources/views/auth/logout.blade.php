@extends('layouts.app')

@section('content')

    <div class="box"></div>
   <div class="d-flex justify-content-center ">
            <div class="card card-login " style="width: 30rem;">
                
                <img src="{{url('login2/media/img/234.png')}}" class="card-img-top" >
                <div class="logoB-login">
                    <!-- <img src="./media/img/Logo_Beehive.png" class="" height="120" width="120"> -->
                    <img src="{{url('login2/media/img/Logo_Completo_Beehive2.png')}}" class="" height="50%" width="50%">
                                     
                </div>
                <div class="card-body">
                    <p class="card-title text-center text-uppercase ulogin">No puede Continuar</p>
                    <p class="card-title text-center wblogin">Por Favor Contacte al Administrador</p>
                    <p class="card-text">
                        
                      
                            <div class="form-row align-items-center">
                            
                               
                                <div class="col-8 offset-2">
                                    <label class="sr-only" for="inlineFormInputGroup"></label>
                                  
                                    <div class="input-group mb-2">
                                     
                                     
                                    </div>
                                </div>
                                <div class="col-4 offset-2">
                                    
                                </div>
                                <div class="col-4 ">
                                    
                                    
                                </div>
                                <div class="col-8 offset-2 margT10">
                                    
                                     <a class="btn btn-login mb-2 btn-lg" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      
                                            <i class="feather icon-log-out"></i> Cerrar Sesion
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                         </form>  
                                </div>
                            </div>
                         
                    </p>
                </div>
            </div>
        </div>
  

@endsection
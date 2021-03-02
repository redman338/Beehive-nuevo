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
                    <p class="card-title text-center text-uppercase ulogin">Seleccione la Copropiedad</p>
                    <p class="card-title text-center wblogin">
                           </p>
                    <p class="card-text">
                        @if(!empty($cxuserSql))    
                           {{ Form::open(['url'=>'login_copropiedad' ]) }}
                            <div class="form-row align-items-center">
                            
                                <div class="col-8 offset-2">

                                    <div class="input-group mb-2">

                                 
                                         <select id="copropiedad_id" name="copropiedad_id" class="form-control form-txt-primary form-control-primary"
                                        placeholder="-- Seleccione --"
                                        >

                                            <option value="A">-- Seleccione --</option>
                                        
                                    
                                                @if( Auth::user()->role == 1)

                                                    @foreach( $cxuserSql as $sql )
                                                    
                                                    <option value="{{ $sql->id }}">{{ $sql->name }}</option>
                                                    
                                                    
                                                    @endforeach

                                                @else
        
                                                    @foreach( $cxuserSql as $sql )
                                                    
                                                    <option value="{{ $sql->copropiedad->id }}">{{ $sql->copropiedad->name }}</option>
                                                    
                                                    
                                                    @endforeach
                                                

                                            
                                                @endif
                                            </select>
                                    </div>
                                </div>

                             
                                <div class="col-8 offset-2 margT10">
                                    <button type="submit" class="btn btn-login mb-2 btn-lg btn-block">CONTINUAR</button>
                                </div>
                            </div>
                            {{ form::close() }}

                            @else

                            <div class="col-8 offset-2 margT10">
                                <a class="btn btn-login mb-2 btn-lg btn-block" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        
                                <i class="feather icon-log-out"></i> Cerrar Sesion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>    
                                    
                                    <p>Contacte al Administrador
                                    </p>
                            </div>
                              @endif
                    </p>
                </div>
            </div>
        </div>
    

@endsection
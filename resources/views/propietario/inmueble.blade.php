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
                    <p class="card-title text-center text-uppercase ulogin">Seleccione el Inmueble</p>
                    <p class="card-title text-center wblogin">
                           </p>
                    <p class="card-text">
                        
                           {{ Form::open(['url'=>'login_inmueble', 'method'=>'POST']) }}
                            <div class="form-row align-items-center">
                            
                                <div class="col-8 offset-2">

                                    <div class="input-group mb-2">
                                         <select id="inmueble_id" name="inmueble_id" class="form-control form-txt-primary form-control-primary"
                                        placeholder="-- Seleccione --"
                                        >

                                          <option value="A">-- Seleccione --</option>
                                        
                                        @if( Auth::user()->role == 1)

                                              @foreach( $ixuserSql as $sql )
                                              
                                              <option value="{{ $sql->id }}">{{ $sql->name }}</option>
                                             
                                            
                                              @endforeach

                                          @else
  
                                             @foreach( $ixuserSql as $sql )
                                              
                                              <option value="{{ $sql->inmueble->id }}">{{ $sql->inmueble->name }}</option>
                                             
                                            
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
                    </p>
                </div>
            </div>
        </div>
    

@endsection
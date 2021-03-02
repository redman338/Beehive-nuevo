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

                @if(session('info'))
                  <div class="card-body">
                   
                      <p class="card-title text-center ulogin">
                        {{ session('info')}}
                      </p>
                      

                      <div class="col-8 offset-2 margT10">
                        <a href="{{url('/')}}" class="btn btn-login mb-2 btn-lg btn-block">CONTINUAR</a>                         
                      </div>
              
                  </div>


                @else
                  <div class="card-body">
                    <p class="card-title text-center text-uppercase ulogin">¿ Olvido su Contraseña ?</p>
                    <p class="card-title text-center wblogin">
                      Ingresa tu Correo electronico 
                    </p>
                    <p class="card-text">
                        
                        {{ Form::open([
                            'url' => 'forgotpassword', 
                            'method' => 'POST', 
                            'id'=>'changpwd'])}}

                              @csrf
                            <div class="form-row align-items-center">
                            
                                <div class="col-8 offset-2">
                                                                       
                                    <div class="input-group mb-2">

                                      <div class="form-group row">

                                        <label class="sr-only" for="inlineFormInputGroup">Password</label>

                                        <div class="col-md-2 input-group-prepend">
                                            
                                            <div class="input-group-text">
                                               <img src="{{url('login2/media/img/UserLogin.png')}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-10">
                                           <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"  placeholder="Correo Electronico" required>
                                        </div>
                                       

                                      </div>
                                    </div>
                                </div>

                               
                                <div class="col-4 offset-2">
                                   
                                </div>
                                <div class="col-4 ">
                                    
                                    
                                </div>
                                <div class="col-8 offset-2 margT10">
                                    <button type="submit" class="btn btn-login mb-2 btn-lg btn-block">CONTINUAR</button>

                                     
                                </div>
                            </div>
                            {{ form::close() }}
                    </p>
                </div>

                @endif
  

            </div>
        </div>
  

@endsection
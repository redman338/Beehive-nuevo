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
                    <p class="card-title text-center text-uppercase ulogin">Cambiar Contraseña</p>
                    <p class="card-title text-center wblogin">Por Favor Cambie su Contraseña</p>
                    <p class="card-text">
                        
                        {{ Form::open([
                            'url' => 'userverified', 
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
                                               <img src="{{url('login2/media/img/PassLogin.png')}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-10">
                                           <input type="password" class="form-control" id="password" name="password" value="{{ old('email') }}"  placeholder="Contraseña Nueva">
                                        </div>
                                       

                                      </div>
                                    </div>
                                </div>

                                <div class="col-8 offset-2">
                                    <label class="sr-only" for="inlineFormInputGroup">Confirmar Contraseña</label>
                                  
                                    <div class="input-group mb-2">
                                        
                                        <div class="form-group row">
                                          <div class="col-md-2 input-group-prepend">
                                              <div class="input-group-text">
                                                  <img src="{{url('login2/media/img/PassLogin.png')}}">
                                              </div>
                                          </div>
                                        
                                          <div class="col-md-10">
                                               <input id="password_confirm" type="password" class="form-control" id="" placeholder="Confirmar Contraseña" name="password_confirm">
                                          </div>
                                        </div>
                                     
                                         @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
            </div>
        </div>
  

@endsection
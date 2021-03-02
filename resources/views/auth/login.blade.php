@extends('layouts.app')

@section('content')

    <div class="box"></div>
   <div class="d-flex justify-content-center ">
            <div class="card card-login " style="width: 30rem;">
                
                <img src="{{url('login2/media/img/234.png')}}" class="card-img-top" >
                <div class="logoB-login">
                    <!-- <img src="./media/img/Logo_Beehive.png" class="" height="120" width="120"> -->
                    <img src="{{url('login2/media/img/Logo_Completo_Beehive2.png')}}" class="" height="50%" width="50%">
                    <a class="btn btn-light rlogin" href="#" role="button">Create Account</a>                    
                </div>
                <div class="card-body">
                    <p class="card-title text-center text-uppercase ulogin">User Login</p>
                    <p class="card-title text-center wblogin">Welcome Back</p>
                    <p class="card-text">
                        
                        {{ Form::open(['route' => 'login']) }}
                              @csrf
                            <div class="form-row align-items-center">
                            
                                <div class="col-8 offset-2 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src="{{url('login2/media/img/UserLogin.png')}}">
                                            </div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email"
                                            onkeyup="this.value = this.value.toLowerCase();">    
                                        
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                      @endif 
                                </div>

                                <div class="col-8 offset-2 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src="{{url('login2/media/img/PassLogin.png')}}">
                                            </div>
                                        </div>
                                       
                                        <input id="password" type="password" class="form-control" id="" placeholder="Password" name="password" required autocomplete="current-password" placeholder="Password">

                                         @if ($errors->has('password'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                      @endif 

                                        
                                    </div>
                                </div>

                                                             
                                <div class="col-4 offset-2">
                                    <div class="form-check mb-2 rlogin padT10">
                                        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                        <label class="form-check-label " for="autoSizingCheck">
                                            Remember
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4 ">
                                    
                                    <div class="text-center">
                                        <a href="{{url('forgotpassword')}}" class="rlogin">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="col-8 offset-2 margT10">
                                    <button type="submit" class="btn btn-login mb-2 btn-lg btn-block">LOGIN</button>
                                </div>
                            </div>
                            {{ form::close() }}
                    </p>
                </div>
            </div>
        </div>
    

@endsection
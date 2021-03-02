<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Traits\MailTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords, MailTrait; 

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showforgoForm()
    {

      return view('auth.forgotpassword');
    }


    public function fortgopass(Request $request)
    {

      $email = $request->get('email');
      $randompwd = mt_rand(10000,1000000);

      $user = User::where('email', $email)->first();
        
        if($user)
        {

          $user->password = Hash::make($randompwd) ;
          $user->user_verified = 0;
          $user->status = 0;

          if($user->update())
            { 
              $client =  new \stdClass;
              $client->name      = $user->name;
              $client->phone     = $user->phone;
              $client->email     = $user->email;
              $client->password  = $randompwd;           
              $client->subject   = "Reinicio de Contraseña";
              $client->to        = $user->email;
               
               $sendmail = $this->Sendresetpassword($client);


               $message = "Se ha enviado un Correo Electronico";
              return redirect()->route('forgotpassword')->with('info', $message);
            }

          }
        else{

              $message = "El usuario no se ha encontrado.";
              return redirect()->route('forgotpassword')->with('info', $message);
        }
        
      
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        

    public function login()
    {      

        $session = \Session::get('_token');
       
        if($session)
        {
            $copropiedad = \Session::get('_token');

            if($copropiedad)
            {
                return redirect()->route('dashboard');
            }
           
            
        }
        else{

             return view('auth.login'); 
        }
       
    }


    public function error404(){


        return view('404');
    }
}

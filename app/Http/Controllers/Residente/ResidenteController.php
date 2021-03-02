<?php

namespace App\Http\Controllers\Residente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ResidenteController extends Controller
{
    


    public function index(){

    	$user_role= auth()->user()->role;

    	if($user_role == 4)
    	{

    		return redirect()->route('cliente/propietario/residente');


    	}

    	elseif($user_role == 5) {


    		return view('residente.miregistro.create');
    	}

    	
    }
}

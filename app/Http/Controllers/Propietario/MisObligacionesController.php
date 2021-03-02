<?php

namespace App\Http\Controllers\Propietario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Invoice;
use Auth;


class MisObligacionesController extends Controller
{
    

    public function index(){

    	$user_id = Auth::User()->id;
    	$user = User::find($user_id);

    	$inmueblesSql = $user->inmuebles()
                            ->select('id', 'name')
    						->get();
    		
        foreach ($inmueblesSql as $key => $value) {
          
           $inmuebles[]=[
                
                 'key'  => $key,
                 'id'   =>$value->id , 
                 'name'  =>$value->name , 
                                
                ];
          
            }
    	
        foreach ($inmuebles as $i){

            $id = $i;
        }
        

    	dd($inmuebles, $id );
    


    	return view('propietario.misobligaciones.index');
    }
}

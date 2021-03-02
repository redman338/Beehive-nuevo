<?php

namespace App\Http\Controllers\Admin\Tablasmaestras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Department;
use App\Models\City;

class TablasmaestrasController extends Controller
{
    
    public function __construct(){

        $this->middleware('permission:tablasmaestras')->only(['index']);    
        
    
    
    }

    public function index(){

    	return view('admin.tablasmaestras.index');
    }


    public function Departament(Request $request){

            $dato  = $request->get('query');

             // $query = Department::where('name','LIKE','%'.$dato.'%')            
             //             ->get();

            $query = Department::get();

            return response()->json(
                       
                     $query->toArray()

                    );

            // return $query;

     }


     public function City(Request $request){

            $dato  = $request->get('query');
            $dato2  = $request->get('id_de');

           


             // $query = City::where('department_id', $dato2)
             //              ->where('name','LIKE','%'.$dato.'%')            
             //             ->get();


            $query = City::where('department_id', $dato2)
                            ->get();

            return response()->json(
                      
                    $query->toArray()
                     
                    );

            // return $query;

     }


    public function getsession (){

        $session = Session::all();

        dd($session);
    }

    public function clearsession (){


       // $session = session()->forget('copropiedad_id');
         //\Session::put('cart', array());
        
        \Session::forget('copropiedad');
        
         return redirect()->route('getssession');
    }
}

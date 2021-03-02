<?php

namespace App\Http\Controllers\Propietario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zonascomunes;


class ZonasComunesController extends Controller
{
    
    public function index()
    {	
    	$cop_id = \Session::get('copropiedad');

    	$zonascomunes = Zonascomunes::where('copropiedad_id', $cop_id)
    								->get();

    	return view('propietario.zonascomunes.index', compact('zonascomunes'));
    }



    public function detallezona ($slug)
    {

    	$cop_id = \Session::get('copropiedad');

    	$zona = Zonascomunes::where('copropiedad_id', $cop_id)
    						->where('slug', $slug)
    						->get();

    	return view('propietario.zonascomunes.show', compact('zona'));
    }


}

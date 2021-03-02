<?php

namespace App\Http\Controllers\Admin\zonascomunes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservas;
use App\Models\Reservastatus;
use App\Models\Zonascomunes;

class ReservasController extends Controller
{   

    
    public function __construct(){

        $this->middleware('permission:zonascomunes-create')->only(['create', 'store']);    
        $this->middleware('permission:zonascomunes-index')->only('index');
        $this->middleware('permission:zonascomunes-edit')->only(['edit','update']);
        $this->middleware('permission:zonascomunes-show')->only('show');
        $this->middleware('permission:zonascomunes-delete')->only('destroy');
    
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $cop_id =  \Session::get('copropiedad');

        $reservas = Reservas::orderBy('id', 'desc')
                            ->where('copropiedad_id', $cop_id)
                            ->get();


        return view('admin.reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $cop_id = \Session::get('copropiedad');

        if($cop_id > 0 )
        {
            $zonascomunes = Zonascomunes::where('copropiedad_id', $cop_id)->get();

            return view('admin.reservas.create', compact('zonascomunes'));

        }
        else {


            return redirect()->route('dashboard/perfil');

        }


      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $cop_id = \Session::get('copropiedad');

        if($cop_id > 0 )
        {

            $reserva = Reservas::where('cop_id', $cop_id)
                                ->where('id', $id)
                                ->first();

            $zona_id = $reserva->zonacomun_id;

            $reservaUser = array(
                    'name' => $reserva->user->name,
                    'id'   =>  $reserva->user->id,
                    'phone' =>  $reserva->user->phone,
                    'email' =>  $reserva->user->email,
            );

        
            $zonacomun = Zonascomunes::findOrFail($zona_id);

        
            $reservastatus = Reservastatus::get();

            $rstatus = [];

            foreach($reservastatus as $r)
            {
                $rstatus[$r->id] = $r->name; 
            }
            return view('admin.reservas.show', compact('rstatus', 'zonacomun', 'reservaUser', 'reserva'));

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       

        $reserva = Reservas::findOrFail($id);

        $zona_id = $reserva->zonacomun_id;

        $reservaUser = array(
                'name' => $reserva->user->name,
                'id'   =>  $reserva->user->id,
                'phone' =>  $reserva->user->phone,
                'email' =>  $reserva->user->email,
        );

       
        $zonacomun = Zonascomunes::findOrFail($zona_id);

    
        $reservastatus = Reservastatus::get();

        $rstatus = [];

        foreach($reservastatus as $r)
        {
            $rstatus[$r->id] = $r->name; 
        }
        return view('admin.reservas.edit', compact('rstatus', 'zonacomun', 'reservaUser', 'reserva'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $reserva = Reservas::findOrFail($id);

        $reserva->reservastatus_id = $request->get('reservastatus_id');
       

        if( $reserva->save())
        {
            $message = "Actualizado Correctamente";


            return redirect()->route('reservas.index')->with('info', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Reserva($slug)
    {
        $cop_id = \Session::get('copropiedad');

        $session = \Session::put(['inmueble' => 00]);
        $session = \Session::put(['inmueble_name' => 'Administrador']);
    	 
        $zona = Zonascomunes::where('copropiedad_id', $cop_id)
                           ->where('slug', $slug)
                           ->select('id', 'name', 'slug')
                           ->get();

        return view('admin.reservas.reserva', compact('zona'));
    }
}

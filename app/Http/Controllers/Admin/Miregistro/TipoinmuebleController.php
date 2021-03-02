<?php

namespace App\Http\Controllers\Admin\Miregistro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tipoinmueble;
use Auth;

class TipoinmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('permission:tipoinmueble-create')->only(['create', 'store']);    
        $this->middleware('permission:tipoinmueble-index')->only('index');
        $this->middleware('permission:tipoinmueble-edit')->only(['edit','update']);
        $this->middleware('permission:tipoinmueble-show')->only('show');
        $this->middleware('permission:tipoinmueble-destroy')->only('destroy');
    
    
    }
    
    public function index()
    {
        
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;
        $cop_id = \Session::get('copropiedad');
        

        if($cop_id > 0){

            $tipoinmueble = Tipoinmueble::where('copropiedad_id', $cop_id)
                                ->get();
                      

            return view('admin.miregistro.tipoinmueble.index', compact('tipoinmueble'));
            
         }
         else {
            
            return redirect()->route('dashboard/perfil');

        }


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $user_id = Auth::user()->id;
        $cop_id = \Session::get('copropiedad');
        

        if($cop_id > 0){

            return view('admin.miregistro.tipoinmueble.create');
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
       
        $user_role = Auth::user()->role;
        $cop_id = \Session::get('copropiedad');

       if($cop_id > 0)
        {   
                $tipoinmueble = Tipoinmueble::create([
                
                'name'          =>$request->get('name'),
                'description'   =>$request->get('description'),
                'copropiedad_id' => $cop_id,

                 ]);
            $message = $tipoinmueble ? 'Registro Creado Correctamente' : 'Error al Crear';

            return redirect()->route('tipoinmueble.index')->with('info', $message);
        }
       
         else {

            
             return redirect()->route('dashboard/perfil');
            
       }

    
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
        
        if($cop_id > 0){
            
            $tipoinmueble = Tipoinmueble::findOrFail($id);

        return view('admin.miregistro.tipoinmueble.show', compact('tipoinmueble'));


        }

        else {

            return redirect()->route('dashboard/perfil');
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
         $cop_id = \Session::get('copropiedad');
        
        if($cop_id > 0){

            $tipoinmueble = Tipoinmueble::findOrFail($id);

            return view('admin.miregistro.tipoinmueble.edit', compact('tipoinmueble'));

         }

        else {

            return redirect()->route('dashboard/perfil');
        }
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
        $tipoinmueble = Tipoinmueble::findOrFail($id);

        $tipoinmueble->update($request->all());
        
        return redirect()->route('tipoinmueble.index')->with('info', 'Registro Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoinmueble = Tipoinmueble::findOrFail($id);
        
        $delete = $tipoinmueble->delete();
        $message = $delete ? 'Registro Eliminado Correctamente' : 'Error al eliminar';


        return redirect()->route('tipoinmueble.index')->with('info', $message);
    }
}

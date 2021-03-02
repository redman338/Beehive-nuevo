<?php

namespace App\Http\Controllers\Admin\Miregistro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bloques;
use App\Models\Copropiedad;
use Auth;


class BloquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('permission:bloques-create')->only(['create', 'store']);    
        $this->middleware('permission:bloques-index')->only('index');
        $this->middleware('permission:bloques-edit')->only(['edit','update']);
        $this->middleware('permission:bloques-show')->only('show');
        $this->middleware('permission:bloques-destroy')->only('destroy');
    
    
    }

    
    public function index()
    {   
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;
        $cop_id = \Session::get('copropiedad'); 

       
        if($cop_id > 0){
            
            $cop_id = \Session::get('copropiedad');            
            $bloques = Bloques::where('copropiedad_id', $cop_id)
                                ->get();
                      

            return view('admin.miregistro.bloques.index', compact('bloques'));
            
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
       $user_role = Auth::user()->role;
       $cop_id = \Session::get('copropiedad'); 
         if($cop_id > 0){

               $cop_id = \Session::get('copropiedad');
                $CopSql = Copropiedad::select('id', 'name')
                                ->where('id', $cop_id)
                                ->get();

                return view('admin.miregistro.bloques.create', compact('CopSql'));
            
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

         if($cop_id > 0){


             $bloques = Bloques::create([

                    'copropiedad_id'    =>$cop_id,
                    'name'              =>$request->get('name'),
                    'description'       =>$request->get('description'),

                ]);

             return redirect()->route('bloques.index')->with('info', 'Registro Creado con Exito');

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

        $user_role = Auth::user()->role;
        $cop_id = \Session::get('copropiedad');


       
        if($cop_id > 0){
            
            $bloques = Bloques::findOrFail($id);
    
            return view('admin.miregistro.bloques.show')->with('bloque', $bloques);

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
        $user_role = Auth::user()->role;
        $cop_id = \Session::get('copropiedad');

        if($cop_id > 0){
            
            $bloques = Bloques::findOrFail($id);

            return view('admin.miregistro.bloques.edit')->with('bloque', $bloques);

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
        $bloque = Bloques::findOrFail($id);

        $bloque->update($request->all());
        
        return redirect()->route('bloques.index')->with('info', 'Registro Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $bloque = Bloques::find($id);        
        $bloque->delete();     

        $message = $bloque ? 'Bloque Eliminado Correctamente' : 'Error al Procesar';

        return redirect()->route('bloques.index')->with('info', $message);
    }
}

<?php

namespace App\Http\Controllers\Admin\Miregistro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tipocopropiedad;

class TipocopropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){

        $this->middleware('permission:tipocopropiedad-create')->only(['create', 'store']);    
        $this->middleware('permission:tipocopropiedad-index')->only('index');
        $this->middleware('permission:tipocopropiedad-edit')->only(['edit','update']);
        $this->middleware('permission:tipocopropiedad-show')->only('show');
        $this->middleware('permission:tipocopropiedad-destroy')->only('destroy');
    
    
    }
    public function index()
    {   
        
        $tipocopropiedad = Tipocopropiedad::get();


        return view('admin.miregistro.tipocopropiedad.index', compact('tipocopropiedad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.miregistro.tipocopropiedad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipocopropiedad = Tipocopropiedad::create($request->all());


        return redirect()->route('tipocopropiedad.index')->with('info', 'Registro Creado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipocopropiedad = Tipocopropiedad::findOrFail($id);
        

        return view('admin.miregistro.tipocopropiedad.show', compact('tipocopropiedad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipocopropiedad = Tipocopropiedad::findOrFail($id);

        return view('admin.miregistro.tipocopropiedad.edit', compact('tipocopropiedad'));
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
        $tipocopropiedad = Tipocopropiedad::findOrFail($id);

        $tipocopropiedad->update($request->all());
        
        return redirect()->route('tipocopropiedad.index')->with('info', 'Registro Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $tipocopropiedad = Tipocopropiedad::findOrFail($id);
        $delete = $tipocopropiedad->delete();
        $message = $delete ? 'Registro Eliminado Correctamente' : 'Error al eliminar';


        return redirect()->route('tipocopropiedad.index')->with('info', $message);
    }
}

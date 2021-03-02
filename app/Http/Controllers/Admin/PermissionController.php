<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('permission:permissions.create')->only(['create', 'store']);    
        $this->middleware('permission:permissions.index')->only('index');
        $this->middleware('permission:permissions.edit')->only(['edit','update']);
        $this->middleware('permission:permissions.show')->only('show');
        $this->middleware('permission:permissions.destroy')->only('destroy');
    
    
    }

    public function index()
    {
        $permissions = Permission::all();


        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $permissions = Permission::create($request->all());

          $message = $permissions ? "Permiso Guardado con Exito" : "Error ";

          return redirect()->route('permissions.index')
            ->with('info', $message);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
          return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {   
        try{
         $permission->update($request->all());

                 $message = "Permiso Actualizado con Exito";
        }
       
        
        catch (\Illuminate\Database\QueryException $e){
                 $message = "error".$e->getMessage() ;
        }
        
                
         return redirect()->route('permissions.index')
            ->with('info', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Permission $permission)
    {
        $permission->delete();

        return back()->with('info', 'Eliminado Correctamente');
    }
}

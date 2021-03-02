<?php

namespace App\Http\Controllers\Admin\zonascomunes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zonascomunes;
use App\User;
use Auth;


class ZonasComunesController extends Controller
{
    

    public function __construct(){

        $this->middleware('permission:zonascomunes-create')->only(['create', 'store']);    
        $this->middleware('permission:zonascomunes-index')->only('index');
        $this->middleware('permission:zonascomunes-edit')->only(['edit','update']);
        $this->middleware('permission:zonascomunes-show')->only('show');
        $this->middleware('permission:zonascomunes-delete')->only('destroy');
    
    
    }


    public function index()
    {   

        $auth_role = Auth::User()->role;

        $cop_id = \Session::get('copropiedad');

        if($cop_id > 0 )
        {
            $zonascomunes = Zonascomunes::where('copropiedad_id', $cop_id)->get();

             return view('admin.zonascomunes.index', compact('zonascomunes'));
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
       
       $auth_role = Auth::User()->role;

       $cop_id = \Session::get('copropiedad');

       if($cop_id  > 0){

            return view('admin.zonascomunes.create');

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
     
        $cop_id = \Session::get('copropiedad');

        $zonascomunes = Zonascomunes::create([

            'name'              => $request->get('name'),
            'description'       => $request->get('description'),
            'valorxhora'        => $request->get('valorxhora'),
            'disponible'        => $request->get('disponible'),
            'notas'             => $request->get('notas'),
            'copropiedad_id'    => $cop_id,
            'slug'              => $cop_id.'_'.str_slug($request->get('name')),

        ]);

        if($request->file('file')){


            $file = $request->file('file');
            $fname = $file->getClientOriginalName();
            $filename = $cop_id.'_'.$fname;
            $file->move('uploads/zonascomunes', $filename);
            $fnsave = 'uploads/zonascomunes'.'/'.$filename;

            $zonascomunes -> fill(['file'=>asset('/'.$fnsave)])->save();


           
        }

         $message = $zonascomunes ?'Registro Creado Correctamente':'Error al Crear complete los campos obligatorios'; 
        

         return redirect()->route('zonascomunes.index')->with('info', $message);
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

        $zonacomun = Zonascomunes::findOrFail($id);

        $validate_cop = $zonacomun->copropiedad_id;

        if($cop_id == $validate_cop)
        {

            return view('admin.zonascomunes.show')->with('zonacomun', $zonacomun);
        }

        else

        {

            return view('404');

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

        $zonacomun = Zonascomunes::findOrFail($id);

        $validate_cop = $zonacomun->copropiedad_id;

        if($cop_id == $validate_cop)
        {

            return view('admin.zonascomunes.edit')->with('zonacomun', $zonacomun);
        }

        else

        {

            return view('404');

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
       $zonacomun = Zonascomunes::findOrFail($id);
       $cop_id = $zonacomun->copropiedad_id;

       $zonacomun->update($request->all());
        
        
        if($request->file('file')){

           $file = $request->file('file');
            $fname = $file->getClientOriginalName();
            $filename = $cop_id.'_'.$fname;
            $file->move('uploads/zonascomunes', $filename);
            $fnsave = 'uploads/zonascomunes'.'/'.$filename;

            $zonacomun -> fill(['file'=>asset('/'.$fnsave)])->save();

        }

        return redirect()->route('zonascomunes.index')->with('info', 'Registro Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zonascomunes = Zonascomunes::findOrFail($id);

        $zonascomunes->delete();

         return redirect()->route('zonascomunes.index')->with('info', 'Registro Eliminado con Exito');

    }
}

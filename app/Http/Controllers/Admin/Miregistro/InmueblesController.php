<?php

namespace App\Http\Controllers\Admin\Miregistro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InmuebleStoreRequest;
use App\Models\Inmueble;
use App\Models\Copropiedad;
use App\Models\Profile;
use Caffeinated\Shinobi\Models\Role;
use App\Models\Bloques;
use App\Models\Tipoinmueble;
use App\Models\Copropiedadxusers;
use App\Models\Inmueblexusers;
use App\Traits\MailTrait;
use App\User;
use Auth;

class InmueblesController extends Controller
{   

    use MailTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('permission:inmueble-create')->only(['create', 'store']);    
        $this->middleware('permission:inmueble-index')->only('index');
        $this->middleware('permission:inmueble-edit')->only(['edit','update']);
        $this->middleware('permission:inmueble-show')->only('show');
        $this->middleware('permission:inmueble-destroy')->only('destroy');
    
    
    }

    
    public function index()
    {   
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;
        $cop_id = \Session::get('copropiedad'); 
        
       
          if($cop_id > 0){

            $cop_id = \Session::get('copropiedad');
            
            $copropiedad = Copropiedad::select('id', 'name')
                                        ->where('id', $cop_id)
                                        ->get();
                      
           
            $inmuebles = Inmueble::where('copropiedad_id', $cop_id)->get();

            return view('admin.miregistro.inmueble.index', compact('inmuebles', 'copropiedad'));
            
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
           
            $copropiedad = Copropiedad::select('id', 'name')
                                        ->where('id', $cop_id)
                                        ->get();
                        
            $BloqueSql = Bloques::where('copropiedad_id',$cop_id)->get();
            $bloques = [];        
            foreach($BloqueSql as $blo){           
                $bloques[$blo->id] = $blo->name;
            }

            $TipoinmuebleSql = Tipoinmueble::where('copropiedad_id', $cop_id)->get();       
            $tipoinmuebles = [];        
            foreach($TipoinmuebleSql as $tipoi){           
                $tipoinmuebles[$tipoi->id] = $tipoi->name;
            }


             $roleSql = Role::whereBetween('id', [$user_role + 1 , 6] )->get();
             $roles=[] ;
                 foreach($roleSql as $role){           
                    $roles[$role->id] = $role->name;
                }

            return view('admin.miregistro.inmueble.create', compact('copropiedad', 'bloques', 'tipoinmuebles', 'roles'));
            
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
    public function store(InmuebleStoreRequest $request)
    {   

        $cop_id = \Session::get('copropiedad');         
        $auth_user = Auth::user()->id;
        $user_role = Auth::user()->role;

           if($cop_id > 0){


                $user_id    = $request->get('user_id');
                   $inmueble = Inmueble::create([

                        'copropiedad_id'    =>$cop_id,
                        'user_id'           =>$user_id,
                        'tipoinmueble_id'   =>$request->get('tipoinmueble_id'),
                        'name'              =>$request->get('name'),
                        'bloque_id'         =>$request->get('bloque_id'),
                        'description'       =>$request->get('description'),

                    ]);

                $inmueblexuser =  Inmueblexusers::create([

                        'copropiedad_id'    =>$cop_id,
                        'user_id'           =>$user_id,
                        'inmueble_id'       =>$inmueble->id,  

                    ]);

            }

                       
            $message = $inmueble ? 'Registro Creado Correctamente' : 'Error al Crear'; 
               
        return redirect()->route('inmueble.index')->with('info', $message);
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

       if($cop_id > 0)
        {

            $inmueble = Inmueble::findOrFail($id); 
            $inmueble_copid = $inmueble->copropiedad_id;

            if($cop_id == $inmueble_copid)
            {
                 return view('admin.miregistro.inmueble.show', compact('inmueble'));
            }
            else{

                return redirect()->route('404');
            }
           
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

          $user_role = Auth::user()->role;

        
        if($cop_id > 0)
        {

            $inmueble = Inmueble::findOrFail($id);
            $inmueble_copid = $inmueble->copropiedad_id;

            if($inmueble_copid == $cop_id)
            {
                                

        
                $BloqueSql = Bloques::where('copropiedad_id',$cop_id)->get();    
                $bloques = [];        
                foreach($BloqueSql as $blo){           
                    $bloques[$blo->id] = $blo->name;
                    }

            
                $TipoinmuebleSql = Tipoinmueble::where('copropiedad_id',$cop_id)->get(); 
                $tipoinmuebles = [];        
                foreach($TipoinmuebleSql as $tipoi){           
                    $tipoinmuebles[$tipoi->id] = $tipoi->name;
                    }

             $roleSql = Role::whereBetween('id', [$user_role + 1 , 6] )->get();
             $roles=[] ;
                 foreach($roleSql as $role){           
                    $roles[$role->id] = $role->name;
                }
                
                return view('admin.miregistro.inmueble.edit', compact('inmueble', 'tipoinmuebles', 'bloques', 'roles'));
            }

            else{

                return view('404');
            }
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
        $cop_id = \Session::get('copropiedad');

        $inmueble = Inmueble::findOrFail($id);
        $user_id = $inmueble->user_id;        
        $inmueble->update($request->all());


        $inmueblexuserSql = Inmueblexusers::where('inmueble_id', $id)
                                            ->where('user_id', $user_id)
                                            ->get();
        
        if(count($inmueblexuserSql)>0)
        {
            $ixu = [];
            foreach($inmueblexuserSql as $t){           
                $ixu = $t->id;
            }

            
            $ixuser = Inmueblexusers::findOrFail($ixu);
            $ixuser->user_id = $request->get('user_id');
            $ixuser->save();

        }
        else{

             $inmueblexuser =  Inmueblexusers::create([

                        'copropiedad_id'    =>$cop_id,
                        'user_id'           =>$request->get('user_id'),
                        'inmueble_id'       =>$inmueble->id,  

                    ]);
        }
       

        return redirect()->route('inmueble.index')->with('info', 'Registro Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inmueble = Inmueble::find($id);        
      
        $inmueble->delete();      

        $message = $inmueble ? 'Inmueble Eliminado Correctamente' : 'Error al Procesar';

        return redirect()->route('inmueble.index')->with('info', $message);
    }


    public function notificable($inmueble_id, $user_id)
    {

        $user = User::findOrFail($user_id);

        $user_verified = $user->user_verified;
        
        if($user_verified == 0)
        {    
                $useremail = $user->email;
                $username = $user->name;
                $userpwd =  $user->pwd_temp;

        }

        else {

                $useremail = $user->email;
                $username = $user->name;
                $userpwd =  '';
        }
                
        $subjet = 'Bienvenido a Beehive'; 
        $this->sendmail($useremail, $subjet, $username, $userpwd);
        

    }
}

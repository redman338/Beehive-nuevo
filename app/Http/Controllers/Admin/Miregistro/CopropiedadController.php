<?php

namespace App\Http\Controllers\Admin\Miregistro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CopropiedadStoreRequest;
use App\Http\Requests\CopropiedadUpdateRequest;
use App\Models\Copropiedad;
use App\Models\Tipocopropiedad;
use App\Models\Copropiedadxusers;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use Auth;
use App\Traits\MailTrait;

class CopropiedadController extends  Controller 
{   

    use MailTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('permission:copropiedad-create')->only(['create', 'store']);    
        $this->middleware('permission:copropiedad-index')->only('index');
        $this->middleware('permission:copropiedad-edit')->only(['edit','update']);
        $this->middleware('permission:copropiedad-show')->only('show');
        $this->middleware('permission:copropiedad-destroy')->only('destroy');
        
    }

    public function index()
    {   
        if(\Auth::user()->role == 1){

             $copropiedades = Copropiedad::get();
        }

       else {

        $copropiedades = Copropiedad::where('parent_id', \Auth::user()->id)->get();
            
       }
       
       return view('admin.miregistro.copropiedad.index', compact('copropiedades'));
              
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $user_role = Auth::user()->role;
        
        $TipocSql = Tipocopropiedad::get();        
        $tipocp = [];        
        foreach($TipocSql as $t){           
            $tipocp[$t->id] = $t->name;
        }

        $roleSql = Role::whereBetween('id', [$user_role + 1 , 4] )->get();
             $roles=[] ;
                 foreach($roleSql as $role){           
                    $roles[$role->id] = $role->name;
                }


        return view('admin.miregistro.copropiedad.create', compact('tipocp', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CopropiedadStoreRequest $request)
    {   
        //($request);

        //Auth User
        $auth_user = Auth::user()->id;
        
        $user_id        = $request->get('user_id');
        $area_comun     = $request->get('area_comun');
        $area_privada   = $request->get('area_privada');
        $area_total     = $area_comun + $area_privada;

        $copropiedad = Copropiedad::create([

            'name'          =>$request->get('name'),
            'address'       =>$request->get('address'),
            'location'      =>$request->get('location'),
            'city'          =>$request->get('city'),
            'department'    =>$request->get('department'),
            'country'       =>$request->get('country'),
            'tipocopropiedad_id'   =>$request->get('tipocopropiedad_id'),
            'description'   =>$request->get('description'),
            'tipoadministracion_id'=>$request->get('tipoadministracion_id'),
            'user_id'       =>$user_id,
            'status_id'     =>$request->get('status_id'),
            'parent_id'     =>$auth_user,
            'area_comun'    =>$area_comun,
            'area_privada'  =>$area_privada,
            'area_total'    =>$area_total,
            
            ]);

            $copropiedad_id = $copropiedad->id;
            $copropiedad->fill([
                    'codigo' => $copropiedad_id.'0',
                ])->save();

            $copxprofile = copropiedadxusers::create([

                'copropiedad_id' => $copropiedad_id,
                'user_id'        => $user_id,
 
            ]);

            

            $message = $copropiedad ?'Registro Creado Correctamente':'Error al Crear complete los campos obligatorios'; 
        
           $session = \Session::put(['copropiedad' => $copropiedad_id]);
       
        if($request->file('file')){

            $file = $request->file('file');
            $fname = $file->getClientOriginalName();
            $filename = $copropiedad_id.'_'.$fname;

            $file->move('uploads/copropiedades', $filename);
            $fnsave = 'uploads/copropiedades'.'/'.$filename;
            
            $copropiedad->fill(['file'=>asset('/'.$fnsave)])->save();

        }

        return redirect()->route('copropiedad/upload/file')
                     ->with('info', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $copropiedad = Copropiedad::findOrFail($id);
        $copUserSql = $copropiedad->user;
        
        if(!empty($copUserSql))
        {
            $copUser = $copUserSql;
        }
        else{
            $copUser = array(

                "name" => "Sin administrador"
            );
        }
       
         if(\Auth::user()->role === 1){ 
       
            $ProfileSql = User::get(); 

        }

        else{

               $ProfileSql = User::where('parent_id', Auth::user()->id);  

            }

                
        $profiles = [];        
        foreach($ProfileSql as $profile){           
            $profiles[$profile->id] = $profile->name;
        }


        $TipocSql = Tipocopropiedad::get();        
        $tipocp = [];        
        foreach($TipocSql as $t){           
            $tipocp[$t->id] = $t->name;
        }

        return view('admin.miregistro.copropiedad.show', compact('copUser','copropiedad', 'tipocp', 'profiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        

        $TipocSql = Tipocopropiedad::get();        
        $tipocp = [];        
        foreach($TipocSql as $t){           
            $tipocp[$t->id] = $t->name;
        }

         $user_role = Auth::user()->role;
        
 
        $roleSql = Role::whereBetween('id', [$user_role + 1 , 4] )->get();
             $roles=[] ;
                 foreach($roleSql as $role){           
                    $roles[$role->id] = $role->name;
                }



        $copropiedad = Copropiedad::findOrFail($id);

        $user_id = $copropiedad->user_id;
        $user_id = User::find($user_id);

       
        if($user_id)
        {

            $user = $user_id;
        }
        else
        {
            $user = '';
        }
                

        return view('admin.miregistro.copropiedad.edit', compact('copropiedad', 'tipocp', 'roles', 'user'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CopropiedadUpdateRequest $request, $id)
    {   

        $user_id = $request->get('user_id');
        $copropiedad = Copropiedad::findOrFail($id);

        $copropiedad->update($request->all());
        
        
        $copropiedadxusers = copropiedadxusers::where('copropiedad_id', $id)
                                                ->where('user_id', $user_id)
                                                ->get();
        if(count($copropiedadxusers)>0)
        {
            $cxu = [];
            foreach($copropiedadxusers as $t){           
                $cxu = $t->id;
            }

            $cxuser = copropiedadxusers::findOrFail($cxu);
            $cxuser->user_id = $request->get('user_id');
            $cxuser->save();

        }
        else{

            $newcxuser = copropiedadxusers::create([

                'copropiedad_id' => $id,
                'user_id'        => $user_id,
            ]);
        }
        

        return redirect()->route('copropiedad.index')->with('info', 'Registro Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $copropiedad = Copropiedad::find($id);        
       
        $copropiedad->delete();

        $message = $copropiedad ? 'Registro Eliminado Correctamente' : 'Error al Procesar';

        return redirect()->route('copropiedad.index')->with('info', $message);
    }

     public function delete($id)
    {
        $profile = Profile::find($id);        
        $user_id = $profile->user_id;
        $profile->delete();

        $user = User::find($user_id);

        $user->delete();

        

        $message = $user ? 'Usuario Eliminado Correctamente' : 'Error al Procesar';

        return redirect()->route('userdetails.index')->with('info', $message);
    }


    public function notificable($copropiedad_id, $user_id)
    {

        $user = User::findOrFail($user_id);

        $user_verified = $user->user_verified;
        
        if($user_verified == 0)
        {    
               
            $client = new \stdClass;
           
            $client->name      = $user->name;
            $client->phone     = $user->phone;
            $client->email     = $user->email;
            $client->password  = $user->pwd_temp;           
            $client->subject   = "Bienvenido A Beehive";
            $client->to        = $user->email;
           

            $this->sendmail($client);
        }

        else {

            $client = new \stdClass;
           
            $client->name      = $user->name;
            $client->phone     = $user->phone;
            $client->email     = $user->email;
            $client->subject   = "Bienvenido A Beehive";
            $client->to        = $user->email;

             $this->WelcomeNewuser($client);
        }
     
       
        

    }


    public function testemail($user_id)
    {

        $user = User::findOrFail($user_id);

        $user_verified = $user->user_verified;
        $useremail = $user->email;


            if($user_verified == 0 )
            {   
                
                $userename      =  $user->name;
                $userepassword  =  $user->pwd_temp;
            }
            else{
               
                $userename      =  $user->name;
            }
        

            $subjet = 'Bienvenido a Beehive'; 


            $this->sendmail($subjet, $useremail, $userename, $userepassword);

    }

    public function uploadfile(){


        $copropiedad  = \Session::get('copropiedad');
        
        return view('admin.miregistro.copropiedad.uploadfile', compact('copropiedad'));
    }

    public function uploadingfile(Request $request)
    {

        $copropiedad_id = $request->get('copropiedad');
        $copropiedad = Copropiedad::findOrFail($copropiedad_id);

        if($request->file('file')){

            $file = $request->file('file');
            $fname = $file->getClientOriginalName();
            $filename = $copropiedad_id.'_'.$fname;

            $file->move('uploads/copropiedades', $filename);
            $fnsave = 'uploads/copropiedades'.'/'.$filename;
            

            $copropiedad->fill(['file'=>asset('/'.$fnsave)])->save();

        }

          return response()->json($request);

    }

    public function editfile($id)
    {

        $copropiedad = $id;
        
        return view('admin.miregistro.copropiedad.uploadfile', compact('copropiedad'));
       
    }

}

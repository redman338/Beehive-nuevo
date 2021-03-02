<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UsersUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Status;
use App\Models\copropiedadxusers;
use App\Models\bxuser_x_copropiedads;
use App\Models\Role_user;
use App\Models\Copropiedad;
use Caffeinated\Shinobi\Models\Role;
use App\Traits\MailTrait;
use Validator;
use Auth;

class UsersController extends Controller
{   

   use MailTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('Admin');
    }

    public function index()
    {   
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;

        if($user_role == 1)
        {

              $users = User::get();

             return view('admin.users.index', compact('users'));


        }

        else {

            $users = User::where('parent_id', $user_id )
                        ->get();



            return view('admin.users.index', compact('users'));
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

        if($user_role == 1){

            $roleSql = Role::get();
        }

        else{

            $roleSql = Role::whereBetween('id', [$user_role + 1 , 6] )->get();
        }
            
               
        $roles=[] ;
         foreach($roleSql as $role){           
            $roles[$role->id] = $role->name;
        }

        $statusSql = Status::get();
        $status=[] ;
         foreach($statusSql as $st){           
            $status[$st->id] = $st->name;
        }

        return view('admin.users.create', compact('roles', 'status'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {    

        $user_id = Auth::user()->id;

        $role = $request->get('role');
       
         $user = User::Create([

            'name'          =>strtoupper($request->get('name')),
            'email'         =>$request->get('email'),
            'password'      =>bcrypt($request->get('password')),
            'role'          =>$request->get('role'),
            'status'        =>$request->get('status'),
            'parent_id'     =>$user_id,
          
            ]);

         $saverole = Role_user::Create([

            'role_id' => $role,
            'user_id' => $user->id,
            ]);        

            $message = $user ? 'Usuario Creado Correctamente' : 'Error al Procesar';

        return redirect()->route('users.index')->with('info', $message);
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {   
     
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        $roleSql = Role::get();
        $roles=[] ;
         foreach($roleSql as $role){           
            $roles[$role->id] = $role->name;
        }

        $statusSql = Status::get();
        $status=[] ;
         foreach($statusSql as $st){           
            $status[$st->id] = $st->name;
        }

        return view('admin.users.edit', compact('user', 'status', 'roles'));
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
        $password = $request->get('password');

        $user = User::findOrFail($id);
        $user->name     = strtoupper($request->get('name'));
        $user->email    = $request->get('email');
        $user->role     = $request->get('role');
        $user->status   = $request->get('status');
       
        if( $password ){
            
            $user->password = bcrypt($password); 
        }

        $user->update();

        $roles= Role_user::Where('user_id', $id)->get();

        foreach ($roles as $r) {           
            $role_id = $r->id;
        }
        
        $role = Role_user::findOrFail($role_id);       
        $role->role_id = $request->get('role');          
        $role->update();

        return redirect()->route('users.index')->with('info', 'Usuario Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();

        $message = $user ? 'Usuario Eliminado Correctamente' : 'Error al Procesar';

        return redirect()->route('users.index')->with('info', $message);
    }


    public function delete($id)
    {
        $user = User::findOrFail($id)->delete();

        $message = $user ? 'Usuario Eliminado Correctamente' : 'Error al Procesar';

        return redirect()->route('userdetails.index')->with('info', $message);
    }


    public function configuracion($id)
    {   
        
        $user = User::findOrFail($id);

         if(\Auth::user()->role === 1){ 
    
            $roleSql = Role::get();
            
         }
        else{

            $roleSql = Role::whereBetween('id', [\Auth::user()->role + 1 , 6])->get();
        }

       
        $roles=[] ;
         foreach($roleSql as $role){           
            $roles[$role->id] = $role->name;
        }

        $statusSql = Status::get();
        $status=[] ;
         foreach($statusSql as $st){           
            $status[$st->id] = $st->name;
        }

        return view('admin.users.newuser', compact('user', 'roles', 'status'));
    }


    public function showuser($id)
    {   
         $user_id = Auth::user()->id;
         $user_role = Auth::user()->role;

        
         if( $user_role == 1){ 
    
            $roleSql = Role::get();
            $user = User::findOrFail($id);
           }

          else{

             $user = User::where('id', $id)
                          ->where('parent_id', $user_id)
                          ->first();
                
              $roleSql = Role::whereBetween('id', [\Auth::user()->role + 1 , 6])->get();
          }

       
          $roles=[] ;
           foreach($roleSql as $role){           
              $roles[$role->id] = $role->name;
          }

          $statusSql = Status::get();
          $status=[] ;
           foreach($statusSql as $st){           
              $status[$st->id] = $st->name;
          }
     
        return view('admin.users.edituser', compact('user', 'roles', 'status'));
    }


    public function edituser($id)
    {   

         $user = User::findOrFail($id);

        if(\Auth::user()->role === 1){ 
    
            $roleSql = Role::get();
            
         }
        else{

           $roleSql = Role::whereBetween('id', [\Auth::user()->role + 1 , 6])->get();
        }

        $roles=[] ;
             foreach($roleSql as $role){           
                $roles[$role->id] = $role->name;
            }


        $statusSql = Status::get();
        $status=[] ;
         foreach($statusSql as $st){           
            $status[$st->id] = $st->name;
        }
     
        return view('admin.users.edituser', compact('user', 'roles', 'status'));
    }


     public function savenewuser(Request $request)
    {   

         //Auth User
        $auth_user = Auth::user()->id;
        $cop_id =  \Session::get('copropiedad');

         //Role
        $role       = $request->get('role');
      
        //User
        $user_id    = $request->get('user_id');
        $randompwd = mt_rand(10000,1000000);

        $user =  User::findOrFail($user_id);         
        $user->name         = $request->get('name');    
        $user->email        = $request->get('email');
        $user->password     = Hash::make($randompwd);
        $user->role         = $role;
        $user->status       = $request->get('status');   
        $user->parent_id    = $auth_user;   
        $user->update();   
          

        //Guardando el Rol          
        $saverole = Role_user::Create([

            'role_id' => $role,
            'user_id' => $user_id,
        ]);
        
            if(!empty($cop_id))
            {
                $copxuser = $this->Copxuser($user_id);
            }

        $this->notificable($user_id, $randompwd);

        $message = $user ? 'Usuario Configurado Correctamente' : 'Error al Procesar';

        return redirect()->route('userdetails.index')->with('info', $message);
            
    }


    public function updateuser(Request $request, $id)
    {   

        $reset_password = $request->get('reset_password');
       
        $user = User::findOrFail($id);
        $user->name     = $request->get('name');
        $user->email    = $request->get('email');
        $user->role     = $request->get('role');
        $user->status   = $request->get('status');
       
         if( $reset_password == 1 ){
            
             $randompwd = mt_rand(10000,1000000);

            $user->pwd_temp         = $randompwd;
            $user->password         = Hash::make($randompwd);
            $user->user_verified    = 0;
             
            $this->NotificableResetpassword($id, $randompwd);
        }

        $user->update();

       $roles= Role_user::Where('user_id', $id)->get();

        if(count($roles)>0)
        {
            foreach ($roles as $r) {           
                $role_id = $r->id;
            }
            
            $role = Role_user::findOrFail($role_id);       
            $role->role_id = $request->get('role');          
            $role->update();
        }

        else
        {

             $saverole = Role_user::Create([

                    'role_id' => $request->get('role'),
                    'user_id' => $id,
                ]);

        }

        
        return redirect()->route('userdetails.index')->with('info', 'Usuario Actualizado con Exito');
    }

  

     public function getprofilejs(Request $request)
    {   
        
        
        if($request->ajax()){
           
        
            $auth_user = Auth::user()->id;
            $auth_role = Auth::user()->role;
            $cop_id =  \Session::get('copropiedad');
            
           
            $data       = strtoupper($request->get('query'));
            $option     = $request->get('option');
                
                //request for form
                if($option == 1)
                {   
                    if($auth_role == 2  || $auth_role == 1)
                    {
                       

                        $profiles =  User::where('name', 'LIKE', '%' . $data . '%')
                                        ->orWhere('email', 'LIKE', '%' . $data . '%')
                                        ->orWhere('nit', 'LIKE', '%' . $data . '%')
                                        ->orWhere('email', 'LIKE', '%' . $data . '%')
                                        ->get();
                    }
                    else{
                       
                        $profiles = $this->getUserCopropiedades($data, $cop_id );

                       
                    }   
                }
            
                if($option == 2)
                {   
                    $id = $data;

                    $profiles = User::id($id)->get();   
                }

                            
        
        
             return $profiles;
                    
        }

    }

    //Javascript Form Modal
    public function saveprofilejs(Request $request)
    {   
        
        $validatedData = Validator::make($request->all(),[
            

            'name'      => 'required|string|max:255',
            'phone_1'   => 'required|integer',
            'role'      => 'required|integer',
            'email'     => 'required|email|unique:users|max:255',
            'nit'       => 'required|integer|unique:users',
        ]);

   
        if( $validatedData->fails() ){

               $data = array(

                        'status'  => 'error',
                        'code'    => 404,
                        'message' => 'El Usuario no se ha creado',
                        'errors'  => $validatedData->errors(),                     
                      );
        
        }
        
        else {

            $user = $this->CreateUser($request);
      
            if(!empty($user))
            {
                $copxuser = $this->Copxuser($user->id);

                if(!empty($copxuser))
                {
                    $this->notificable($user->id, $randompwd);

                    $data = array(

                        'status'  => 'success',
                        'code'    => 202,
                        'message' => 'El Usuario se ha creado con exito',
                      
                      );
                }
            }      

          }
            
          return response()->json($data);
           
       
      }

    private function CreateUser ($request)
    {
        $auth_user = Auth::user()->id;
        $randompwd = mt_rand(10000,1000000);

        $user = User::create([
            
                    'name'          =>strtoupper($request->get('name')),
                    'phone_1'       =>$request->get('phone_1'),
                    'nit'           =>$request->get('nit'),
                    'email'         =>$request->get('email'),
                    'role'          =>$request->get('role'),
                    'parent_id'     =>$auth_user,
                    'password'      => Hash::make($randompwd),
                    'user_verified' =>0,
                    'status'        =>0,


                    
                ]);

            return $user;
    }
     
    private function Copxuser ($user_id){

        $cop_id =  \Session::get('copropiedad');
        $cop_name  = \Session::get('copropiedad_name');
        $auth_user = Auth::user()->id;

        $copropiedadxusers = bxuser_x_copropiedads::create([
            
                    'user_id' => $user_id,
                    'cop_id'  => $cop_id,
                    'cop_name'  => $cop_name,
                    'parent_id' => $auth_user,
        ]);


        return $copropiedadxusers;
    }

    


     public function getUserCopropiedades($data, $cop_id)
     {

        $user = User::where('name', 'LIKE', '%' . $data . '%')
                    ->orWhere('email', 'LIKE', '%' . $data . '%')
                    ->orWhere('nit', 'LIKE', '%' . $data . '%')
                    ->orWhere('email', 'LIKE', '%' . $data . '%')                    
                    ->get();

        $objeto = array();
        $i = 0;
        foreach($user as $value)
        {   
        
            $copropiedadxusers = bxuser_x_copropiedads::where('user_id', $value->id)
                                                    ->where('cop_id', $cop_id)
                                                    ->get();
            if(count($copropiedadxusers) > 0)
            {
                
                $arrayUser = array(

                    'name'      => $value->name,
                    'id'        => $value->id,
                    'nit'       => $value->nit,
                    'email'     => $value->email,             
                    
                  );
                
                $objeto[$i] = $arrayUser;
                $i++;
            }
          
        }

        return $objeto;
     }

    /************************************************ */
    /* Notificaciones ******************************* */

     public function NotificableResetpassword($id, $password)
     {
          $user = User::findOrFail($id);

            $client = new \stdClass;           
            $client->name      = $user->name;
            $client->phone     = $user->phone;
            $client->email     = $user->email;
            $client->password  = $password;           
            $client->subject   = "Se ha restaurado la Contraseña";
            $client->to        = $user->email;

        $this->Sendresetpassword($client);
     }

     public function notificable($user_id, $randompwd)
     {

       $user = User::findOrFail($user_id);


                      
            $client = new \stdClass;
           
            $client->name      = $user->name;
            $client->phone     = $user->phone;
            $client->email     = $user->email;
            $client->password  = $randompwd;           
            $client->subject   = "Bienvenido A Beehive";
            $client->to        = $user->email;
           

            $this->WelcomeNewuser($client);
      
     
     }

}

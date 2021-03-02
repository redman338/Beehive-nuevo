<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Copropiedadxusers;
use App\Models\Copropiedad;
use App\Models\Inmueble;
use App\Models\Role_user;
use App\Models\Inmueblexusers;
use App\User;
use Auth;

class DashboardController extends Controller
{	

	 public function __construct()
    {
        $this->middleware('auth');
    }

   	public function index(){

      $user_id= auth()->user()->id;
      $user_rol =  Auth::user()->role ;
      $user_status =  Auth::user()->status ;
      $user_verified =  Auth::user()->user_verified ;
      
      $copropiedad = \Session::get('copropiedad');
   		 

      if($user_verified == 0){


          return view('auth.changepwd');

       } 
        
      else {
               

            if( $user_status == 1){
              if( $user_rol == 1)
                  {
                    $copropiedad = 0;
                    return view('admin.dashboard', compact('copropiedad'));
                  }
              else{
                    return redirect()->route('dashboard/perfil');
                  }
              }
            
            else {

                   return view('404');

              }
          }
        
   }

  public function perfil (){

      $user_rol =  Auth::user()->role ;
      $user_id  = auth()->user()->id;
      $copropiedad  = \Session::get('copropiedad');
      $inmueble     =   \Session::get('inmueble');
      

      switch ($user_rol) {
                
                case 0:
                     return view('404');
                    break;
                  
                case 1:
                  
                  if($copropiedad)
                    {                     
                      
                      $copropiedad = Copropiedad::findOrFail($copropiedad);


                      return view('admin.dashboard', compact('copropiedad'));

                    }
                    
                    else {  

                        $cxuserSql =   Copropiedad::select('id', 'name')
                                                    ->get();
                        


                        return view('admin.copropiedad')->with('cxuserSql', $cxuserSql);

                      }
                      break;
                
                case 2:

                    
                    return view('admin.dashboard2');
                    break;

                case 3:


                
                    if($copropiedad)
                    {                     
                         $copropiedad = Copropiedad::findOrFail($copropiedad);

                          return view('admin.dashboard', compact('copropiedad'));

                    }
                    
                    else {  

                        $cxuserSql =   Copropiedadxusers::select('copropiedad_id')
                                                    ->where('user_id', $user_id)
                                                    ->get();
                                                    
                      
                        return view('admin.copropiedad')->with('cxuserSql', $cxuserSql);

                      }
                        break;

                case 4:
                     
                      if($inmueble)
                        {                    
                            
                            return view('propietario.dashboard');

                        }

                      else {


                        $ixuserSql =   Inmueblexusers::select('inmueble_id')
                                                    ->where('user_id', $user_id)
                                                    ->get();
                                                    
                      
                        return view('propietario.inmueble')->with('ixuserSql', $ixuserSql);


                      }
                    break;

                case 5:
                    
                     if($inmueble)
                        {                    
                            
                            return view('residente.dashboard');

                        }

                      else {


                        $ixuserSql =   Inmueblexusers::select('inmueble_id')
                                                    ->where('user_id', $user_id)
                                                    ->get();
                                                    
                      
                        return view('propietario.inmueble')->with('ixuserSql', $ixuserSql);


                      }

                   
                    break;
                
              default:
                    return view('404');
            }

    }
  
  public function copropiedad (Request $request){


        $cop_id           = $request->get('copropiedad_id');
        

        
          if($cop_id > 0)
           { 

              $copropiedad      = Copropiedad::findOrFail($cop_id);
              $copropiedad_name = $copropiedad->name;
              $session = \Session::put(['copropiedad' => $cop_id]);
              $session = \Session::put(['copropiedad_name' => $copropiedad_name]);
               return redirect()->route('dashboard');

            }

          else{

               return redirect()->route('dashboard/no_body');

            }
       
      
    }


     public function cambiar (){

        $session = \Session::put(['copropiedad' => '']);

         return redirect()->route('dashboard');
     }


    
    //Verificacion del Usuario Logueado
    public function userverified (Request $request){
               
         $user_id   = auth()->user()->id;
         $role      = auth()->user()->role;
         
         $password = Hash::make($request['password']);
         $user = User::findOrFail($user_id);

         $user->password =  $password;
         $user->user_verified =  1;
         $user->status =  1;
         $user->pwd_temp = '';
         $user->save();


        $saverole = Role_user::Create([

            'role_id' => $role,
            'user_id' => $user_id,
            ]);        

         return redirect()->route('dashboard');

     }


      public function inmueble (Request $request){


        $inmueble_id           = $request->get('inmueble_id');
        $inmueble              = Inmueble::findOrFail($inmueble_id);
        $inmueble_name         = $inmueble->name;
        $copropiedad           = $inmueble->copropiedad_id;

        
          if($inmueble_id > 0)
           { 
              $session = \Session::put(['copropiedad' => $copropiedad]);
              $session = \Session::put(['inmueble' => $inmueble_id]);
              $session = \Session::put(['inmueble_name' => $inmueble_name]);

              
              return redirect()->route('dashboard');

            }

          else{

               return redirect()->route('dashboard');

            }
       
        

    }

    public function no_body(){

      return view('auth.logout');
    }
     

}

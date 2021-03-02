<?php

namespace App\Http\Controllers\Propietario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Propietario;
use App\Models\Residentes;
use App\Models\Inmueble;
use App\Models\Inmueblexusers;
use App\Traits\MailTrait;
use Validator;
use Auth;

class PropietarioController extends Controller
{ 

    use MailTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $user_id= auth()->user()->id;
       
        $propietario = Propietario::where('user_id', $user_id)
                                    ->select('id')
                                    ->get();

        if(count($propietario)>0)
        {

            foreach ($propietario as $value) {
                
                $id = $value->id;
            }

           


            return redirect()->route('propietario.show', $id);

        }
        else{

            $user = User::findOrFail($user_id);
            return view('propietario.miregistro.create', compact('user'));
        }
       



      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user_id= auth()->user()->id;

        $propietario = Propietario::where('user_id', $user_id)
                                    ->select('id')
                                    ->get();

          foreach ($propietario as $value) {
              
                $prop_id = $value->id;

          }

        $propietario = Propietario::findOrFail($prop_id);


        if($user_id == $propietario->user_id)
        {   
            $inmueble_id = $propietario->inmueble_id;

            $inmueble = Inmueble::findOrFail($inmueble_id);


            return view('propietario.miregistro.profile', compact('inmueble'))->with('propietario', $propietario);
        }

       else{

          
          return redirect()->route('404');

       }


        return $propietario;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function savepropietario(Request $request)
    {

        $auth_user       = Auth::user()->id;
        $copropiedad_id  = \Session::get('copropiedad');   
        $inmueble_id    = \Session::get('inmueble');
        $inmueble_name  = \Session::get('inmueble_name');    
        
        $validatedData = Validator::make($request->all(),[
            

            'name'      => 'required|string|max:255',
            'phone_1'   => 'required|integer',
            'email'     => 'required|email|max:255',
            'nit'       => 'required|integer|unique:propietarios',
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

       

          $propietario = Propietario::create([
              
              'name'                =>strtoupper($request->get('name')),
              'phone_1'             =>$request->get('phone_1'),
              'phone_2'             =>$request->get('phone_2'),
              'nit'                 =>$request->get('nit'),
              'email'               =>$request->get('email'),
              'tipo_identificacion' =>$request->get('tipo_identificacion'),
              'copropiedad_id'      =>$copropiedad_id,
              'inmueble_id'         =>$inmueble_id,
              'inmueble_name'       =>$inmueble_name,
              'user_id'             =>$auth_user,
              'registro_status'     =>1,
              'politica_datos'      =>$request->get('politica_datos'),
              'date_autorization'   =>date("F j, Y, g:i a"),


                      
                  ]);

                
                $data = array(

                        'status'  => 'success',
                        'code'    => 202,
                        'message' => 'El Usuario se ha creado con exito',
                      
                      );

          }


          return response()->json($data);
    }

    public function validacion(){

   

        return view('propietario.miregistro.validacion');
      
    }


    public function propietarioresidenteform(){


         $auth_user       = Auth::user()->id;

         $residente  = Residentes::where('user_id', $auth_user)
                                  ->get();

        if(count($residente)>0)
        { 

            return redirect()->route('propietario.show', $auth_user);
        } 


        return view('propietario.miregistro.propietario_residente');
    }


    public function getvalidacion(Request $request){

           if($request->ajax()){
               
              $auth_user       = Auth::user()->id;

              $propietario = Propietario::where('user_id', $auth_user)
                                        ->get();

                if(count($propietario)>0)
                {

                    $data = 1;

                }
                else{

                    $data = 0;
                }

                return response()->json($data);
           
            }
            else
            {

               $data = "AJAX BAD ";

               return response()->json($data);
            }


    }

     public function residenteform(){

        return view('propietario.miregistro.propietario_residente_2');
    }

    public function savepropietarioresidente(Request $request)
    {

        $auth_user       = Auth::user()->id;
        $copropiedad_id  = \Session::get('copropiedad');   
        $inmueble_id    = \Session::get('inmueble');
        $inmueble_name  = \Session::get('inmueble_name');    
        
        $validatedData = Validator::make($request->all(),[
            

            'residente1'        => 'required|string|max:255',
            'residente_1_cc'    => 'required|integer',
            'email'             => 'required|email|max:255',
           
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

       

              $propietario = Residentes::create([
              
                  'residente_1'                       =>strtoupper($request->get('residente1')),
                  'residente_1_cc'                    =>$request->get('residente_1_cc'),
                  'residente_1_phone_1'               =>$request->get('residente_1_phone_1'),
                  'residente_1_celular_1'             =>$request->get('residente_1_celular_1'),
                  'email'                             =>$request->get('email'),
                  'residente_2'                        =>$request->get('residente2'),
                  'residente_2_cc'                    =>$request->get('residente_2_cc'),
                  'residente_2_phone_1'               =>$request->get('residente_2_phone_1'),
                  'residente_2_celular_1'             =>$request->get('residente_2_celular_1'),
                  'vehiculo_tipo'                     =>$request->get('vehiculo_tipo'),
                  'vehiculo_marca'                    =>$request->get('vehiculo_marca'),
                  'vehiculo_modelo'                   =>$request->get('vehiculo_modelo'),
                  'vehiculo_placa'                    =>$request->get('vehiculo_placa'),
                  'vehiculo_color'                    =>$request->get('vehiculo_color'),
                  'vehiculo_parqueadero'              =>$request->get('vehiculo_parqueadero'),
                  'colaborador_nombre'                =>$request->get('colaborador_nombre'),
                  'colaborador_direccionresidencia'   =>$request->get('colaborador_direccionresidencia'),
                  'colaborador_phone_1'               =>$request->get('colaborador_phone_1'),
                  'colaborador_celular'               =>$request->get('colaborador_celular'),
                  'colaborador_c_emergency'           =>$request->get('colaborador_c_emergency'),
                  'colaborador_c_phone_2'             =>$request->get('colaborador_c_phone_2'),
                  'colaborador_c_celular'             =>$request->get('colaborador_c_celular'),
                  'mascota_tipo'                      =>$request->get('mascota_tipo'),
                  'mascota_nombre'                    =>$request->get('mascota_nombre'),
                  'mascota_raza'                      =>$request->get('mascota_raza'),
                  'mascota_color'                     =>$request->get('mascota_color'),
                  'copropiedad_id'                    =>$copropiedad_id,
                  'inmueble_id'                       =>$inmueble_id,
                  'inmueble_name'                     =>$inmueble_name,
                  'user_id'                           =>$auth_user,
                  'propietario_id'                    =>$auth_user,

                  ]);
                
                $data = array(

                        'status'  => 'success',
                        'code'    => 202,
                        'message' => 'El Usuario se ha creado con exito',
                        'data'    => $propietario,
                      );

          }


          return response()->json($data);


    }



    public function saverarrendatariojs(Request $request)
    {

        $auth_user       = Auth::user()->id;
        $copropiedad_id  = \Session::get('copropiedad');   
        $inmueble_id    = \Session::get('inmueble');
        $inmueble_name  = \Session::get('inmueble_name');    
        
        $validatedData = Validator::make($request->all(),[
            

            'residente1'        => 'required|string|max:255',
            'residente_1_cc'    => 'required|integer',
            'email'             => 'required|email|unique:users|max:255',
           
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

       

              $residente = Residentes::create([
              
                  'residente_1'                       =>strtoupper($request->get('residente1')),
                  'residente_1_cc'                    =>$request->get('residente_1_cc'),
                  'residente_1_phone_1'               =>$request->get('residente_1_phone_1'),
                  'residente_1_celular_1'             =>$request->get('residente_1_celular_1'),
                  'email'                             =>$request->get('email'),
                  'residente_2'                        =>$request->get('residente2'),
                  'residente_2_cc'                    =>$request->get('residente_2_cc'),
                  'residente_2_phone_1'               =>$request->get('residente_2_phone_1'),
                  'residente_2_celular_1'             =>$request->get('residente_2_celular_1'),
                 
                  'copropiedad_id'                    =>$copropiedad_id,
                  'inmueble_id'                       =>$inmueble_id,
                  'inmueble_name'                     =>$inmueble_name,
                  'user_id'                           =>$auth_user,
                  'propietario_id'                    =>$auth_user,

                  ]);

                    $user = new User;
                    $user->name     = strtoupper($request->get('residente1'));
                    $user->email    = $request->get('email');
                    $user->nit      = $request->get('residente_1_cc');
                    $user->phone_1  = $request->get('residente_1_phone_1');


                  $residente_user_id = $this->createUser($user);

                  $residente->fill([ 'user_id' => $residente_user_id
                                    ])->save();
                    
                  
                  $inmueblexuser =  Inmueblexusers::create([

                        'copropiedad_id'    =>$copropiedad_id,
                        'user_id'           =>$residente_user_id,
                        'inmueble_id'       =>$inmueble_id,  

                    ]);


                $data = array(

                        'status'  => 'success',
                        'code'    => 202,
                        'message' => 'El Usuario se ha creado con exito',
                        'data'    => $residente,
                      );

          }


          return response()->json($data);


    }


    public function createUser($user)
    {
        $auth_user = Auth::user()->id;
        $username = $user->email;

        $randompwd = mt_rand(10000,1000000);

        $data  =  User::create([

            'name'      =>  $user->name,
            'email'     =>  $user->email, 
            'nit'       =>  $user->nit,
            'phone_1'   =>  $user->phone_1,
            'role'      =>  5,
            'parent_id' =>$auth_user,
            'pwd_temp'  =>$randompwd,
            'password'  => Hash::make($randompwd),
            'user_verified' =>0,
            'status'    =>0,

        ]);

               
            $client = new \stdClass;
           
            $client->name      = $user->name;
            $client->password  = $randompwd;
            $client->phone     = $user->phone_1;
            $client->email     = $user->email;
            $client->subject   = "Bienvenido A Beehive";
            $client->to        = $user->email;
         

        $this->WelcomeNewuser($client);
        
        return $data->id;
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Copropiedad;
use App\Models\bxuser_x_copropiedads;
use Auth;

use Illuminate\Http\Request;

class CopropiedadxUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.copropiedadxusers.index');
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

        $user_id            = $request->get('user_id');
        $copropiedad_id     = $request->get('copropiedad_id');
        $copropiedad_name   = $request->get('copropiedad');
        $parent_id          = Auth::user()->id;


        $validate = $this->ValidateData($user_id, $copropiedad_id);

        if($validate == TRUE)
        {
            $query = bxuser_x_copropiedads::create([

                    'user_id'   => $user_id,
                    'cop_id'    => $copropiedad_id,
                    'cop_name'  => $copropiedad_name,
                    'parent_id' => $parent_id,

            ]);
            
            if($query){$message = "Registro Creado con Exito"; }
                else{$message = "Error al Actualizar"; }

        }
        
        else{

            $message = "Error al Guardar o El Registro ya existe !!";
        }
   
        return redirect()->route('copropiedadxusers.index')->with('info', $message);
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function getCopropiedades(Request $request)
    {

        if($request->ajax()){

            $data = $request->get('query');
            $option = $request->get('option');
            
            
            if($option == 2)
            {
                $copropiedades = Copropiedad::id($data)->get();
            }
            if($option == 1)
            {
            $copropiedades =  Copropiedad::where('name', 'LIKE', '%' . $data . '%')
                                            ->get();

            }



            return response()->json(
                       
                $copropiedades->toArray()

               ); 
        }
    }


    public function getCopropiedadUsersjs(Request $request){
        
       

            $data = $request->get('query');

            $query =  bxuser_x_copropiedads::where('user_id', $data)
                                ->get();
            
                               
            
                   
            
            return response()->json(
                       
                $query->toArray()

             );      

    }

    private function ValidateData($user_id, $copropiedad_id)
    {

        if($user_id !='' && $copropiedad_id !='')
       {
            $query = bxuser_x_copropiedads::where('user_id', $user_id)
                                        ->where('cop_id', $copropiedad_id)
                                        ->get();

        
                if( count($query) > 0)
                {
                    return FALSE ;
                }
                else{

                    return TRUE;
                }
        }
        else{

            return FALSE;
        }
       
    }

    public function deleteCopropiedadUsers(Request $request)
    {

        $user_id = $request->get('user_id');
        $cops_id = $request->get('cops_id');

      
        if($user_id != '' && $cops_id != '')
        {
            for($i=0; $i< count($cops_id); $i++)
            {   
              
                $query = bxuser_x_copropiedads::where('user_id', $user_id)
                                            ->where('cop_id', $cops_id[$i])
                                            ->delete();
            }

                if($query)
                {

                    $response = array(

                        'status'  => 'success',
                        'code'    => 200,
                        'message' => 'El Registro se ha eliminado con exito',
                        
                    
                    );
                }
                else{

                    $response = array(

                        'status'  => 'error',
                        'code'    => 400,
                        'message' => 'error al eliminar',
                        
                    
                    );
                }
        }

        else{

            $response = array(

                'status'  => 'error',
                'code'    => 400,
                'message' => 'error al eliminar, datos vacios',
                
            
            );
        }
            return $response;
          
    }

}

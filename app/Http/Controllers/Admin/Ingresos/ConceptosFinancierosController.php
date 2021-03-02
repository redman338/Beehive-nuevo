<?php

namespace App\Http\Controllers\Admin\Ingresos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Copropiedad;
use App\Models\Conceptosfinancieros;
use Auth;


class ConceptosFinancierosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('permission:conceptosfinancieros-create')->only(['create', 'store']);    
        $this->middleware('permission:conceptosfinancieros-index')->only('index');
        $this->middleware('permission:conceptosfinancieros-edit')->only(['edit','update']);
        $this->middleware('permission:conceptosfinancieros-show')->only('show');
        $this->middleware('permission:conceptosfinancieros-destroy')->only('destroy');
    
    
    }
    public function index()
    {  

        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;
        $cop_id = \Session::get('copropiedad'); 

          if($cop_id > 0){

            $CopSql = Copropiedad::where('id', $cop_id)
                            ->select('id','name')
                            ->get();
            
             $conceptos = Conceptosfinancieros::where('copropiedad_id', $cop_id)
                                            ->get();

            return view('admin.ingresos.conceptosfinancieros.index', compact('conceptos'));
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
        $cop_id = \Session::get('copropiedad'); 
        
        if($cop_id > 0){                    

            return view('admin.ingresos.conceptosfinancieros.create');
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
        $auth_role = Auth::user()->role;
        
       if($cop_id > 0){         

                $request->validate([
                   
                    'name'               => 'required|string',
          
                ]);

            $concepto = Conceptosfinancieros::create([
                    
                    'copropiedad_id'    =>$cop_id,
                    'name'              =>$request->get('name'),
                    'description'       =>$request->get('description'),        
                    
                ]);

                $message = $concepto ? 'Registro Guardado con Exito' : 'Error ';

            return redirect()->route('conceptosfinancieros.index')->with('info', $message);
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
       $cop_id = \Session::get('copropiedad'); 
       if($cop_id > 0){ 

                 $concepto = Conceptosfinancieros::findOrFail($id);
            return view('admin.ingresos.conceptosfinancieros.show', compact( 'concepto'));


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
        $user_id = Auth::user()->id;
        $cop_id = \Session::get('copropiedad'); 
        
          if($cop_id > 0){ 
                
            $concepto = Conceptosfinancieros::findOrFail($id);
            return view('admin.ingresos.conceptosfinancieros.edit', compact( 'concepto'));


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
        
      
        $cop_id = \Session::get('copropiedad'); 
        
        $concepto = Conceptosfinancieros::findOrFail($id);

       
          if($cop_id > 0){ 
                

                             
                $request->validate([
                   
                    'name'               => 'required|string',
          
                ]);

                $concepto->name             =$request->get('name');
                $concepto->description      =$request->get('description');
                $concepto->save();   

                $message = $concepto ? 'Registro Guardado con Exito' : 'Error ';

            return redirect()->route('conceptosfinancieros.index')->with('info', $message);
        }
        else {

               return redirect()->route('dashboard/perfil');
        }
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


       public function conceptosquery(Request $request)
    {
       
            $dato  = $request->get('query');

             $query = Conceptosfinancieros::where('copropiedad_id', $dato)            
                         ->get();

            return response()->json(
                       
                     $query->toArray()

                    );

            // return $query;

     }

    public function getconceptos()
    {
        $cop_id = \Session::get('copropiedad');   
        $query = Conceptosfinancieros::where('copropiedad_id', $cop_id)
                                    ->get();   
       

               return response()->json(
                       
                     $query->toArray()

                    );

        

     }
}

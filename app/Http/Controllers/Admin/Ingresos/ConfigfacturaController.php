<?php

namespace App\Http\Controllers\Admin\Ingresos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configfactura;
use App\Models\Copropiedad;
use App\Models\Fiscalyear;
use App\Models\Month;
use App\Models\Conceptosxfactura;
use App\Models\Conceptosfinancieros;




class ConfigfacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cop_id = \Session::get('copropiedad');
        $configFactura = Configfactura::where('copropiedad_id', $cop_id)->get();


        return view('admin.ingresos.configfactura.index', compact('configFactura'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $yearSql = Fiscalyear::get();
        $years = [];
        foreach($yearSql as $year){           
            $years[$year->id] = $year->year;            
        }

        $monthSql = Month::get();
        $months = [];
        foreach($monthSql as $month){           
            $months[$month->id] = $month->name;            
        }


        if(\Auth::user()->role == 1){

             $CopSql = Copropiedad::get();
             
             $cfinSql = Conceptosfinancieros::get();
                
                $cfinancieros = [];
                foreach($cfinSql as $cfin){           
                    $cfinancieros[$cfin->id] = $cfin->name;            
                }

            return view('admin.ingresos.configfactura.create', compact('copropiedades','years', 'months', 'cfinancieros'));
        }

          else {

            $cop_id = \Session::get('copropiedad');
            $CopSql = Copropiedad::where('id', $cop_id)
                                    ->select('id', 'name')
                                    ->get();

            $copropiedades = [];
                foreach($CopSql as $co){           
                    
                    $copropiedades[$co->id] = $co->name;
                   
                }

            $cfinSql = Conceptosfinancieros::where('copropiedad_id', $cop_id)
                                    ->select('id', 'name')
                                    ->get();
                $cfinancieros = [];
                foreach($cfinSql as $cfin){           
                    $cfinancieros[$cfin->id] = $cfin->name;            
                }


                 return view('admin.ingresos.configfactura.create', compact('years', 'months', 'cfinancieros'));
            
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
       
        $configfactura = Configfactura::create([
                    
                    'copropiedad_id'    =>$cop_id,
                    'year_id'           =>$request->get('year_id'),
                    'month_id'          =>$request->get('month_id'),  
                    'daysinrecargo'     =>$request->get('daysinrecargo'),  
                    'dayrecargo'        =>00,        
                    
                ]);      
            
         
        $conceptos  = $request->get('concepto_id');
        $valor      = $request->get('valor');
       
         $this->saveConceptos($conceptos, $valor, $configfactura->id);


         $message = "Guardado Correctamente";
         return redirect()->route('configfactura.index')->with('info', $message);
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
        $configfactura = Configfactura::findOrFail($id);
        $configfactura->delete();

        $message = "Eliminado Correctamente";
        return redirect()->route('configfactura.index')->with('info', $message);

    }

  


    public function saveConceptos($conceptos, $valor, $id )
    {
        $cop_id = \Session::get('copropiedad');
      
        $arrayleng = count($conceptos); 
      
        $miarray = [];
            
            for ( $i = 0; $i < $arrayleng ; $i++ ) {

                $saveconcepto = Conceptosxfactura::create([

                     'copropiedad_id'    =>$cop_id,
                     'configfactura_id'  =>$id,
                     'concepto_id'  =>$conceptos[$i],
                     'valor'        =>$valor[$i],

                 ]);
            }      
            
               
    }
}

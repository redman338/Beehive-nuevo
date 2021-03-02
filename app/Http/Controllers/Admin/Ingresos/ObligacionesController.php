<?php

namespace App\Http\Controllers\Admin\Ingresos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fiscalyear;
use App\Models\Month;
use App\Models\Inmueble;
use App\Models\Configfactura;
use App\Models\Conceptosxfactura;
use App\Models\Conceptosfinancieros;
use App\Models\Copropiedad;
use App\Models\Iteminvoice;
use App\Models\Invoice;
use App\Models\InvoiceStatus;

class ObligacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cop_id = \Session::get('copropiedad'); 
        
          if($cop_id > 0){
            
            return view('admin.ingresos.obligaciones.index');

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


            $inmuebleSql = Inmueble::where('copropiedad_id', $cop_id)
                                ->select('id', 'name')
                                ->get();

             $inmuebles = [];
                foreach($inmuebleSql as $i){           
                    $inmuebles[$i->id] = $i->name;            
                }

            $cfinSql = Conceptosfinancieros::where('copropiedad_id', $cop_id)
                                            ->get();
                
            $cfinancieros = [];
            foreach($cfinSql as $cfin){           
                $cfinancieros[$cfin->id] = $cfin->name;            
            }

       return view('admin.ingresos.obligaciones.create', compact('years', 'months', 'inmuebles', 'cfinancieros'));

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
        
        $copropiedad = Copropiedad::findOrFail($cop_id);
        $num_doc_seq = $copropiedad->num_doc_seq; 
        
       
        //resultado validacion de registro

        $inmueble_id    = $request->get('inmueble_id');
        $year_id        = $request->get('year_id');
        $month_id       = $request->get('month_id');

        $obligaciones = Invoice::where('inmueble_id', $inmueble_id)
                                    ->where('year_id', $year_id)
                                    ->where('month_id', $month_id)
                                    ->exists();

        if(!$obligaciones)
        {
            if($num_doc_seq == NULL)
            {   
                $codigo = $copropiedad->codigo;               
                $doc_nex_value = $codigo.$num_doc_seq.'000'.+1;

                $copropiedad->num_doc_seq = $doc_nex_value;
                $copropiedad->save();
            }

            else {

                    $doc_nex_value = $num_doc_seq+1;
                    $copropiedad->num_doc_seq = $doc_nex_value;
                    $copropiedad->save();

            }
            
            $saveFactura = $this->saveFactura($doc_nex_value, $request);   
            
            if($saveFactura == 'TRUE')
            {   

                $message = 'Registro Creado Correctamento';

                return redirect()->route('obligaciones.index')->with('info', $message);
            }

            if($saveFactura == 'FALSE')
            {   

                $message = 'Error, uno o mas parametros hacen falta, revise la configuracion';

                return redirect()->route('obligaciones.index')->with('info', $message);
            }
        }
    }


    protected function saveFactura($doc_nex_value, $request)
    {
        //Generacion de Factura
                $cop_id = \Session::get('copropiedad');
                $conceptos      = $request->get('concepto_id');
                $valor          = $request->get('valor');
                $year_id        = $request->get('year_id');
                $month_id       = $request->get('month_id');
      
                            

                $configFactura = Configfactura::where('year_id', $year_id)
                                                ->where('month_id', $month_id)
                                                ->first();

                if($configFactura)
                {
                        $items    = Conceptosxfactura::where('configfactura_id', $configFactura->id)
                                                            ->get();
                        
                                                            
                        $subtotal = $this->getSubtotal($items, $valor);                                   
                      
                        $invoice = Invoice::create([

                            'numero_doc'            =>$doc_nex_value,
                            'copropiedad_id'        =>$cop_id,
                            'inmueble_id'           =>$request->get('inmueble_id'),
                            'year_id'               =>$configFactura->year_id,
                            'month_id'              =>$configFactura->month_id,
                            'daysinrecargo'         =>$configFactura->daysinrecargo,
                            'subtotal'              =>$subtotal,
                            'total'                 =>$subtotal,
                            'status_id'             =>1,
                            

                        ]);

                    
                        $this->saveIteminvoice($conceptos, $valor, $doc_nex_value, $items, $invoice->id);
                        
                        return 'TRUE';
            }
            else{

                return 'FALSE';
            }
        
    }

    private function getSubtotal($items, $valor)
    {
        $subtotal = 0;
        $total =0;

        
        if(!empty($valor))
        {   
         
            $arrayleng = count($valor);                 
                                
            for ( $i = 0; $i < $arrayleng ; $i++ )
            {
            
                    $subtotal += $valor[$i] ;
                  
            }
        }
            
        foreach($items as $value)
        {

                $subtotal += $value->valor;
        }
           
     
        return $subtotal;
    }


       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $desprendible = Invoice::findOrFail($id);

        $items = Iteminvoice::where('invoice_id', $id)
                                ->get();

       return view('admin.ingresos.obligaciones.generardesprendible', compact('desprendible', 'items'));
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

   public function saveIteminvoice ($conceptos, $valor, $doc_nex_value, $items, $invoice )
   {

        $cop_id = \Session::get('copropiedad');
        
       
            $arrayleng = count($conceptos); 
        
                
                for ( $i = 0; $i < $arrayleng ; $i++ ) {

                    if($conceptos[$i] > 0)
                    {
                        $saveItem = Iteminvoice::create([

                            'copropiedad_id'   =>$cop_id,
                            'concepto_id'      =>$conceptos[$i],
                            'valor'            =>$valor[$i],
                            'invoice_id'       =>$invoice,
                            'numero_doc'       =>$doc_nex_value,

                        ]);
                    }
                }      

            foreach($items as $value)
            {
              
                $saveItem = Iteminvoice::create([

                    'copropiedad_id'   =>$cop_id,
                    'concepto_id'      =>$value->concepto_id,
                    'valor'            =>$value->valor,
                    'invoice_id'       =>$invoice,
                    'numero_doc'       =>$doc_nex_value,

                ]);

            }
            
               
            return 'TRUE';
    }

    public function desprendible()
    {
       $cop_id = \Session::get('copropiedad');

       $inmuebleSql = Inmueble::where('copropiedad_id', $cop_id)
                                ->select('id', 'name')
                                ->get();

         $inmuebles = [];
            foreach($inmuebleSql as $i){           
                $inmuebles[$i->id] = $i->name;            
            }

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

       return view('admin.ingresos.obligaciones.desprendibles', compact('inmuebles', 'years', 'months'));
    }

      public function getdesprendible(Request $request){
        
        $cop_id = \Session::get('copropiedad');
        $year_id        = $request->get('year_id');
        $month_id       = $request->get('month_id');
        $inmueble_id    = $request->get('inmueble_id');
        $numero_doc     = $request->get('numero_doc');



        $invoice = Invoice::Orderby('id', 'ASC')
                            ->copropiedad($cop_id)
                            ->inmueble($inmueble_id )
                            ->year($year_id )
                            ->month($month_id)
                            ->documento($numero_doc)
                            ->get();
       
        
        $data = $this->sortData($invoice);

        return $data;
       
    }

    private function sortData($data)
    {

        $objet = array();
        $i=0;
        foreach($data as $value)
        {

            $array = array(

                'numero_doc'    => $value->numero_doc,
                'inmueble'      => $value->inmueble->name,
                'total'         => $value->total,
                'status'        => $value->status->name,
            );

            $objet[$i] = $array;
            $i++;

        }

        return $objet;
    }

      public function desprendible_download($id){

            $cop_id = \Session::get('copropiedad');

            $invoice = Invoice::where('copropiedad_id', $cop_id )
                                ->where('id', $id)
                                ->get();


            $items = Iteminvoice::where('invoice_id', $id)
                                ->get();


            $vistaurl="partials.factura_download";  


             return $this->crearPDF($vistaurl, $invoice, $items);
        }
    
    public function crearPDF($vistaurl, $invoice, $items )
    {          
        
      
        $view =  \View::make($vistaurl, compact('invoice','items'))->render();

        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($view)
            ->setPaper('a4');
        
         return $pdf->download('cuenta_cobro'.'.pdf'); 
    
    }


    public function especial()
    {

        $cop_id = \Session::get('copropiedad'); 
              
        if($cop_id > 0){

            $yearSql = Fiscalyear::get();
            $years = [];
            foreach($yearSql as $year){           
                $years[$year->id] = $year->year;            
            }

          
            $inmuebleSql = Inmueble::where('copropiedad_id', $cop_id)
                                ->select('id', 'name')
                                ->get();

             $inmuebles = [];
                foreach($inmuebleSql as $i){           
                    $inmuebles[$i->id] = $i->name;            
                }

            $cfinSql = Conceptosfinancieros::where('copropiedad_id', $cop_id)
                                            ->get();
                
            $cfinancieros = [];
            foreach($cfinSql as $cfin){           
                $cfinancieros[$cfin->id] = $cfin->name;            
            }

       return view('admin.ingresos.obligaciones.obligacion_especial', compact('years',  'inmuebles', 'cfinancieros'));

     }
       else {

            return redirect()->route('dashboard/perfil');
       }

    }
 
}

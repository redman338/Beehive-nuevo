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

class IngresosController extends Controller
{
    

    public function index()
    {   

     
        $cop_id = \Session::get('copropiedad'); 
        
          if($cop_id > 0){
            
            $monthSql = Month::get();
            $months = [];
            foreach($monthSql as $month){           
                $months[$month->id] = $month->name;            
            }

            $yearSql = Fiscalyear::get();
            $years = [];
            foreach($yearSql as $year){           
                $years[$year->id] = $year->year;            
            }



            return view('admin.ingresos.ingresos.index', compact('months', 'years'));

            }
        
           else {

            return redirect()->route('dashboard/perfil');
        }
    }

    public function getInvoice(Request $request)
    {


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
                'mes'           => $value->month->name,
                'daysinrecargo' => $value->daysinrecargo,
                'total'         => $value->total,
                'status'        => $value->status->name,
                'id'            => $value->id,
            );

            $objet[$i] = $array;
            $i++;

        }

        return $objet;
    }
  
    
    public function updatePagos(Request $request)
    {

        $document_id = $request->get("document_id");
        $status = $request->get('status');

        $invoice = Invoice::findOrfail($document_id);
        $invoice->status_id = $status;

        if($invoice->update())
        {

            $message = "Actualizado Correctamente";
        }
        else
        {
            $message = "Error al Actualizar";
        }

        
        return redirect()->route('obligaciones-pagos')->with('info', $message);

    }
}

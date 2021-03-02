<?php

namespace App\Http\Controllers\Propietario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservas;
use App\Models\Zonascomunes;
use Carbon\Carbon;
use Auth;
class ReservasController extends Controller
{


    public function reserva($slug){


       $cop_id = \Session::get('copropiedad');
    	 
       $zona = Zonascomunes::where('copropiedad_id', $cop_id)
                          ->where('slug', $slug)
                          ->select('id', 'name', 'slug')
                          ->get();

       return view('propietario.reservas.reserva', compact('zona'));
    }



    public function getreservasjs(Request $request){

      $cop_id = \Session::get('copropiedad');
      $zonacomun_id = $request->get('zonacomun_id');

    	$reservasSql = Reservas::where('copropiedad_id', $cop_id)
                            ->where('zonacomun_id', $zonacomun_id)
                            ->get();

      $objeto = array();

        $i=0;

        foreach ($reservasSql as $key => $value) {

                 
         $reservas = array(

                      'title'       => $value->title,
                      'start'       => $value->start.' '.$value->start_time,
                      'end'         => $value->end. ' '.$value->end_time,
                      'color'       => $value->color,             
                      'textColor'   => $value->textColor,
                      'description' => $value->description,

                    );

              $objeto[$i] = $reservas;
              $i++;

            }

         //   return $objeto;
       return response()->json($objeto);
      
    }


    public function savereservasjs(Request $request)
    {

        $cop_id         = \Session::get('copropiedad');
        $inmueble_id    =  \Session::get('inmueble');
        $user_id        =  auth()->user()->id;  

        
        $validacion_reserva = $this->ValidacionReserva($request);

       


        if($validacion_reserva == false )

          {
              $reserva = Reservas::create([

                      'title'           => $request->get('title'),
                      'description'     => $request->get('description'),
                      'color'           => $request->get('color'),
                      'textColor'       => $request->get('textColor'),
                      'start'           => $request->get('start'),
                      'start_time'      => $request->get('start_time'),
                      'end'             => $request->get('end'),
                      'end_time'        => $request->get('end_time'),
                      'zonacomun_id'    => $request->get('zonacomun_id'),
                      'user_id'         => $user_id,
                      'copropiedad_id'  => $cop_id,
                      'inmueble_id'     => $inmueble_id,
                      'inmueble_id'     => $inmueble_id,
                      'reservastatus_id'  => 1,

              ]);

              $data = array(

                  'status'  => 'success',
                  'code'    => 200,
                  'message' => 'La Reserva se ha creado con exito',
                  'validacion' => $validacion_reserva,
                  'params'     => $request,
              
                );

          }

          if($validacion_reserva == true )
          {

              $data = array(

                  'status'  => 'error',
                  'code'    => 404,
                  'message' => 'Ya Existe una Reserva en esta fecha y/o Fecha no Valida para Reservar',
              
                );
          }
    	    

          return response()->json($data, $data['code']);
    }


    public function ValidacionReserva($request)
    {


          $start        = $request['start'];
          $end          = $request['end'];
          $zonacomun_id = $request['zonacomun_id'];
          $start_time   = $request['start_time'] ;

          //TODAY
          $todayh     = Carbon::now();
          $Valuetoday = $todayh->toDateString();
                


          if($start  >  $Valuetoday)
          {


             $reserva = Reservas::where('zonacomun_id', $zonacomun_id)
                                    ->where('start', $start)
                                    ->get();


              $i= 0;


              foreach ($reserva as $key => $value) {
                      
                      $starSql       = $value->start;
                      $start_timeSql = $value->start_time;
                      $end_timeSql   = $value->end_time;

                      //Evaluamos el dia
                        if($starSql == $start)
                        {   
                            //Evaluamos la Hora de Inicio
                            if($start_time == $start_timeSql)
                            {

                              $i++;
                            }

                            //Evaluamos la Hora de Fin
                            if($start_time <= $end_timeSql)
                            {

                              $i++;
                            }
                        }

                  }//Fin Foreach
            }//Fin if Validatoday

            if($start  <  $Valuetoday)
            {

              return true;
              //Retorna Veradero, Es decir que se cumple al menos una condicion 
                  //para no guardar
              //la Fecha de inicio es menor a la fecha actual
            
            }


            //If Final despues de evaluar los registros
            if($i > 0)
            {

              return true;
            
            }

            if($i = 0)
            {

              return false;
            }

    }

    public function prueba()
    { 

      $todayh = getdate();

      $dd = $todayh['mday']-1;
      $mm = $todayh['mon'];
      $yy = $todayh['year'];


      $Valuetoday = $yy.'-'.$mm.'-'.$dd;

      dd($Valuetoday);
    }
}
<?php

namespace App\Http\Controllers\Admin\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Landing;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cop_id = \Session::get('copropiedad');

        $landing = Landing::where('copropiedad_id', $cop_id)->get();

            if(count($landing)>0)
            {

                $validate = 1;
            }
            else
            {
                $validate = 0;
            }

        return view('admin.landing.index', compact('validate', 'landing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $cop_name = \Session::get('copropiedad_name');

        return view('admin.landing.create' , compact('cop_name'));

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
        $cop_name = \Session::get('copropiedad_name');

        $landing = Landing::where('copropiedad_id', $cop_id)->get();

          $validatedData = Validator::make($request->all(),[
            

           'slug'        => 'required|unique:landings,slug',

           
            ]);

        if( $validatedData->fails() ){

             $message = "La Url ya es en uso, por favor ingrese otra";

             return redirect()->route('landing-page.create')->with('info', $message);
        
        }
        
        else {
      
            
            if(count($landing)>0)
            {
                $message = "Ya existe un sitio web para esta copropiedad";

               return redirect()->route('landing-page.index')->with('info', $message);
            }
            else {

                 $landing = Landing::create([


                        'copropiedad_id'     => $cop_id,                
                        'name_copropiedad'   => $cop_name,
                        'slug'               => $request->get('slug'),

                ]);


                 $message = "Registro creado correctamente";

                 return redirect()->route('landing-page.index')->with('info', $message);
            }

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
        


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        $cop_id = \Session::get('copropiedad');



        $landing = Landing::Where('copropiedad_id', $cop_id)
                            ->get();

        foreach ($landing as $value) {
                
                $id = $value->id;
        }



        return view('admin.landing.edit', compact('landing', 'id'));
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

        $id = $request->get('landing_id');
        $slug = $request->get('slug');
        $url_new= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug), '-'));
        

        if(isset($url_new))
        {

            $landing = Landing::findOrFail($id);
            $landing->slug = $url_new;
            $landing->save();
             $message = "Actualizado Correctamente";
        }
        else{
             $message = "Error al Actualizar";
       
         }
      return redirect()->route('landing-page.edit', 1 )->with('info', $message);
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


    public function logo(Request $request)
    {

        $cop_id = \Session::get('copropiedad');
        
        $landing = $request->get('id');

        $landing = Landing::find($landing);

        if($request->file('file')){

            $file = $request->file('file');
            $fname = $file->getClientOriginalName();
            $filename = $cop_id.'_'.$fname;

            $file->move('uploads/landing/'.$cop_id, $filename);
            $fnsave = 'uploads/landing/'.$cop_id.'/'.$filename;
            

            $landing->fill(['url_logo'=>asset('/'.$fnsave)])->save();

        }


          return response()->json($request);

    }


    public function uploads(Request $request)
    {

        //dd($request);
        $cop_id = \Session::get('copropiedad');
        
        $landing = $request->get('id');
        $value =    $request->get('value');

        $landing = Landing::find($landing);

        if($request->file('image')){

            $file = $request->file('image');
            $fname = $file->getClientOriginalName();
            $filename = $cop_id.'_'.$fname;

            $file->move('uploads/landing/'.$cop_id, $filename);
            $fnsave = 'uploads/landing/'.$cop_id.'/'.$filename;
            

            $landing->fill([ $value => asset('/'.$fnsave)])->save();

            $response = array(

                    'code'      => 200,
                    'message'   => 'Guardado correctamente',
            );
        }


           return response()->json($response);
    }


    public function textinput(Request $request)
    {


       

        $option = $request->get('option');
        $value_id = $request->get('value_id');
        $textinput = $request->get('textinput');

         $landing = Landing::find($value_id);

          $landing->fill([ 

                $option => $textinput,

            ])->save();

        $message = "Registro creado correctamente";
        
        return redirect()->route('landing-page.edit', 1 )->with('info', $message);

 
    }

    public function delete(Request $request)
    {

        $id = $request->get('id');

        $landing = Landing::find($id);
        $landing->delete();


        return redirect()->route('landing-page.index');
    }
}

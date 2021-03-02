<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('permission:userdetails-create')->only(['create', 'store']);    
        $this->middleware('permission:userdetails-index')->only('index');
        $this->middleware('permission:userdetails-edit')->only(['edit','update']);
        $this->middleware('permission:userdetails-show')->only('show');
        $this->middleware('permission:userdetails-destroy')->only('destroy');
    
    
    }
    
    public function index()
    {   
       
        if(\Auth::user()->role == 1){

            $profiles = User::get();
        }

       else {

        $profiles = User::where('parent_id', \Auth::user()->id)->get();
            
       }


        

        return view('admin.profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileStoreRequest $request)
    {   

        $user_id = Auth::user()->id;

        $profile = User::create($request->all());
        $profile->fill(['parent_id'=>$user_id])->save();

        if($request->file('file')){

            $file = $request->file('file');
            $fname = $file->getClientOriginalName();
            $filename = $profile->id.'_'.$fname;

            $file->move('uploads/profiles', $filename);
            $fnsave = 'uploads/profiles'.'/'.$filename;
            
            $profile->fill(['file'=>asset('/'.$fnsave)])->save();

        }

        return redirect()->route('userdetails.index')->with('info', 'Usuario Creado con Exito');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $profile = User::findOrFail($id);
        

        return view('admin.profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $profile = User::findOrFail($id);

        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request, $id)
    {   
        
        $profile = User::findOrFail($id);

        $profile->update($request->all());
        
        if($request->file('file')){

            $file = $request->file('file');
            $fname = $file->getClientOriginalName();
            $filename = $profile->id.'_'.$fname;

            $file->move('uploads/profiles', $filename);
            $fnsave = 'uploads/profiles'.'/'.$filename;
            
            $profile->fill(['file'=>asset('/'.$fnsave)])->save();

        }

        return redirect()->route('userdetails.index')->with('info', 'Usuario Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function delete($id)
    {
        $profile = User::find($id);        
        $profile->delete();

          
          

        

        $message = $profile ? 'Usuario Eliminado Correctamente' : 'Error al Procesar';

        return redirect()->route('userdetails.index')->with('info', $message);
    }

   
}

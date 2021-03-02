<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InmuebleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
         return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       $rules = [
           
            'name'                  => 'required',
            'bloque_id'             => 'required',
            'user_id'               => 'required|integer',
           
           
          
        ];

      
        return $rules;
    }

    public function messages(){

        $info =  [
            
            'name.required'  => 'El Nombre es requerido',
            'bloque_id.required' => 'El Bloque es requerido',
            'user_id.required'  => 'El Propietario es requerido',
            'user_id.integer'  => 'El Propietario es requerido',
           
        ];

        return $info;
    }
}

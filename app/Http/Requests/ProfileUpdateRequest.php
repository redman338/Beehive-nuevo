<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
           
            'phone_1'       => 'required|integer',
            'nit'           => 'required|integer',
            'email'         => 'required|string|email',
          
        ];

         // if($this->get('file'))
           
        //     $rules = array_merge($rules, ['file' => 'mimes: jpg,jpeg,png']);

        return $rules;
    }


     public function messages()
    {
        
        $info =  [
            
            'name.required'  => 'El Nombre es requerido',
            'phone_1.required' => 'El Telefono es requerido',
            'phone_1.integer'  => 'El Telefono solo deben de ser numeros',
            'nit.required'   => 'El Nit es requerido',
            'nit.integer'    => 'El Nit solo deben de ser numeros',
            'nit.unique'     => 'El Nit ya existe',
            'nit.max'        => 'Cédula / Nit máximo 10 caracteres',
            'nit.min'        => 'Cédula mínimo 5 caracteres',
            'email.required'  => 'El Correo electronico es requerido',
            'email.unique'      => 'El Correo electronico ya existe',
            'email.email'      => 'El Correo electronico no es una direccion de correo valida',

            'file.mimes'  => 'El imagen debe de tener extension .jpg, jpeg, png',
        ];

        return $info;
    }
}

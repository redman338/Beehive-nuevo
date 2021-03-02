<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersStoreRequest extends FormRequest
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
            
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status'    => ['required'],
            'role'       => ['required'],
        ];
        
        return $rules;


    }

     public function messages()
    {
        
        $info =  [
            
            'name.required'     => 'El Nombre es requerido',
            'status.required'    => 'El Estado es requerido',
            'role.required'       => 'El Rol es requerido',
            'email.required'  => 'El Correo electronico es requerido',
            'email.unique'      => 'El Correo electronico ya existe',
            'email.email'      => 'El Correo electronico no es una direccion de correo valida',
            'password.required'      => 'La Contraseña es requerida',   
            'password.confirmed'      => 'Las Contraseñas no coinciden',      
            
        ];

        return $info;
    }
}

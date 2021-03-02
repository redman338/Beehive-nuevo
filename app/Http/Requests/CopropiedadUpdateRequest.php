<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CopropiedadUpdateRequest extends FormRequest
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
            
            'name'                  => 'required|',
            'address'               => 'required|string',
            'tipocopropiedad_id'    => 'required',
            'tipoadministracion_id' => 'required',
            'user_id'               => 'required|integer',

          
        ];

        // if($this->get('file'))
           
        //     $rules = array_merge($rules, ['file' => 'mimes: jpg,jpeg,png']);

        return $rules;
    }

    public function messages(){

        $info =  [
            
            'name.required'                 => 'El Nombre es requerido',
            'phone_1.required'              => 'El Telefono es requerido',
            'phone_1.integer'               => 'El Telefono solo deben de ser numeros',
            'address.required'              => 'La Direccion es requerida',
            'tipocopropiedad_id.required'   => 'El tipo copropiedad es requerido',
            'tipoadministracion_id.required'=> 'El tipo administracion es requerido',
            'user_id.required'              => 'El Administrador Delegado es requerido',
            'user_id.integer'               => 'El Administrador Delegado es requerido',

                       

            'file.mimes'  => 'El imagen debe de tener extension .jpg, jpeg, png',
        ];

        return $info;
    }
}

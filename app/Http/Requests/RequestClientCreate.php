<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestClientCreate extends FormRequest
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
        return [
            //
            'Nombre'=>'required',
            'Cif'=>'required',
            'Direccion'=>'required',
            'Ciudad'=>'required',
            'Estado'=>'required',
            'CodigoPostal'=>'required',
            'Telefono'=>'required|min:9'

        ];
    }
}

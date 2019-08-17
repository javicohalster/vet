<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarHospitalizarRequest extends FormRequest
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
            'peso'      => 'required',
            'temperatura'      => 'required',
            'diagnostico'   => 'required',
            'tratamiento'   => 'required',
            'receta'   => 'required'
            
        ];
    }
    public function messages()
    {
        return [
            'peso.required'    => 'El campo peso es obligatorio.',
            'temperatura.required'    => 'El campo temperatura es obligatorio.',
            'diagnostico.required' => 'El campo Diagnostico es obligatorio.',
            'tratamiento.required' => 'El campo Tratamiento es obligatorio.',
            'receta.required' => 'El campo Medicación Recetada es obligatorio.'
        ];
    }
}

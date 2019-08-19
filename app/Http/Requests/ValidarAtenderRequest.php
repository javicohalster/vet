<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarAtenderRequest extends FormRequest
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
           // 'sintomas'      => 'required',
         ///   'examenes'      => 'required',
         //   'tratamiento'   => 'required',
         //   'observacion'   => 'required'
            
        ];
    }
    public function messages()
    {
        return [
          //  'sintomas.required'    => 'El campo Anamnesis es obligatorio.',
          //  'examenes.required'    => 'El campo Pruebas realizadas es obligatorio.',
         //   'tratamiento.required' => 'El campo Tratamiento es obligatorio.',
         //   'observacion.required' => 'El campo Resultados es obligatorio.',
        ];
    }
}

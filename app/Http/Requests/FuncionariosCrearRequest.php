<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionariosCrearRequest extends FormRequest
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
            'nombre'=>'required',
            'apellido'=>'required',
            'cedula'=>'required',
            'celular'=>'required',
            'fecha_nacimiento'=>'required',
            'correo'=>'required',
            'tarjeta_rfid'=>'required',
            'horario_normal'=>'required',
        ];
    }
}

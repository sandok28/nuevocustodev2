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

            'nombre'=>'required|min:4|max:15|alpha',
            'apellido'=>'required|min:4|max:15|alpha',
            'cedula'=>'required|min:100000|max:9999999999|numeric|unique:funcionarios',
            'celular'=>'required|min:9999999999|max:3230000000|numeric',
            'fecha_nacimiento'=>'required|date_format:"Y-m-d',
            'correo'=>'required|max:30|email',
            'tarjeta_rfid'=>'required|max:8|alpha_num|regex:/^[0-9a-fA-F]+$/',
            'horario_normal'=>'required',

        ];
    }
}

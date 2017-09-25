<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuertasActualizarRequest extends FormRequest
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
            'puerta_especial' => 'required',
            'nombre' =>'required|min:4|max:15|alpha_dash|regex:/^[a-zA-Z]+(\s*[a-zA-Z])[a-zA-Z]+$/',
            'llave_rfid' => 'required|max:9|alpha_num|regex:/^[0-9a-fA-F]+$/',
            'ip' => 'required|ip',
        ];
    }
}

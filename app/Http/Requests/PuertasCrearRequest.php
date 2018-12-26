<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuertasCrearRequest extends FormRequest
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
            'nombre' =>'required|min:4|max:100|unique:puertas',
            'llave_rfid' => 'required|max:8|alpha_num|regex:/^[0-9a-fA-F]+$/|unique:puertas',
            'ip' => 'required|ip|unique:puertas',
        ];
    }
}

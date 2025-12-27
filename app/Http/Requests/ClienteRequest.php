<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'documento' => 'required|string|max:20|unique:cliente,documento,' . $this->cliente?->documento . ',documento',
            'cod_tipo_documento' => 'required',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:150',
            'cod_ciudad' => 'required',
            'telefono' => 'nullable|string|max:20',
        ];
    }
}

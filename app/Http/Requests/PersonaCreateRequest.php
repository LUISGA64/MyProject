<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'id_tipo_doc' => ,
        'identificacion',
        'nombre_1',
        'nombre_2',
        'apellido_1',
        'apellido_2',
        'telefono',
        'direccion',
        'id_genero',
        'id_estado_civil',
        'cabeza_familia',
        'id_niveleducativo',
        'id_grupo_familiar',
        'id_ocupacion',
        'id_parentesco'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResguardoRequest extends FormRequest
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
            /*'resguardo'        => 'required|unique:resguardos',
            'identificacion'   => 'required',
            'logo_resg'        => 'image|required',
            'email_resg'       => 'E-Mail',*/
        ];
    }

}

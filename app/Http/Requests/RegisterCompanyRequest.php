<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCompanyRequest extends FormRequest
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
            'name' => ['required'],
            'identity' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'catalogo_path'  => ['required','max:2048'],
            'company_type_id'  => ['required','exists:company_types,id'],
        ];
    }
}

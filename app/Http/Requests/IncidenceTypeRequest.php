<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
 
class IncidenceTypeRequest extends FormRequest
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
        $type = $this->route('incidence_type');
        if($type){
            return [
              'type' => 'required|max:25|unique:incidence_types,id,'.$type->id,
            ];
        }
        return [
          'type' => 'required|unique:incidence_types|max:25'
        ];
    }
}

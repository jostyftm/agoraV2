<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [

            'headquarter_id.required'    =>  'La sede es requerida',
            'grade_id.required'          =>  'El grado es requerido',
            'type.required'              =>  'El tipo de grupo es requerido',
            'modality.required'          =>  'La modalidad es requerida',
            'working_day_id.required'    =>  'La jornada es requerida',
            'name.required'              =>  'El nombre del grupo es requerido',
            'quota.numeric'              =>  'El cupo debe ser númerico',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'headquarter_id'    =>  'required',
            'grade_id'          =>  'required',
            'type'              =>  'required',
            'modality'           =>  'required',
            'working_day_id'    =>  'required',
            'name'              =>  'required',
            'quota'             =>  'numeric',
        ];
    }
}

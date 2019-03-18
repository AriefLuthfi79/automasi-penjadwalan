<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class AreaStoreRequest extends BaseFormRequest
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
            'code_area' => 'required|unique:areas',
            'name'      => 'required|string|max:20',
            'capacity'  => 'required'
        ];
    }

    /**
    * Return flash messages if not validate
    *
    * @return array
    */
    public function messages()
    {
        return [
            'code_area.required' => 'Code area cannot be blank',
            'name.required'      => 'Name area cannot be blank'
        ];
    }

    /**
    * Save data to database
    *
    * @param $object, $data
    * @return \App\Area
    */
    public function save($object)
    {
        return $object->create($this->validated());
    }
}

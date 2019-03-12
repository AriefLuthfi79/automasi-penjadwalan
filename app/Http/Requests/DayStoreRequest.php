<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DayStoreRequest extends BaseFormRequest
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
            'code_day' => 'required|unique:days',
            'name' => 'required|string|max:20'
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
            'code_day.required' => 'Code day must required!',
            'name.required' => 'Name must required!',
        ];
    }

    /**
    * Save data to database
    *
    * @param $object, $data
    * @return \App\Days
    */
    public function save($object)
    {
        return $object->create($this->validated());
    }
}

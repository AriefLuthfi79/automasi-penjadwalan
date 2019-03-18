<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'name'    => 'required|string',
            'divisi'  => 'required|string|max:20',
            'surname' => 'required|string|max:20'
        ];
    }

    /**
    * Return flash messsages if not validate
    *
    * @return array
    */
    public function messages()
    {
        return [
            'name.required' => 'Name cannot be blank!',
            'divisi.required' => 'Divisi cannot be blank!',
            'surname.required' => 'Surname cannot be blank!'
        ];
    }

    /**
    * Save data to database
    *
    * @param object
    * @return boolean
    */
    public function save($object)
    {
        return $object->create($this->validated());
    }
}

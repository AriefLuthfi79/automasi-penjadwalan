<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

abstract class BaseFormRequest extends FormRequest
{
	/**
	* Get the validation rules that apply to the request.
	*
	* @return array
	*/
	abstract public function rules();

	/**
	* Determine if the user is authorized to make this request.
	*
	* @return bool
	*/
	abstract public function authorize();

	/**
	* Save data to database
	*
	* @return object
	*/
	abstract public function save($object);
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	/**
	* Table name with the given string value
	*
	* @var string
	*/
	protected $table = 'students';

	protected $guarded = [];
}

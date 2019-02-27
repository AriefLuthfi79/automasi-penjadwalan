<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
	/**
	* Table name with the given string value;
	*
	* @var string
	*/
    protected $table = 'days';

    protected $fillable = ['code_day', 'name'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	/**
	* Table name with the given string value
	*
	* @var string 
	*/
    protected $table = 'areas';

    protected $fillable = ['code_area', 'name'];
}

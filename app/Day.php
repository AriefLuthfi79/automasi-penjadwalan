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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code_day', 'name'];
}

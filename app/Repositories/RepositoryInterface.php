<?php

namespace App\Repositories;

interface RepositoryInterface
{
	/**
	* Get all data from repository
	* 
	*/
	public function getAll();

	/**
	* Show abstract method
	* @param $id integer
	*/
	public function detail($id);

	/**
	* Create abstract method
	* @param $attributes array associative
	*/
	public function create(array $attributes);

	/**
	* Delete abstract method
	* @param $id integer
	*/
	public function destroy($id);

	/**
	* Update abstract method
	* @param $id integer
	*/
	public function updateData(array $attributes, $id);

	/**
	* Get pagination
	*
	* @param $count
	*/
	public function getPaginated(int $count);
}
<?php

namespace App\Repositories;

use App\Student;
use App\Repositories\RepositoryInterface;

class StudentRepository implements RepositoryInterface
{
	/**
	* Representing model
	*
	* @var object
	*/
	private $model;

	/**
	* Injecting model to this class's construct
	*
	* @param model
	*/
	public function __construct(Student $model)
	{
		$this->model = $model;
	}

	/**
	* Override method from repository interface to get all data
	*
	* @return Collection
	*/
	public function getAll()
	{
		return $this->model->all();
	}

	/**
	* Override method detail to get data from id
	*
	* @param string $id
	* @return Collection 
	*/
	public function detail($id)
	{
		return $this->model->findOrFail($id);
	}

	/**
	* Store the data to database
	*
	* @param $attributes array
	* @return boolean
	*/
	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}

	/**
	* Override abstract method destroy to destroy data
	* 
	* @param $id string
	*/
	public function destroy($id)
	{
		return $this->model->findOrFail($id)->delete();
	}

	/**
	* Override method update to update data from model
	*
	* @param int $id
	*/
	public function updateData(array $attributes, $id)
	{
		return $this->model->findOrFail($id)->update($attributes);
	}

	/**
	* Override method getPaginated
	*
	* @param int $count = 15
	*/
	public function getPaginated($count = 15)
	{
		return $this->model->paginate($count);
	}
}
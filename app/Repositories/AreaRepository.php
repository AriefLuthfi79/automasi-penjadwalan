<?php

namespace App\Repositories;

use App\Area;
use App\Repositories\RepositoryInterface;

/**
 * AreaRepository class
 */
class AreaRepository implements RepositoryInterface
{
	/**
	* Representing model
	*
	* @var object
	*/
	private $model;

	/**
	* Injecting Model to this repository class
	*
	* @param object 
	*/
	public function __construct(Area $model)
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
	* Override method detail to get data from model
	*
	* @param integer $id
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
	* @param $id
	*/
	public function updateData(array $attributes, $id)
	{
		return $this->model->where('id', $id)->update($attributes);
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
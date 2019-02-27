<?php

namespace App\Http\Controllers;

use App\Day;
use App\Repositories\DayRepository;
use Illuminate\Http\Request;

class DayController extends Controller
{
	/**
	* Representing repository
	* @var object $repository 
	*/
	private $repository;

	/**
	* Injecting Repository to construct
	*
	* @param App\Repositories\DayRepository
	*/
	public function __construct(DayRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	* Direct to view days
	*
	* @return Illuminate\Database\Eloquent\Collection
	* @return view
	*/
	public function index()
	{
		$title = "All Days";
		$days = $this->repository->getAll();

		return view('days.index', compact('title', 'days'));
	}

	/**
	* Store the data to database with the given request
	*
	* @param Illuminate\Http\Request
	* @return view
	*/
	public function store(Request $request)
	{

		try {
			$this->repository->create($request->all());
			return redirect()->back()->with('success', 'Record succesfully created');
		} catch (\Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}

	/**
	* Destroy the data with the given id
	*
	* @param Illuminate\Http\Request
	* @return direct
	*/
	public function destroy($id)
	{
		try {
			$this->repository->destroy($id);
			return redirect()->back()->with('danger', 'Record succesfully deleted');
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}
}

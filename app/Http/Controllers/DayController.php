<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Http\Requests\DayStoreRequest;
use App\Repositories\DayRepository;

class DayController extends Controller
{
	/**
	* Representing repository
	*
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
	public function store(DayStoreRequest $request)
	{
		try {
			$request->save($this->repository);
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

	/**
	* Get the data if request ajax
	*
	* @param integer $id, Illuminate\Http\Request $request
	* @return json
	*/
	public function show(Request $request, $id)
	{
		if ($request->ajax()) {
			$day = $this->repository->detail($id);
			return Response::json($day);
		}
	}

	public function update(Request $request, $id)
	{
		try {
			$data = [
				"code_day" => $request->input('code_day'),
				"name" => $request->input('name')
			];
			$this->repository->updateData($data, $id);
			return redirect()->back()->with('success', "Record succesfully updated");
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}
}

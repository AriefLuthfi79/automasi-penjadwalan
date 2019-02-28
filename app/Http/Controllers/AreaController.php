<?php

namespace App\Http\Controllers;

use Response;
use App\Repositories\AreaRepository;
use Illuminate\Http\Request;

class AreaController extends Controller
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
    * @param App\Repositories\AreaRepository
    */
    public function __construct(AreaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "All Area Picket";
        $areas = $this->repository->getAll();
        return view('areas.index', compact('title', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->repository->create($request->all());
            return redirect()->back()->with('success', 'Record successfully created');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $area = $this->repository->detail($id);
            return Response::json($area);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       try {
            $data = [
                "code_area" => $request->code_area,
                "name"      => $request->name,
                "capacity"  => $request->capacity
            ];
            $this->repository->updateData($data, $id);
            return redirect()->back()->with('success', "Record successfully updated");
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->repository->destroy($id);
            return redirect()->back()->with('success', 'Record successfully created');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

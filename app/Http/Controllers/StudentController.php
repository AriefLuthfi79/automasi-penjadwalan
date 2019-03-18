<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use App\Repositories\StudentRepository;

class StudentController extends Controller
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
    public function __construct(StudentRepository $repository)
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
        $title = "All Students";
        $students = $this->repository->getAll();
        return view('students.index', compact('title', 'students'));   
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
            return redirect()->back()->with('error', $e->getMessages());
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
        $student = $this->repository->detail($id);
        if (!$request->ajax()) {
            if (!$student) {
                return response()->json(['message' => 'Record not found'], 404);
            }
            return response()->json(['message' => 'Bad Request'], 400);
        }

        return Response::json($student);
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
                "name" => $request->name,
                "divisi" => $request->divisi,
                "surname" => $request->surname
            ];
            $this->repository->updateData($data, $id);
            return redirect()->back()->with('success', 'Record successfully updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessages());
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
            return redirect()->back()->with('danger', 'Record successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessages());
        }
    }
}

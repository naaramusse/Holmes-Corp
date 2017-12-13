<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::orderBy('id', 'desc')->paginate(10);
//print_r('aqui');die;
		return view('courses.index', compact('courses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('courses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$course = new Course();

		$course->name = $request->input("name");
        $course->department_id = $request->input("department_id");
        $course->department_id = $request->input("department_id");

		$course->save();

		return redirect()->route('courses.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = Course::findOrFail($id);

		return view('courses.show', compact('course'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::findOrFail($id);

		return view('courses.edit', compact('course'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$course = Course::findOrFail($id);

		$course->name = $request->input("name");
        $course->department_id = $request->input("department_id");
        $course->department_id = $request->input("department_id");

		$course->save();

		return redirect()->route('courses.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$course = Course::findOrFail($id);
		$course->delete();

		return redirect()->route('courses.index')->with('message', 'Item deleted successfully.');
	}

}
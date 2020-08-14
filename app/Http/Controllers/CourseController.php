<?php

namespace App\Http\Controllers;

use App\Model\Course;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\CourseUpdateRequest;
use App\Model\Grade;

class CourseController extends Controller
{
    // Constructor
    public function __construct()
    {
        // $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('courses.new', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'code' => 'required|min:2|max:5|unique:courses',
            'grade_id' => 'required',
            'name' => 'required|min:3|max:150',
            'fee' => 'required|numeric',
        ]);
        $user_id = Auth::user()->id;

        $data = New Course;
        $data->grade_id = $request->grade_id;
        $data->name = $request->name;
        $data->price = $request->fee;
        $data->user_id = $user_id;
        $data->save();

        Session::flash('success', 'Course has been created.<script> notify("success","Course has been created successfully.") </script> ');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $grades = Grade::all();
        return view('courses.edit', compact('course', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request, $id)
    {
        // continue from here
        $course = Course::findOrFail($id);
        $course->name = $request->name;
        $course->grade_id = $request->grade_id;
        $course->price = $request->fee;
        $course->update();

        return back()->withSuccess($course->name . ' course has been updated.<script> notify("success","Course has been created successfully.") </script> ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Course::destroy($id);
        if ($res) {
            return back()->withSuccess(" <i class='fas fa-trash'></i> course has been deleted.");
        } else {
            return back()->withError("<i class='fas fa-times'></i> course not found.");
        }

    }
}

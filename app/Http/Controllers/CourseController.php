<?php

namespace App\Http\Controllers;

use App\Model\Course;
use Auth;
use Session;
use Illuminate\Http\Request;

class CourseController extends Controller
{
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
        return view('courses.new');
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
            'code' => 'required|min:2|max:5|unique:courses',
            'name' => 'required|min:3|max:150',
            'fee' => 'required|numeric',
        ]);
        $user_id = Auth::user()->id;

        $data = New Course;
        $data->code = $request->code;
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
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}

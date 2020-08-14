<?php

namespace App\Http\Controllers;

use App\Model\Enrollment;
use App\Model\Grade;
use App\Model\Course;
use App\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $groups = Grade::all();
        $courses = Course::all();
        return view('enrol.index', compact('courses'));
    }


    public function allgroups($code){
        $group = Group::where('code', $code)->first();
        $offeredcourses = OfferedCourse::where('group_id', $group->id)->get();

        return view('enrol.singlegroup', compact('group', 'offeredcourses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enrol = new Enrollment;
        $enrol->course_id = $request->course_id;
        $enrol->user_id = $request->enrol_id;
        $enrol->created_by = auth()->user()->id;
        $enrol->save();
        return back()->withSuccess('Enrollment has been created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $users = User::where('role', 'student')->where('grade_id', $course->grade_id)->get();
        $userslist = User::where('role', 'student')->pluck('id');
        $listcheck = [];

        // dd($course->enrollments);
        foreach($course->enrollment as $enrol):
            $listcheck[] = $enrol->user_id;
        endforeach;
        // return "bac";
        return view('enrol.details', compact('course', 'users', 'userslist', 'listcheck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment, Request $request)
    {
        $delete = Enrollment::destroy($request->enrol_id);
        return back()->withSuccess('Enrollment has been deleted.');
    }
}

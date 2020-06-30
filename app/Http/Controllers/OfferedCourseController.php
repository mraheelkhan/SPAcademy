<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferedCourseRequest;
use App\Model\OfferedCourse;
use App\Model\Group;
use App\Model\Course;
use Illuminate\Http\Request;

class OfferedCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offeredcourses = OfferedCourse::all();
        return view('offeredcourses.index', compact('offeredcourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        $courses = Course::all();
        return view('offeredcourses.new', compact('groups', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferedCourseRequest $request)
    {
        $user_id = auth()->user()->id;

        $data = New OfferedCourse;
        $data->course_id = $request->course_id;
        $data->group_id = $request->group_id;
        $data->user_id = $user_id;
        $data->save();
        
        return redirect()->route('offeredcourse.index')->withSuccess('Course has been offered to group.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\OfferedCourse  $offeredCourse
     * @return \Illuminate\Http\Response
     */
    public function show(OfferedCourse $offeredCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\OfferedCourse  $offeredCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(OfferedCourse $offeredCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\OfferedCourse  $offeredCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfferedCourse $offeredCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\OfferedCourse  $offeredCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = OfferedCourse::destroy($id);
        if ($res) {
            return back()->withSuccess(" <i class='fas fa-trash'></i> offered course has been deleted.");
        } else {
            return back()->withError("<i class='fas fa-times'></i> offered course not found.");
        }
    }
}

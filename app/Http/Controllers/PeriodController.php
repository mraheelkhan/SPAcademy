<?php

namespace App\Http\Controllers;

use App\Model\Grade;
use App\Model\Course;
use App\Model\Period;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::where('period_at', '<', Carbon::now())
        ->update(['is_done' => 1 ]);

        $courses = Course::all();
        $periods = Period::orderBy('period_at', 'desc')->get();
        return view('classes.index', compact('courses', 'periods'));
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
        $timedate = $request->timedate;//->format('Y-m-d H:i:s');
        $time = $request->timedatetime;//->format('Y-m-d H:i:s');
        // $timedate = Carbon::createFromFormat('Y-m-d', $timedate)->format('Y.m.d');
        // $timedate = Carbon::createFromFormat('m/d/Y h:i:s', $request->timedate)->format('Y-m-d');
        $timedate = date('Y-m-d H:i:s', strtotime($timedate));
        // dd($timedate);
        // strtotime($timedate);
        $course_id = $request->course_id;
        $link = $request->link;

        $courses = Course::findOrFail($course_id);
        $grade_id = $courses->grade_id;
        // $time = date("d-m-Y h:i:s", strtotime($timedate));


        $class = new Period;
        $class->user_id = auth()->user()->id;
        $class->course_id  = $course_id;
        $class->grade_id   = $grade_id;
        $class->period_at = $timedate;
        $class->period_time = $time;
        $class->link = $link;

        $class->save();
        return back()->withSuccess('Class has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offeredCourses = Course::where("grade_id", $id)->get();
        return view('classes.details', compact('offeredCourses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Period::destroy($id);
        if ($res) {
            return back()->withSuccess(" <i class='fas fa-trash'></i> class has been deleted.");
        } else {
            return back()->withError("<i class='fas fa-times'></i> class not found.");
        }
    }
}

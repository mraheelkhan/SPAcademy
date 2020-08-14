<?php

namespace App\Http\Controllers;

use App\Model\ApplyCourse;
use App\Model\Course;
use App\Model\Enrollment;
use App\User;
use App\Model\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // change is_done to 1 for all classes that are beyond the time. 
        $periods = Period::where('period_at', '<', Carbon::now())
        ->update(['is_done' => 1 ]);

        $newApplicants = ApplyCourse::where('is_new', true)->count();
        $course_ids = Enrollment::where('user_id', auth()->user()->id)->pluck('course_id');
        $classes = Period::whereIn('course_id', $course_ids)
                    ->where('is_done', 0)
                    ->orderBy('period_at', 'desc')
                    ->get();
        // dd($classes);
        //checking if difference is lessthan 12 hours
        foreach($classes as $class):
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $class->period_at);
            $from = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());

            $diff_in_hours = $to->diffInHours($from);
            $class->difference = $diff_in_hours;
            // if difference is lessthan 12 hours, do show the classes to student
            if($diff_in_hours < 24){
                $class->isShow = true;
            } else {
                $class->isShow = false;
            }
        endforeach;
        // dd($classes);
        return view('pages.dashboard', compact('classes'));
    }

    public function applyCourse(){
        $courses = Course::where('grade_id', auth()->user()->grade_id)->get();
        return view('register-course', compact('courses'));
    }

    public function applyStore(Request $request){

        // dd($request->all());
        $class = new ApplyCourse;
        $class->user_id = auth()->user()->id;
        $class->course_id  = $request->course_id;
        $class->description = $request->description;

        $class->save();
        return back()->withSuccess('Course application submitted to Admininstration.');
    }

    public function showApplicants(){
        $applicants = ApplyCourse::where('is_deleted', 0)->get();
        ApplyCourse::where('is_new', true)->update(['is_new' => false]);
        // dd('sdafas');
        return view('applicants', compact('applicants'));

    }
}

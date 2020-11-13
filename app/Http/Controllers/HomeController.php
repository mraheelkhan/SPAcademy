<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\Model\ApplyCourse;
use App\Model\Course;
use App\Model\Enrollment;
use App\Model\Grade;
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
        if (Auth::user()->can('passStudent')) {
            $grades = Grade::pluck('id');
            if (count(Auth::user()->apply_courses) == 0) {
                $courses = Auth::user()->grade->courses;
                return view('apply-courses', compact('courses'));
            }
        }
        // change is_done to 1 for all classes that are beyond the time. 
        $periods = Period::where('period_at', '<', Carbon::now())
        ->update(['is_done' => 1 ]);

        $newApplicants = ApplyCourse::where('is_new', true)->count();
        $registeredStudents = User::where('role', 'student')->count();
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

            $diff_in_hours = $to->diffInDays($from);
            $class->difference = $diff_in_hours;
            // if difference is lessthan 30days, do show the classes to student
            if($diff_in_hours < 31){
                $class->isShow = true;
            } else {
                $class->isShow = false;
            }
        endforeach;
        

        // for first time registration
        $courses = Course::where('grade_id', auth()->user()->grade_id)->get();
        return view('pages.dashboard', compact('classes', 'newApplicants', 'registeredStudents', 'courses'));
    }

    public function applyCourse(){
        $courses = Course::where('grade_id', auth()->user()->grade_id)->get();
        return view('register-course', compact('courses'));
    }

    public function applyBulk(Request $request){
        $data = [];
        foreach($request->courses as $course){
            $exists = ApplyCourse::where("user_id", auth()->user()->id)->where("course_id", $course)->exists();
            if($exists){
                return back()->withError('Already submited');
            }  
            $class = new ApplyCourse;
            $class->user_id = auth()->user()->id;
            $class->course_id  = $course;
            $class->save();
            $data[] = $class;
        }

        $mail_data = [
            'name'=>Auth::user()->name. " " . Auth::user()->lastname,
        ]; 

        Mail::send('mails.reg_mail', ['data' => $mail_data], function($message)
        {
          $message->to('irahilkhan@gmail.com', null)->from(env("MAIL_USERNAME", "portal@psacademyonline.com"))->subject('New Student Registration!');
        });
        /* Mail::send('mails.reg_mail', ['data' => $mail_data], function($message)
        {
          $message->to('saif.4843@gmail.com', null)->from(env("MAIL_USERNAME", "portal@psacademyonline.com"))->subject('New Student Registration!');
        });

        Mail::send('mails.reg_mail', ['data' => $mail_data], function($message)
        {
          $message->to('psa.academy.info@gmail.com', null)->from(env("MAIL_USERNAME", "portal@psacademyonline.com"))->subject('New Student Registration!');
        }); */

        return back()->withSuccess('Courses application submitted to Admininstration.');
    }
    public function applyStore(Request $request){

        // dd($request->all());
        $exists = ApplyCourse::where("user_id", auth()->user()->id)->where("course_id", $request->course_id)->exists();
        if($exists){
            return back()->withError('Already submited');
        }
        $class = new ApplyCourse;
        $class->user_id = auth()->user()->id;
        $class->course_id  = $request->course_id;
        $class->description = $request->description;
        $class->save();
        return back()->withSuccess('Course application submitted to Admininstration.');
    }

    public function showApplicants(){
        $applicants = ApplyCourse::where('is_deleted', 0)->orderBy('created_at', 'desc')->get();
        ApplyCourse::where('is_new', true)->update(['is_new' => false]);
        // dd('sdafas');
        return view('applicants', compact('applicants'));

    }

    public function enrolApplicants(Request $request){
        // dd($request->all());
        $exists = Enrollment::where('user_id', $request->user_id)->Where('course_id', $request->course_id)->exists();
        if($exists){
            return back()->withError('Student already enrolled in this course.');
        }
        $enrol = new Enrollment;
        $enrol->course_id = $request->course_id;
        $enrol->user_id = $request->user_id;
        $enrol->created_by = auth()->user()->id;
        $enrol->save();
        if($enrol){
            $applicants = ApplyCourse::findOrFail($request->applicant_id);
            $applicants->is_deleted = 1;
            $applicants->update();
        }
        return back()->withSuccess('Enrollment has been created.');

    }
    public function applyDestroy($id){
        $applicants = ApplyCourse::findOrFail($id);
        $applicants->is_deleted = 1;
        $applicants->update();
        return back()->withSuccess('Course application has been deleted');
    }
}

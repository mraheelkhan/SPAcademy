<?php

namespace App\Http\Controllers;

use App\Model\Enrollment;
use App\Model\Period;
use Carbon\Carbon;
use GroupUsers;

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
        // change is Done to 1 for all classes that are beyond the time. 

        $periods = Period::where('period_at', '<', Carbon::now())
        ->update(['is_done' => 1 ]);
        $group_ids = Enrollment::where('user_id', auth()->user()->id)->pluck('group_id');
        $classes = Period::whereIn('group_id', $group_ids)
                    ->where('is_done', 0)
                    ->orderBy('period_at', 'desc')
                    ->get();
        foreach($classes as $class):
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $class->period_at);
            $from = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());

            $diff_in_hours = $to->diffInHours($from);
            $class->difference = $diff_in_hours;
            if($diff_in_hours < 12){
                $class->isShow = true;
            } else {
                $class->isShow = false;
            }
        endforeach;
        // dd($classes);
        return view('pages.dashboard', compact('classes'));
    }
}

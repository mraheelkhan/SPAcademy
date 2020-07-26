<?php

namespace App\Http\Controllers;

use App\Model\Enrollment;
use App\Model\Period;
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
        $group_ids = Enrollment::where('user_id', auth()->user()->id)->pluck('group_id');
        $classes = Period::whereIn('group_id', $group_ids)->get();
        dd($classes);
        return view('pages.dashboard');
    }
}

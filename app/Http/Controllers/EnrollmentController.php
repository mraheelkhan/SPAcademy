<?php

namespace App\Http\Controllers;

use App\Model\Enrollment;
use App\Model\Group;
use App\Model\OfferedCourse;
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
        $groups = Group::all();
        $offeredcourses = OfferedCourse::all();
        return view('enrol.index', compact('offeredcourses', 'groups'));
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
        $enrol->group_id = $request->group_id;
        $enrol->user_id = $request->enrol_id;
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
        $group = Group::findOrFail($id);
        $users = User::where('role', 'student')->get();
        $userslist = User::where('role', 'student')->pluck('id');
        $listcheck = [];
        foreach($group->enrolment as $enrol):
            $listcheck[] = $enrol->user_id;
        endforeach;
        return view('enrol.details', compact('group', 'users', 'userslist', 'listcheck'));
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

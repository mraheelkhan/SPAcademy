<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Http\Requests\GradeUpdateRequest;
use App\Model\Grade;
use Auth;
use Session;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Grade::all();
        
        return view('grades.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $user_id = Auth::user()->id;

        $data = New Grade;
        $data->code = $request->code;
        $data->name = $request->name;
        $data->user_id = $user_id;
        $data->save();
        
        return back()->withSuccess('Grade has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Grade  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Grade  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Grade::findOrFail($id);
        return view('grades.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $group = Grade::findOrFail($id);
        $group->name = $request->name;
        $group->code = $request->code;
        $group->update();

        return back()->withSuccess($group->name . ' Grade has been updated.<script> notify("success","Group has been created successfully.") </script> ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Grade::destroy($id);
        if ($res) {
            return back()->withSuccess(" <i class='fas fa-trash'></i> course has been deleted.");
        } else {
            return back()->withError("<i class='fas fa-times'></i> course not found.");
        }
    }
}

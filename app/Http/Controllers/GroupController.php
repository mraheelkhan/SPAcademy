<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Model\Group;
use Auth;
use Session;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $user_id = Auth::user()->id;

        $data = New Group;
        $data->code = $request->code;
        $data->name = $request->name;
        $data->user_id = $user_id;
        $data->save();
        
        return back()->withSuccess('Group has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(GroupUpdateRequest $request,  $id)
    {
        $group = Group::findOrFail($id);
        $group->name = $request->name;
        $group->code = $request->code;
        $group->update();

        return back()->withSuccess($group->name . ' Group has been updated.<script> notify("success","Group has been created successfully.") </script> ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Group::destroy($id);
        if ($res) {
            return back()->withSuccess(" <i class='fas fa-trash'></i> course has been deleted.");
        } else {
            return back()->withError("<i class='fas fa-times'></i> course not found.");
        }
    }
}

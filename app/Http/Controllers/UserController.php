<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Model\Grade;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $grades = Grade::where('status', 1)->get();
        return view('users.new', compact('grades'));
    }

    public function store(UserRequest $request)
    {

        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'grade_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $data = New User;
        $data->email = $request->email;
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->role = $request->role;
        if($data->role == 'instructor' || $data->role == 'admin'){
            $grade_id = 0;
        }
        if($request->grade_id == 'none'){
            $grade_id = 0;
        } else {
            $grade_id = $request->grade_id;
        }
        $data->grade_id = $grade_id;

        $data->password = Hash::make($request->password);
        $data->save();
        
        return back()->withSuccess('User has been created.');
    }

    public function destroy($id)
    {
        $res = User::destroy($id);
        if ($res) {
            return back()->withSuccess(" <i class='fas fa-trash'></i> User has been deleted.");
        } else {
            return back()->withError("<i class='fas fa-times'></i> User not found.");
        }
    }
}

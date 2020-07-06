<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
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
        return view('users.new');
    }

    public function store(UserRequest $request)
    {
        $data = New User;
        $data->email = $request->email;
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->password = $request->password;
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

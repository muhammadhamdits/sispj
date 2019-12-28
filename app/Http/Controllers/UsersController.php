<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('data_master/user/index', ['users' => $users]);
    }

    public function create()
    {
        return view('data_master/user/add');
    }

    public function store(Request $requset)
    {
        $user = User::create([
            'name' => $requset->name,
            'username' => $requset->username,
            'password' => bcrypt($requset->password),
            'role' => $requset->role,
        ]);
        $user->save();
        return redirect()->route('admin.user.index');
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('data_master/user/show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        dd($user);
    }

    public function update()
    {

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
    }
}

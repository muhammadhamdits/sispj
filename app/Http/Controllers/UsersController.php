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

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
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
        return view('data_master/user/edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->password == null){
            $user->update([
                'name'      => $request->name,
                'username'  => $request->username,
                'role'      => $request->role
            ]);
        }else{
            $user->update($request->all());
        }
        return redirect()->route('admin.user.index');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}

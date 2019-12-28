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

    }

    public function store()
    {

    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        dd($user);
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

    }
}

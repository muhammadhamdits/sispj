<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Periode;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $periode = Periode::where('status', 1)->first();
        return view('data_master/user/index', ['users' => $users, 'periode' => $periode]);
    }

    public function create()
    {
        return view('data_master/user/add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);
            $user->save();
            return redirect()->route('admin.user.index')->with('status', 'Data user '.$request->name.' Berhasil Ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.user.create')->with('danger', 'Data dengan username '.$request->username.' sudah ada!');
        }
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
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
        ]);

        try {
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
            return redirect()->route('admin.user.index')->with('warning', 'Data user '.$user->name.' Berhasil diperbaharui!');;
        } catch (\Throwable $th) {
            return redirect()->route('admin.user.edit', ['id' => $id])->with('danger', 'Data dengan username '.$request->username.' sudah ada!');
        }
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('danger', 'Data user '.$user->name.' berhasil dihapus!');
    }
}

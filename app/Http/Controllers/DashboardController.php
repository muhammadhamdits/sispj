<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $password = Hash::make('admin');
        // echo($password);
        return view('dashboard ');
    }
}

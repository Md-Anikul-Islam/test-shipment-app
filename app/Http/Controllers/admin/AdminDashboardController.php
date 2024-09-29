<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use App\Models\News;
use App\Models\Project;
use App\Models\ProjectFile;
use App\Models\Showcase;
use App\Models\Team;
use App\Models\Training;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
       $loginLog = LoginLog::orderBy('last_login','desc')->get();
       return view('admin.dashboard', compact('loginLog'));
    }

    public function unauthorized()
    {
        return view('admin.unauthorized');
    }

    public function register()
    {
        return view('admin.register');
    }

    //user registration name,email,password
    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create($request->all());
        return redirect()->route('login')->with('success', 'User created successfully');
    }





}

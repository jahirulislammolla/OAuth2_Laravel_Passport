<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        if (Auth::user()->user_role != 'user') {
            return redirect()->route('admin_index');
        }
        return view('home',['message'=>'User access denied']);
    }
    public function admin_index()
    {
        return view('dashboard.admin.index');
    }
    public function outlet_activity()
    {
        return view('dashboard.admin.outlet_activity');
    }
}

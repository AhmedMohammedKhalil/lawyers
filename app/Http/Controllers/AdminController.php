<?php

namespace App\Http\Controllers;


use App\Models\Admin;
class AdminController extends Controller
{
    public function profile()
    {
        return view('admins.profile');

    }

    public function dashboard()
    {
        return view('admins.dashboard');
    }
}

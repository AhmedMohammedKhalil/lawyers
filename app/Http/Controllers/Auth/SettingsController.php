<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Specialization;

class SettingsController extends Controller
{

    public function adminSettings()
    {
        return view('admins.settings');

    }

    public function userSettings()
    {
        return view('users.settings');

    }

    public function lawyerSettings()
    {
        $specs = Specialization::all();
        return view('lawyers.settings',compact('specs'));

    }
}

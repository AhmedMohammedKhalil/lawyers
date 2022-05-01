<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Consulation;
use App\Models\Lawyer;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\User;

class AdminController extends Controller
{
    public function profile()
    {
        return view('admins.profile');

    }

    public function dashboard()
    {

        $lawyers = Lawyer::all();
        $users = User::all();
        $specials = Specialization::all();
        $services = Service::all();
        $cons = Consulation::all();


        return view('admins.dashboard',compact('lawyers','specials','services','users','cons'));
    }
}

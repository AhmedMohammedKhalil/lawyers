<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;

class LawyerController extends Controller
{
    public function profile()
    {
        return view('lawyers.profile');
    }

}

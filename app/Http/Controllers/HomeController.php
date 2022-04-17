<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $lawyers = Lawyer::all();
        $specs = Specialization::all();

        return view('home',compact('lawyers', 'specs'));
    }

    public function showSpecialization(Request $r)
    {
        $spec = Specialization::whereId($r->id)->first();
        return view('specials_lawyers', compact('spec'));
    }

    public function showLawyer(Request $r)
    {
        $lawyer = Lawyer::whereId($r->id)->first();

        return view('lawyer_details', compact('lawyer'));
    }

    public function search() {
        $lawyers = Lawyer::all();
        return view('search', compact('lawyers'));
    }
}

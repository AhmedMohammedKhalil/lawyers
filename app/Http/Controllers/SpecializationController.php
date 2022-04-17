<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{

    public function index()
    {
        $specs = Specialization::all();
        return view('admins.specializations.index', compact('specs'));
    }



    public function edit(Request $r)
    {
        $spec = Specialization::whereId($r->id)->first();
        return view('admins.specializations.edit', compact('spec'));
    }

    public function delete(Request $r)
    {
        Specialization::destroy($r->id);
        return redirect()->route('admin.specialization.index');
    }


}

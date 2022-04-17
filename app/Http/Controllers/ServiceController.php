<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('lawyers.services.index',compact('services'));
    }

    public function edit(Request $r)
    {
        $service = Service::WhereId($r->id)->first();
        return view('lawyers.services.edit',compact('service'));
    }

    public function delete(Request $r)
    {
        Service::destroy($r->id);
        return redirect()->route('lawyer.services.index');
    }
}

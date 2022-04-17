<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    public function adminLogin() {
        return view('admins.login');
    }


    public function userLoginRegister(){
        return view('users.login_register');

    }

    public function lawyerLoginRegister() {
        $specs = Specialization::all();
        return view('lawyers.login_register',compact('specs'));

    }


    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }


    public function userLogout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }

    public function lawyerLogout(Request $request)
    {
        Auth::guard('lawyer')->logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
}

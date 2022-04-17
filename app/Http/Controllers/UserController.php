<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile() {
        return view('users.profile');
    }

    public function booking(Request $r) {
        $user = User::find(Auth::guard('user')->user()->id);
        $user_book = Booking::where('status','wait')
                            ->where('lawyer_id',$r->id)
                            ->where('user_id',$user->id)
                            ->first();

        if($user_book)
            $user_book->delete();
        $user->lawyer_books()->attach($r->id);
        return redirect()->route('home');
    }
}

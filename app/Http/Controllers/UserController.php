<?php

namespace App\Http\Controllers;

use App\Events\Booking_Event;
use App\Models\Booking;
use App\Models\Consulation;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile() {
        return view('users.profile');
    }

    public function addBooking(Request $r) {
        $user = User::find(Auth::guard('user')->user()->id);
        $user_book = Booking::where('status','wait')
                            ->where('lawyer_id',$r->id)
                            ->where('user_id',$user->id)
                            ->first();

        if($user_book)
            $user_book->delete();
        $user->lawyer_books()->attach($r->id);
        $user_book = Booking::where('status','wait')
                    ->where('lawyer_id',$r->id)
                    ->where('user_id',$user->id)
                    ->first();

        Notification::create([
            'type' => 'booking',
            'lawyer_id' => $r->id,
            'auth_type' => 'lawyer',
            'data' => json_encode([
                'booking' => $user_book,
                'booking_id' => $user_book->id
            ]),
        ]);
        $data = [
            'owner_id' => $r->id,
            'auth_type' => 'lawyer',
        ];

        broadcast(new Booking_Event($data))->toOthers();
        return redirect()->route('user.bookings.show');
    }


    public function showConsulations() {
        $consulations = Consulation::where('user_id',Auth('user')->user()->id)->latest()->get();
        return view('users.consulations',compact('consulations'));
    }

    public function addConsulation(Request $r) {
        $lawyer_id = $r->id;
        return view('users.add-consulation',compact('lawyer_id'));
    }

    public function getConsulation(Request $r) {
        Notification::whereId($r->notify_id)->first()->update(['read_at',Carbon::now()]);
        $consulations = Consulation::whereId($r->cons_id)->get();
        return view('users.show_consulation',compact('consulations'));
    }

    public function showBooking() {
        $nots = Notification::where('user_id',auth('user')->user()->id)
                ->where('type', 'booking')->get();
        foreach($nots as $not) {
            if(!$not->reat_at) {
                $not->read_at = Carbon::now();
                $not->save();
            }
        }
        $bookings = Booking::where('user_id',auth('user')->user()->id)->get();
        return view('users.bookings',compact('bookings'));
    }
}

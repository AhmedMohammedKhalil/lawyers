<?php

namespace App\Http\Controllers;

use App\Events\Booking_Event;
use App\Models\Booking;
use App\Models\Consulation;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LawyerController extends Controller
{
    public function profile()
    {
        return view('lawyers.profile');
    }

    public function showConsulations() {
        $consulations = Consulation::where('lawyer_id',Auth('lawyer')->user()->id)->latest()->get();
        return view('lawyers.consulations',compact('consulations'));
    }

    public function getConsulation(Request $r) {
        $not = Notification::whereId($r->notify_id)->first();
        $not->read_at = Carbon::now();
        $not->save();
        $consulations = Consulation::whereId($r->cons_id)->get();
        return view('lawyers.show_consulation',compact('consulations'));
    }

    public function showBooking() {
        $nots = Notification::where('lawyer_id',auth('lawyer')->user()->id)
                        ->where('type', 'booking')->get();
        foreach($nots as $not) {
            if(!$not->reat_at) {
                $not->read_at = Carbon::now();
                $not->save();
            }
        }
        $bookings = Booking::where('lawyer_id',auth('lawyer')->user()->id)->get();
        return view('lawyers.bokkings.index',compact('bookings'));
    }

    public function acceptBooking(Request $r) {
        $booking  = Booking::whereId($r->id)->first();
        return view('lawyers.bokkings.accept',compact('booking'));
    }

    public function rejectBooking(Request $r) {
        $booking  = Booking::whereId($r->id)->first();
        $booking->status = 'reject';
        $booking->save();
        Notification::create([
            'type' => 'booking',
            'user_id' => $booking->user->id,
            'auth_type' => 'user',
            'data' => json_encode([
                'booking' => $booking,
                'booking_id' => $booking->id
            ]),
        ]);
        $data = [
            'owner_id' => $booking->user->id,
            'auth_type' => 'user',
        ];
        broadcast(new Booking_Event($data))->toOthers();

        $bookings = Booking::where('lawyer_id',auth('lawyer')->user()->id)->get();
        return view('lawyers.bokkings.index',compact('bookings'));
    }

}

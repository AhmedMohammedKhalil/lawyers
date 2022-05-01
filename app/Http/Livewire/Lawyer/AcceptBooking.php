<?php

namespace App\Http\Livewire\lawyer;

use App\Events\Booking_Event;
use App\Models\Booking;
use App\Models\Notification;
use App\Models\Service;
use Livewire\Component;

class AcceptBooking extends Component
{

    public $book_at;
    public $booking;

    public function mount($booking_id) {
        $this->booking = Booking::whereId($booking_id)->first();

    }
    protected $rules = [
        'book_at' => 'required|after_or_equal:today',
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'after_or_equal' => 'لابد ان يكون ميعاد الحجز اليوم او الايام القادمة'
    ];

    public function accept() {
        $this->validate();
        $this->booking->book_at = $this->book_at;
        $this->booking->status = 'accept';
        $this->booking->save();

        Notification::create([
            'type' => 'booking',
            'user_id' => $this->booking->user->id,
            'auth_type' => 'user',
            'data' => json_encode([
                'booking' => $this->booking,
                'booking_id' => $this->booking->id
            ]),
        ]);
        $data = [
            'owner_id' => $this->booking->user->id,
            'auth_type' => 'user',
        ];
        broadcast(new Booking_Event($data))->toOthers();
        return redirect()->route('lawyer.bookings.show');
    }
    public function render()
    {
        return view('livewire.lawyer.accept-booking');
    }
}

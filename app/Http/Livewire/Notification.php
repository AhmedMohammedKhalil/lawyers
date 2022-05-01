<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notification extends Component
{
    public $count;
    public $notifications;
    public $user_id;
    public $lawyer_id;
    public function mount() {
        if(Auth('user')->check()) {
            $user = Auth('user')->user();
            $this->notifications = $user->latestNotification;
            $this->count = $user->unreadNotification->count();
            $this->user_id = $user->id;
        } else {
            $lawyer = Auth('lawyer')->user();
            $this->notifications = $lawyer->latestNotification;
            $this->count = $lawyer->unreadNotification->count();
            $this->lawyer_id = $lawyer->id;

        }
    }

    public function getListeners()
    {
        return [
            "echo:cons-notify-{$this->lawyer_id},Consulation_Event" => 'refreshLawyerNotification',
            "echo:lawyer-reply-{$this->lawyer_id},Reply_Event" => 'refreshLawyerNotification',
            "echo:user-reply-{$this->user_id},Reply_Event" => 'refreshUserNotification',
            "echo:lawyer-booking-{$this->lawyer_id},Booking_Event" => 'refreshLawyerNotification',
            "echo:user-booking-{$this->user_id},Booking_Event" => 'refreshUserNotification',
        ];
    }

    public function readAll($id) {

    }
    public function refreshUserNotification() {
        if(auth('user')->check()) {
            $user = Auth('user')->user();
            $this->notifications = $user->latestNotification;
            $this->count = $user->unreadNotification->count();
        }
    }

    public function refreshLawyerNotification() {
        if(auth('lawyer')->check()) {
            $lawyer = Auth('lawyer')->user();
            $this->notifications = $lawyer->latestNotification;
            $this->count = $lawyer->unreadNotification->count();
        }
    }
    public function render()
    {
        return view('livewire.notification');
    }
}

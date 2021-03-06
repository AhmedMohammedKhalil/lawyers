<?php

namespace App\Http\Livewire\User;

use App\Events\rate as EventsRate;
use App\Models\Lawyer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Rate extends Component
{
    public $lawyer;
    public $rates;
    public $user_rate;
    public $rating;
    public function mount($lawyer_id) {
        $this->lawyer = Lawyer::whereId($lawyer_id)->first();
        $this->rates = $this->lawyer->rates;
        $this->rating = $this->rates->count()  != 0 ? number_format($this->rates->sum('rate') / $this->rates->count()) : 0;
        if(auth('user')->check()) {
            $user = User::find(Auth::guard('user')->user()->id);
            foreach($this->rates as $r) {
                $this->user_rate = $r->where('user_id',$user->id)->first();
            }
        }
    }

    protected $listeners = [
        'refresh_me' => '$refresh',
        'makeRate'
    ];

    protected $rules = [
        'user_rate' => 'required|numeric'
    ];
    public function updatedUserRate() {
        $user = User::find(Auth::guard('user')->user()->id);
        $user->lawyers()->detach($this->lawyer->id);
        $user->lawyers()->attach($this->lawyer->id,['rate' => $this->user_rate]);
        $this->emitSelf('makeRate');
    }

    public function makeRate() {

        $this->rates = $this->lawyer->rates;
        $this->rating = $this->rates->count()  != 0 ? number_format($this->rates->sum('rate') / $this->rates->count()) : 0;
        $this->emitSelf('refresh_me');

    }
    public function render()
    {
        return view('livewire.user.rate');
    }
}

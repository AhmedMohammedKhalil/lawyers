<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Rate extends Component
{
    public $lawyer;
    public $rates;
    public $user_rate;
    public $rating;
    public function mount($lawyer) {
        $this->lawyer = $lawyer;
        $this->rates = $this->lawyer->rates;
        $this->rating = $this->rates->count()  != 0 ? number_format($this->rates->sum('rate') / $this->rates->count()) : 0;
        $user = User::find(Auth::guard('user')->user()->id);
        foreach($this->rates as $r) {
            $this->user_rate = $r->where('user_id',$user->id)->first();
        }
    }

    protected $listeners = ['refresh_me' => '$refresh'];

    protected $rules = [
        'user_rate' => 'required|numeric'
    ];
    public function updatedUserRate() {
        $user = User::find(Auth::guard('user')->user()->id);
        $user->lawyers()->detach($this->lawyer->id);
        $user->lawyers()->attach($this->lawyer->id,['rate' => $this->user_rate]);

        $this->emitSelf('refresh_me');
    }
    public function render()
    {
        $this->rates = $this->lawyer->rates;
        $this->rating = $this->rates->count()  != 0 ? number_format($this->rates->sum('rate') / $this->rates->count()) : 0;
        return view('livewire.user.rate');
    }
}

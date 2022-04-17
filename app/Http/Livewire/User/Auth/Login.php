<?php

namespace App\Http\Livewire\User\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email'   => 'required|email|exists:users,email',
        'password' => 'required|min:8'
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا الإيميل غير صحيح',
        'exists' => 'هذا الايميل غير مسجل فى الموقع'
    ];

    public function login()
    {
        $validatedData = $this->validate();
        if (Auth::guard('user')->attempt($validatedData)) {

            session()->flash('message', "تم تسجيل الدخول بنجاح");
            return redirect()->route('home');
        } else {
            session()->flash('error', 'الايميل او كلمة السر غير صحيح');
        }
    }
    public function render()
    {
        return view('livewire.user.auth.login');
    }
}

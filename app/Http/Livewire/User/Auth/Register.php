<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email,$phone, $password, $confirm_password, $gender, $address;


    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8', 'max:8'],
        'password' => ['required', 'string', 'min:8'],
        'email'   => 'required|email|unique:users,email',
        'password' => ['required', 'string', 'min:8'],
        'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
        'address'=>['required','max:255'],
        'gender' => ['required']
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'phone.max' => 'لابد ان يكون الحقل لايزيد عن 8',
        'regex' => 'لا بد ان يكون الحقل ارقام فقط',
        'address.max' => 'لابد ان يكون الحقل لايزيد عن 255 حرف',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'email' => 'هذا الإيميل غير صحيح',
        'unique' => 'هذا الايميل مسجل فى الموقع',
        'same' => 'لابد ان يكون الباسورد متطابق',

    ];

    public function register()
    {
        $validatedData = $this->validate();
        $data = array_merge(
            $validatedData,
            [
                'password' => Hash::make($this->password),
            ],
        );
        User::create($data);
        if (Auth::guard('user')->attempt($validatedData)) {
            session()->flash('message', "تم إنشاء الحساب بنجاح");
            return redirect()->route('home');
        }
    }
    public function render()
    {
        return view('livewire.user.auth.register');
    }
}

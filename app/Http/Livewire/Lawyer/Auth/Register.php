<?php

namespace App\Http\Livewire\Lawyer\Auth;

use App\Models\Lawyer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $phone, $password,$job_title, $confirm_password, $gender, $address,$specials,$specs;


    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'job_title' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8', 'max:8'],
        'password' => ['required', 'string', 'min:8'],
        'email'   => 'required|email|unique:lawyers,email',
        'password' => ['required', 'string', 'min:8'],
        'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
        'address' => ['required', 'max:255'],
        'gender' => ['required'],
        'specials' => ['required']

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
        'specials.required' => 'لابد ان تختار على الاقل اختيار واحد'

    ];

    public function mount($specs){
        $this->specs = $specs;
    }
    public function register()
    {
        $validatedData = $this->validate();
        unset($validatedData['specials']);

        $data = array_merge(
            $validatedData,
            [
                'password' => Hash::make($this->password),
            ],
        );
        $lawyer = Lawyer::create($data);
        if (Auth::guard('lawyer')->attempt($validatedData)) {
            $lawyer->specializations()->attach($this->specials);
            session()->flash('message', "تم إنشاء الحساب بنجاح");
            return redirect()->route('home');
        }
    }
    public function render()
    {

        return view('livewire.lawyer.auth.register');
    }
}

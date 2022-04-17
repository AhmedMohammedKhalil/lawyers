<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Settings extends Component
{
    use WithFileUploads;
    public $name, $email,$gender,$phone,$address, $image, $password, $confirm_password, $user_id;


    public function mount()
    {
        $this->user_id = Auth::guard('user')->user()->id;
        $this->name = Auth::guard('user')->user()->name;
        $this->email = Auth::guard('user')->user()->email;
        $this->gender = Auth::guard('user')->user()->gender;
        $this->phone = Auth::guard('user')->user()->phone;
        $this->address = Auth::guard('user')->user()->address;

    }


    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا الإيميل غير صحيح',
        'name.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'unique' => 'هذا الايميل مسجل فى الموقع',
        'same' => 'لابد ان يكون الباسورد متطابق',
        'image' => 'لابد ان يكون الملف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا'
    ];

    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8', 'max:8'],
        'address' => ['required', 'max:255'],
        'gender' => ['required']
    ];

    public function updatedImage()
    {
        $validatedata = $this->validate(
            ['image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048']]
        );
    }

    public function updatedPassword()
    {
        $validatedata = $this->validate(
            [
                'password' => ['min:8'],
                'confirm_password' => ['min:8', 'same:password']
            ]
        );
    }

    public function edit()
    {
        $validatedata = $this->validate(
            array_merge(
                $this->rules,
                [
                    'email'   => ['required', 'email', "unique:users,email," . $this->user_id],
                ]
            )
        );
        if ($this->password) {
            $this->updatedPassword();
            $validatedata = array_merge(
                $validatedata,
                ['password' => Hash::make($this->password)]
            );
        }
        if (!$this->image)
            user::whereId($this->user_id)->update($validatedata);
        if ($this->image) {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            user::whereId($this->user_id)->update(array_merge($validatedata, ['image' => $imagename]));
            $dir = public_path('assets/images/data/users/' . $this->user_id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('users/' . $this->user_id, $imagename);
            File::deleteDirectory(public_path('assets/images/data/livewire-tmp'));
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('user.profile');
    }

    public function render()
    {
        return view('livewire.user.auth.settings');
    }
}

<?php

namespace App\Http\Livewire\Lawyer\Auth;

use App\Models\Lawyer;
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
    public $name, $email,$job_title,$specials = [], $gender, $phone, $address, $image, $password, $confirm_password, $lawyer_id,$specis;


    public function mount($specs)
    {
        $this->specis = $specs;
        $this->lawyer_id = Auth::guard('lawyer')->user()->id;
        $this->name = Auth::guard('lawyer')->user()->name;
        $this->job_title = Auth::guard('lawyer')->user()->job_title;
        $this->email = Auth::guard('lawyer')->user()->email;
        $this->gender = Auth::guard('lawyer')->user()->gender;
        $this->phone = Auth::guard('lawyer')->user()->phone;
        $this->address = Auth::guard('lawyer')->user()->address;
        $this->specials = Auth::guard('lawyer')->user()->specializations;

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
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',
        'specials.required' => 'لابد ان تختار على الاقل اختيار واحد'

    ];

    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'job_title' => ['required', 'string', 'max:50'],
        'phone' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8', 'max:8'],
        'address' => ['required', 'max:255'],
        'gender' => ['required'],
        'specials' => ['required']

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
                    'email'   => ['required', 'email', "unique:lawyers,email," . $this->lawyer_id],
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
        unset($validatedata['specials']);
        Lawyer::find($this->lawyer_id)->specializations()->sync($this->specials);
        if (!$this->image)
            Lawyer::whereId($this->lawyer_id)->update($validatedata);
        if ($this->image) {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            Lawyer::whereId($this->lawyer_id)->update(array_merge($validatedata, ['image' => $imagename]));
            $dir = public_path('assets/images/data/lawyers/' . $this->lawyer_id);
            if (file_exists($dir))
                File::deleteDirectories($dir);
            else
                mkdir($dir);
            $this->image->storeAs('lawyers/' . $this->lawyer_id, $imagename);
            File::deleteDirectory(public_path('assets/images/data/livewire-tmp'));
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('lawyer.profile');
    }

    public function render()
    {
        return view('livewire.lawyer.auth.settings');
    }
}

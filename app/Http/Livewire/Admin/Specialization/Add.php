<?php

namespace App\Http\Livewire\Admin\Specialization;

use App\Models\Specialization;
use Livewire\Component;

class Add extends Component
{

    public $title;

    protected $rules = [
        'title'   => 'required|string|max:100',
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'max' => 'لابد ان يكون الحقل مكون على الأكثر 100 خانة',
    ];

    public function add()
    {
        $validatedData = $this->validate();
        Specialization::create($validatedData);
        session()->flash('message', "تم إنشاء التخصص بنجاح");
        return redirect()->route('admin.specialization.index');
    }
    public function render()
    {
        return view('livewire.admin.specialization.add');
    }
}

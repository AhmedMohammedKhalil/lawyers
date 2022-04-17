<?php

namespace App\Http\Livewire\Admin\Specialization;

use App\Models\Specialization;
use Livewire\Component;

class Edit extends Component
{

    public $title;
    public $specialization;

    public function mount($spec) {
        $this->specialization = $spec;
        $this->title = $this->specialization->title;
    }

    protected $rules = [
        'title'   => 'required|string|max:100',
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'max' => 'لابد ان يكون الحقل مكون على الأكثر 100 خانة',
    ];

    public function edit()
    {
        $validatedData = $this->validate();
        $this->specialization->update($validatedData);
        session()->flash('message', "تم تعديل التخصص بنجاح");
        return redirect()->route('admin.specialization.index');
    }
    public function render()
    {
        return view('livewire.admin.specialization.edit');
    }
}

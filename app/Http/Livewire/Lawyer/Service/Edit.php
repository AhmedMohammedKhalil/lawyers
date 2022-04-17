<?php

namespace App\Http\Livewire\lawyer\Service;

use App\Models\Service;
use Livewire\Component;

class Edit extends Component
{

    public $title;
    public $spec_id;
    public $details;
    public $service;
    public function mount($service)
    {
        $this->service = $service;
        $this->title = $service->title;
        $this->spec_id = $service->spec_id;
        $this->details = $service->details;

    }

    protected $rules = [
        'title'   => 'required|string|max:100',
        'spec_id' => 'required',
        'details' => ['required', 'max:255'],
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'details.max' => 'لابد ان يكون الحقل لايزيد عن 255 حرف',
        'max' => 'لابد ان يكون الحقل مكون على الأكثر 100 خانة',
    ];

    public function edit()
    {
        $validatedData = $this->validate();
        //Service::create($data);
        $this->service->update($validatedData);

        session()->flash('message', "تم إنشاء الخدمة بنجاح");
        return redirect()->route('lawyer.services.index');
    }
    public function render()
    {
        return view('livewire.lawyer.service.edit');
    }
}

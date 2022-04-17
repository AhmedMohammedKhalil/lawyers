<?php

namespace App\Http\Livewire\lawyer\Service;

use App\Models\Service;
use Livewire\Component;

class Add extends Component
{

    public $title;
    public $spec_id;
    public $details;

    protected $rules = [
        'title'   => 'required|string|max:100',
        'details' => ['required', 'max:255'],
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'details.max' => 'لابد ان يكون الحقل لايزيد عن 255 حرف',
        'max' => 'لابد ان يكون الحقل مكون على الأكثر 100 خانة',
    ];

    public function add()
    {
        $validatedData = $this->validate(
            array_merge(
                $this->rules,
                [
                    'spec_id' => $this->spec_id == 0 ? 'required' : '',
                ]
            )
        );
        $data = array_merge(
            $validatedData,
            [
                'lawyer_id' => auth('lawyer')->user()->id
            ]
        );
        Service::create($data);
        session()->flash('message', "تم إنشاء الخدمة بنجاح");
        return redirect()->route('lawyer.services.index');
    }
    public function render()
    {
        return view('livewire.lawyer.service.add');
    }
}

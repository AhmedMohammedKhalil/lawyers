<?php

namespace App\Http\Livewire\User\Consulations;

use App\Events\Consulation_Event;
use App\Models\Consulation;
use App\Models\Lawyer;
use App\Models\Notification;
use Livewire\Component;

class Add extends Component
{
    public $lawyer;
    public $spec_id;
    public $details;
    public function mount($lawyer_id) {
        $this->lawyer = Lawyer::whereId($lawyer_id)->first();
    }

    protected $rules = [
        'details' => ['required', 'max:255'],
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'max' => 'لابد ان يكون الحقل لايزيد عن 255 حرف',
    ];

    public function add() {
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
                'lawyer_id' => $this->lawyer->id,
                'user_id' => Auth('user')->user()->id
            ]
        );
        $cons = Consulation::create($data);
        Notification::create([
            'type' => 'cosulation',
            'lawyer_id' => $this->lawyer->id,
            'auth_type' => 'lawyer',
            'data' => json_encode([
                'consulations' => $cons,
                'cons_id' => $cons->id
            ]),
        ]);
        $owner_id = $this->lawyer->id;
        $authtype = 'lawyer';
        $data = [
            'lawyer_id' => $owner_id,
            'auth_type' => $authtype,
        ];
        broadcast(new Consulation_Event($data))->toOthers();
        session()->flash('message', "تم إنشاء الإستشارة بنجاح");
        return redirect()->route('user.consulations');
    }
    public function render()
    {
        return view('livewire.user.consulations.add');
    }
}

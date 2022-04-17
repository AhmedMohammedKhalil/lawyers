<?php

namespace App\Http\Livewire;

use App\Models\Lawyer;
use Livewire\Component;

class Lawyers extends Component
{
    public $lawyers;

    protected $listeners = ['showLawyers'];

    public function showLawyers($ls) {
        $ids = [];
        foreach($ls as $l) {
            $ids[] = $l['id'];
        }
        $this->lawyers = Lawyer::find($ids);
    }

    public function render()
    {
        return view('livewire.lawyers');
    }
}

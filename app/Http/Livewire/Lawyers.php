<?php

namespace App\Http\Livewire;

use App\Models\Lawyer;
use Livewire\Component;

class Lawyers extends Component
{
    public $lawyers;
    public $flag = false;

    protected $listeners = [
        'showLawyers',
    ];


    public function showLawyers($ls) {
        $this->flag = true;
        if($ls) {
            $ids = [];
            foreach($ls as $l) {
                $ids[] = $l['id'];
            }
            $this->lawyers = Lawyer::find($ids);
        } else {
            $this->lawyers = '';
        }

    }

    public function render()
    {
        $this->lawyers = $this->flag == true ? $this->lawyers : Lawyer::all();
        return view('livewire.lawyers');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Lawyer;
use App\Models\Specialization;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $initallawyers;
    public $lawyers;
    public function mount($lawyers) {
        $this->initallawyers = $lawyers;
    }

    public function search() {
        if($this->search == '')
            $this->lawyers = Lawyer::all();
        else {
                $lawyers = Lawyer::where('name','like','%'.$this->search.'%')->get();
                $specs = Specialization::where('title', 'like', '%' . $this->search . '%')->get();
                foreach($specs as $spec) {
                    foreach($spec->lawyers as $l) {
                        if ($lawyers->count() == 0) {
                            $lawyers[] = $l;
                        } else {
                            if (!in_array($l, $lawyers->toArray())) {
                                $lawyers[] = $l;
                            }
                        }
                    }
                }
                $this->lawyers = $lawyers;

        }
        $this->emitTo(Lawyers::class,'showLawyers',$this->lawyers);
    }
    public function render()
    {
        return view('livewire.search');
    }
}

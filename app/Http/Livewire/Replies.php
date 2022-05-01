<?php

namespace App\Http\Livewire;

use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Replies extends Component
{

    public $replies,$cons_id,$reply_id = 0,$content;

    protected $listeners = [
        'refresh_me' => '$refresh',
        'updateReplies' => 'refresh'
    ];

    protected $rules = [
        'content' => 'required|max:255',
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
    ];

    public function mount($replies,$cons_id) {
        $this->replies = $replies;
        $this->cons_id = $cons_id;
    }

    public function refresh($id) {
        $this->replies = Reply::where('cons_id',$id)->get();
        $this->emitSelf('refresh_me');
    }

    public function editReply($id) {
        $this->validate();
        $this->reply_id = $id;
        $this->content = Reply::whereId($id)->first()->content;
    }

    public function cancel() {
        $this->reply_id = 0;
    }

    public function delReply($id) {
        Reply::destroy($id);
        $this->emitTo(Consulations::class,'refresh_me');
        $this->emitSelf('refresh_me');
    }

    public function edit($id) {
        $this->validate();
        if(Auth::guard('user')->check()) {
            Reply::whereId($id)->update([
                'content' => $this->content,
            ]);
        } else {
            Reply::whereId($id)->update([
                'content' => $this->content,
            ]);
        }

        $this->emitSelf('refresh_me');

        $this->content = "";
        $this->reply_id = 0;
    }

    public function render()
    {
        return view('livewire.replies');
    }
}

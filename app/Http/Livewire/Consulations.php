<?php

namespace App\Http\Livewire;

use App\Events\Reply_Event;
use App\Models\Consulation;
use App\Models\Notification;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Consulations extends Component
{
    public $consulations;
    public $del_id = 0;
    public $reply_con_id = 0;
    public $content = "";
    public function mount($consulations) {
        $this->consulations = $consulations;
    }


    protected $listeners = [
        'refresh_me' => '$refresh',
    ];

    protected $rules = [
        'content' => 'required|max:255',
    ];

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة',
    ];

    public function del($id) {
        $this->del_id = $id;
        Reply::where('cons_id',$id)->delete();
        Consulation::destroy($id);
        $this->emitSelf('refresh_me');

    }

    public function addReply($id) {
        $this->reply_con_id = $id;
        $cons = Consulation::whereId($id)->first();
        $lawyer_id = $cons->lawyer_id;
        $user_id = $cons->user_id;
        $authtype = "";
        $notification = New Notification();
        $data = $this->validate();
        if(Auth::guard('user')->check()) {
            $reply = Reply::create([
                'content' => $this->content,
                'reply_id' => Auth('user')->user()->id,
                'reply_type'=>'user',
                'cons_id' => $id
            ]);
            $notification->create([
                'type' => 'reply',
                'lawyer_id' => $lawyer_id,
                'auth_type' => 'lawyer',
                'data' => json_encode([
                    'reply' => $reply,
                    'cons_id' => $id
                ]),
            ]);
            $owner_id = $lawyer_id;
            $authtype = 'lawyer';
        } else {
            $reply = Reply::create([
                'content' => $this->content,
                'reply_id' => Auth('lawyer')->user()->id,
                'reply_type'=>'lawyer',
                'cons_id' => $id
            ]);
            $notification->create([
                'type' => 'reply',
                'user_id' => $user_id,
                'auth_type' => 'user',
                'data' => json_encode([
                    'reply' => $reply,
                    'cons_id' => $id
                ]),
            ]);
            $owner_id = $user_id;
            $authtype = 'user';
        }

        $data = [
            'owner_id' => $owner_id,
            'auth_type' => $authtype,
        ];

        broadcast(new Reply_Event($data))->toOthers();
        $this->emitTo(Replies::class,'updateReplies',$id);
        $this->emitSelf('refresh_me');

        $this->content = "";
        $this->reply_con_id = 0;
    }
    public function render()
    {
        return view('livewire.consulations');
    }
}

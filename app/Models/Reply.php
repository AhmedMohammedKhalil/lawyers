<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply_id', 'reply_type', 'content','cons_id'
    ];

    public function reply()
    {
        return $this->morphTo();
    }

    public function lawyer() {
        return $this->belongsTo(Lawyer::class,'reply_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'reply_id');
    }

}

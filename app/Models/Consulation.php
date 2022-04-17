<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'details', 'status', 'user_id', 'spec_id','lawyer_id'
    ];

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'spec_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class, 'lawyer_id');
    }

    public function user_reply()
    {
        return $this->morphedByMany(User::class, 'reply','replies','cons_id','reply_id');
    }

    public function lawyer_reply()
    {
        return $this->morphedByMany(Lawyer::class, 'reply', 'replies', 'cons_id', 'reply_id');
    }
}

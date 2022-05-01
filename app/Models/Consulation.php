<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'details', 'user_id', 'spec_id','lawyer_id'
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

    public function replies()
    {
        return $this->hasMany(Reply::class,'cons_id');
    }



}

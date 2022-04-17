<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'details', 'spec_id', 'lawyer_id'
    ];

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'spec_id');
    }

    public function lawyers()
    {
        return $this->belongsTo(Lawyer::class, 'lawyer_id');
    }
}

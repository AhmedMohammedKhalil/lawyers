<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'spec_id');
    }


    public function lawyers()
    {
        return $this->belongsToMany(Lawyer::class, 'lawyer_specializations','spec_id','lawyer_id')
        ->withTimestamps();
    }

    public function consulations()
    {
        return $this->hasMany(Consulation::class, 'spec_id');
    }
}

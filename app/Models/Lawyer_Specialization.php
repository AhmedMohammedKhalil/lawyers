<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer_Specialization extends Model
{
    use HasFactory;
    protected $table = 'lawyer_specializations';
    protected $fillable = [
        'spec_id', 'lawyer_id'
    ];
}

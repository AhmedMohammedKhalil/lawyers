<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','lawyer_id','data','read_at', 'type','auth_type'
    ];

    protected $cast=['data'=>'array'];
}

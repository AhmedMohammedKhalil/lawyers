<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lawyer extends Authenticatable
{
    use HasFactory;

    use HasFactory;
    protected $guard = 'lawyer';

    protected $fillable = [
        'name', 'email', 'password', 'image', 'phone', 'gender', 'job_title', 'address'
    ];

    protected $hidden = [
        'password',
    ];



    public function services()
    {
        return $this->hasMany(Service::class, 'lawyer_id');
    }

    public function consulations()
    {
        return $this->hasMany(Consulation::class, 'lawyer_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'rates')
        ->withPivot('rate')
        ->withTimestamps();
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'lawyer_id');
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'lawyer_specializations','lawyer_id','spec_id')
        ->withTimestamps();
    }

    public function user_books()
    {
        return $this->belongsToMany(User::class, 'bookings', 'lawyer_id')
        ->withPivot('status', 'book_at')
        ->withTimestamps();
    }



    public function replies()
    {
        return $this->morphMany(Reply::class, 'reply');
    }


}

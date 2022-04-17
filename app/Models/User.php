<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;
    protected $guard = 'user';

    protected $fillable = [
        'name', 'email', 'password', 'image','phone','address','gender',
    ];

    protected $hidden = [
        'password',
    ];

    public function replies()
    {
        return $this->morphMany(Reply::class, 'reply');
    }

    public function consulations()
    {
        return $this->hasMany(Consulation::class, 'user_id');
    }

    public function lawyers()
    {
        return $this->belongsToMany(Lawyer::class, 'rates')
        ->withPivot('rate')
        ->withTimestamps();
    }


    public function rates() {
        return $this->hasMany(Rate::class, 'user_id');
    }

    public function lawyer_books()
    {
        return $this->belongsToMany(Lawyer::class, 'bookings', 'user_id')
        ->withPivot('status', 'book_at')
        ->withTimestamps();
    }
}

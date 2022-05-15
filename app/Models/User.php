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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'category',
        'description',
        'specialty_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function specialty () {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }

    public function getDocSpecialty () {
        return $this->specialty() != null ? $this->specialty->name : '';
    }

    public function doctor_meetings () {
        return $this->hasMany(Meeting::class, 'doctor_id');
    }
    
    public function user_meetings () {
        return $this->hasMany(Meeting::class, 'user_id');
    }

    public function doctor_schedule () {
        return $this->hasMany(Schedule::class, 'user_id');
    }

    public function user_comments () {
        return $this->hasMany(Comment::class, 'user_id');
    }
    
    public function doctor_comments () {
        return $this->hasMany(Comment::class, 'doctor_id');
    }
    
    public function drugs () {
        return $this->hasMany(Drug::class, 'user_id');
    }
}

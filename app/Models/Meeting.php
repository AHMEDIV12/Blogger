<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Meeting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date', 'note', 'start_url', 'join_url', 'user_id', 'doctor_id','reservation_status'
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctor () {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function getDoctor() {
        return $this->doctor != null ? $this->doctor->name : ''; 
    }

    public function getUser() {
        return $this->doctor != null ? $this->doctor->name : ''; 
    }

}

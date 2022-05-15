<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['reservation_status' ,'user_id' , 'doctor_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    } 

    public function doctor () {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}

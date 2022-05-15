<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'desc', 'img' , 'user_id'];

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}

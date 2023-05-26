<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class, 'friends_user', 'friends_id', 'user_id');
    }
}

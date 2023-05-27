<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserFriends extends Pivot
{
    use HasFactory;

    protected $table = 'friends_user';

    public static function boot(){
        parent::boot();

        // Event handling for a pivot table
        static::created(function($relationship){
            // dd($relationship);

        });
    }
}

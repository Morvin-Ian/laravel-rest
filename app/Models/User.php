<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'password',
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
        'password' => 'hashed',
    ];

    // One to One relationships
    public function address(){
        return $this->hasOne(Address::class, 'user_id');

    }

    // One to Many relationships
    public function user(){
        return $this->hasMany(Data::class, 'author');
    }

    // Many to Many relationships
    // Must utilize a pivot table - In this instance (friends_user - [follows the alphabetical naming convention of the two models])
    public function friends(){
        // Pivot table does not provide timestamps by default, thus the "withTimestamps" is required
        return $this->belongsToMany(Friends::class, 'friends_user', 'user_id', 'friends_id')->withTimestamps();
    }


    // $friend = App\Models\Friends::first();
    // $user = App\Models\User::first();

    // Adding a relationship
    // $user->friends()->attach($friend);
    
    // Deleting a relationship
    //$user->friends()->detach($friend) does th opposite 
    
    // Updating a relationship
    // $user->friends()->sync([new tag ids]);

    // Assume we had an additional field "mutual" in the pivot table. To attach it would be as followes
    // $user->friends()->attach([
    //     $friend =>
    //     [
    //      'mutual'=>True
    //      ]
    //     ]);

    // To access the mutual value during a call, the function above must ahnge to :

    // public function friends(){
    //     return $this->belongsToMany(Friends::class, 'friends_user', 'user_id', 'friends_id')
    //     ->withTimestamps()
    //     ->withPivot('mutual');
    // }
    
}

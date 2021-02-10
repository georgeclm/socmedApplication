<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected static function boot()
    {
        parent::boot();
        // this is the created function. there are creating updating, updated, deleting,deleted and other function that can be used
        // on this one just the user create a profile everytime new user is in and set the title to the username but all of it it is nullable inside the database
        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->name,
            ]);
        });
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function posts()
    {
        // add order by inside the post to update the databse on this one sorted by the created time in descending order
        // based on the timestamp
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }
    // public function following()
    // {
    //     // to set the following for the user belong to many profile that has followed
    //     return $this->belongsToMany(Profile::class);
    // }
}

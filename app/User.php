<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    protected $table = "users";

    use Notifiable;
    const ACTIVE = 1;
    const INACTIVE = 0;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token', 'isActive'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public static function boot ()
    {
        parent::boot();

        self::deleting(function (User $user) {

            foreach ($user->posts as $post) {
                Storage::disk('public')->delete($post->path);
                $post->delete();
            }
        });
    }
}

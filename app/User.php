<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    const LOW = 0;
    const HIGH = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        public function tasks()
        {
            return $this->hasMany('App\Task');
        }

    public function newspapers()
    {
        return $this->hasMany('App\Newspaper');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');

    }
}

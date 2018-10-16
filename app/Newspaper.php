<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newspaper extends Model
{
    const HIGH = 1;
    const LOW = 0;
    public function comments()
    {
        return $this->hasMany(Comment::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

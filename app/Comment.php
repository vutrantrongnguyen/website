<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function newspaper()
    {
        return $this->belongsTo(Newspaper::class);
    }   //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



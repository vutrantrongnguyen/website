<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS_NEW = 0;
    const STATUS_DONE = 1;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     protected $fillable = [
        'user_id','title' 'body',
    ];
     public function users() {

        return $this->BelongsTo(User::class);
    }

}

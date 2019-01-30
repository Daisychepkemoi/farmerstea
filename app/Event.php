<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $dates = ['held_at'];
     protected $fillable = [
        'user_id','title' ,'body','held_at','location',
    ];
     public function users() {

        return $this->BelongsTo(User::class,'user_id');
    }

}
